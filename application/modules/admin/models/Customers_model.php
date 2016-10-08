<?php

class Customers_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$this->load->library("pagination");
		$this->load->model('pagination_model');
	}

	public function customer_data($id='')
	{
		$this->db->select("*");
		$this->db->from('li_customers');
		if($id){
			$this->db->where('id',$id);
		}
		$query =$this->db->get();
		return $query->result();
	}

	public function customer_list($show, $page){
		
		$where="id";
		
		if($this->session->userdata('query_customers')){ $where.= " AND (fullname LIKE '%".$this->session->userdata('query_customers')."%' OR note LIKE '%".$this->session->userdata('query_customers')."%')"; }

		if($this->session->userdata('datetime_customers')){
			$date= explode(' - ', $this->session->userdata('datetime_customers'));
			if(check_date($date[0]) && check_date($date[1])){
				$where.=" AND (times BETWEEN '".date('Y-m-d 00:00:00',strtotime($date[0]))."' AND '".date('Y-m-d 23:59:59',strtotime($date[1]))."') ";
			}else{
				$this->session->set_flashdata('msg0',"Tarih Alanı Hatalı");
			}
		}

		$sql="SELECT * FROM li_customers WHERE ".$where." ORDER BY id DESC";
		
		return  $this->pagination_model->get_list($sql,base_url("admin/customers/customer_list/".$show."/"),$show,$page,5);
		
	}

	public function insert_customer(){

		if($this->input->post('status')){$status=1;}else{$status=0;}

		$data=array(
					'fullname'  =>$this->input->post('fullname'),
					'email'     =>$this->input->post('email'),
					'password'	=>md5($this->input->post('password')),
					'tel'   	=>$this->input->post('tel'),
					'tel2'   	=>$this->input->post('tel2'),
					'address'   =>$this->input->post('address'),
					'note'   	=>$this->input->post('note'),
					'status'    =>$status
					);

		$this->db->insert('li_customers',$data);
		return ($this->db->affected_rows() != 1 ) ? false:true;
	}
	
	public function update_customer($id)
	{
		if($this->input->post('status')){$status=1;}else{$status=0;}

		$data=array(
					'fullname'  =>$this->input->post('fullname'),
					'email'     =>$this->input->post('email'),
					'tel'   	=>$this->input->post('tel'),
					'tel2'   	=>$this->input->post('tel2'),
					'address'   =>$this->input->post('address'),
					'note'   	=>$this->input->post('note'),
					'status'    =>$status
					);

		if($this->input->post('password')){
			$data['password']=md5( $this->input->post('password') );
		}

		$this->db->where('id',$id);
		$this->db->update("li_customers",$data);
		return ($this->db->affected_rows() == 1 || $this->db->affected_rows() == 2 ) ? true:false;
	}

	public function update_customer_status($data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update("li_customers",$data);
		return ($this->db->affected_rows() == 1 ) ? true:false;
	}

	public function delete_customer($id)
	{

		$this->db->where("id", $id)->delete("li_customers");
		return ($this->db->affected_rows() != 0 ) ? true:false;
	}


}
