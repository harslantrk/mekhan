<?php

class Service_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$this->load->library("pagination");
		$this->load->model('pagination_model');
	}

	public function service_data($id='')
	{
		$this->db->select("*, li_services.id as id, li_services.ip as ip, li_services.county as county, li_services.town as town, li_services.tel as tel, li_services.status as status, li_services.times as times, li_members.fullname as member");
		$this->db->from('li_services');
		$this->db->join('li_members', 'li_members.id = li_services.member_id');
		if($id){
			$this->db->where('li_services.id',$id);
		}
		$query =$this->db->get();
		return $query->result();
	}

	public function service_list($show, $page){
		
		$where="li_services.id";
		
		if($this->session->userdata('query_services')){ $where.= " AND (li_services.title LIKE '%".$this->session->userdata('query_services')."%' OR li_services.details LIKE '%".$this->session->userdata('query_services')."%')"; }

		if($this->session->userdata('datetime_services')){
			$date= explode(' - ', $this->session->userdata('datetime_services'));
			if(check_date($date[0]) && check_date($date[1])){
				$where.=" AND (li_services.times BETWEEN '".date('Y-m-d 00:00:00',strtotime($date[0]))."' AND '".date('Y-m-d 23:59:59',strtotime($date[1]))."') ";
			}else{
				$this->session->set_flashdata('msg0',"Tarih Alanı Hatalı");
			}
		}

		$sql="SELECT *, `li_services`.`status` as `status`, `li_services`.`times` as `times`, `li_services`.`tel` as `tel`, `li_services`.`id` as `id`, `li_members`.`fullname` as `member` 
			  FROM `li_services` JOIN `li_members` ON `li_members`.`id` = `li_services`.`member_id` WHERE ".$where." ORDER BY li_services.id DESC";
		
		return  $this->pagination_model->get_list($sql,base_url("admin/services/service_list/".$show."/"),$show,$page,5);
		
	}

	
	public function update_service($id)
	{
		//print_r( $this->input->post() ); exit();
		if($this->input->post('status')){$status=1;}else{$status=0;}

		$data=array(
					'cat_id'  	=>$this->input->post('top_id'),
					'title'  	=>$this->input->post('title'),
					'details'   =>$this->input->post('details'),
					'tel'   	=>$this->input->post('tel'),
					'county'   	=>$this->input->post('county'),
					'town'   	=>$this->input->post('town'),
					'status'    =>$status
					);

		$this->db->where('id',$id);
		$this->db->update("li_services",$data);
		return ($this->db->affected_rows() == 1 || $this->db->affected_rows() == 2 ) ? true:false;
	}

	public function update_service_status($data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update("li_services",$data);
		return ($this->db->affected_rows() == 1 ) ? true:false;
	}

	public function delete_service($id)
	{

		$this->db->where("id", $id)->delete("li_services");
		return ($this->db->affected_rows() != 0 ) ? true:false;
	}


}
