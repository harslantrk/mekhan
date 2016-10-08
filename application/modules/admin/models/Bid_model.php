<?php

class Bid_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$this->load->library("pagination");
		$this->load->model('pagination_model');
	}

	public function bid_data($id='')
	{
		$this->db->select("*, li_bids.id as id, li_bids.ip as ip, li_bids.county as county, li_bids.town as town, li_bids.tel as tel, li_bids.status as status, li_bids.times as times, li_members.fullname as member");
		$this->db->from('li_bids');
		$this->db->join('li_members', 'li_members.id = li_bids.member_id');
		if($id){
			$this->db->where('li_bids.id',$id);
		}
		$query =$this->db->get();
		return $query->result();
	}

	public function bid_list($show, $page){
		
		$where="li_bids.id";
		
		if($this->session->userdata('query_bids')){ $where.= " AND (li_bids.title LIKE '%".$this->session->userdata('query_bids')."%' OR li_bids.details LIKE '%".$this->session->userdata('query_bids')."%')"; }

		if($this->session->userdata('datetime_bids')){
			$date= explode(' - ', $this->session->userdata('datetime_bids'));
			if(check_date($date[0]) && check_date($date[1])){
				$where.=" AND (li_bids.times BETWEEN '".date('Y-m-d 00:00:00',strtotime($date[0]))."' AND '".date('Y-m-d 23:59:59',strtotime($date[1]))."') ";
			}else{
				$this->session->set_flashdata('msg0',"Tarih Alanı Hatalı");
			}
		}

		$sql="SELECT *, `li_bids`.`status` as `status`, `li_bids`.`times` as `times`, `li_bids`.`tel` as `tel`, `li_bids`.`id` as `id`, `li_members`.`fullname` as `member` 
			  FROM `li_bids` JOIN `li_members` ON `li_members`.`id` = `li_bids`.`member_id` WHERE ".$where." ORDER BY li_bids.id DESC";
		
		return  $this->pagination_model->get_list($sql,base_url("admin/bids/bid_list/".$show."/"),$show,$page,5);
		
	}

	
	public function update_bid($id)
	{
		if($this->input->post('status')){$status=1;}else{$status=0;}

		$data=array(
					'cat_id'  	=>$this->input->post('top_id'),
					'title'  	=>$this->input->post('title'),
					'details'   =>$this->input->post('details'),
					'tel'   	=>$this->input->post('tel'),
					'amount'   	=>price_to_number($this->input->post('amount')),
					'county'   	=>$this->input->post('county'),
					'town'   	=>$this->input->post('town'),
					'date_start'=>$this->input->post('date_start'),
					'date_end'  =>$this->input->post('date_end'),
					'status'    =>$status
					);

		$this->db->where('id',$id);
		$this->db->update("li_bids",$data);
		return ($this->db->affected_rows() == 1 || $this->db->affected_rows() == 2 ) ? true:false;
	}

	public function update_bid_status($data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update("li_bids",$data);
		return ($this->db->affected_rows() == 1 ) ? true:false;
	}

	public function delete_bid($id)
	{

		$this->db->where("id", $id)->delete("li_bids");
		return ($this->db->affected_rows() != 0 ) ? true:false;
	}


}
