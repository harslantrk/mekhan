<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_Model extends CI_Model {


	public function statistics()
	{
		$statistics=array();

		$this->db->from('li_members');
		$this->db->where('status',0);
		$query =$this->db->get();
		$statistics['members_0']=$query->num_rows();

		$this->db->from('li_members');
		$this->db->where('status',1);
		$query =$this->db->get();
		$statistics['members_1']=$query->num_rows();

		$this->db->from('li_bids');
		$this->db->where('status',0);
		$query =$this->db->get();
		$statistics['bids_0']=$query->num_rows();

		$this->db->from('li_bids');
		$query =$this->db->get();
		$statistics['bids']=$query->num_rows();

		$this->db->from('li_services');
		$this->db->where('status',0);
		$query =$this->db->get();
		$statistics['services_0']=$query->num_rows();

		$this->db->from('li_services');
		$query =$this->db->get();
		$statistics['services']=$query->num_rows();

		return $statistics;
	}



}
?>