<?php

class Slider_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$this->load->library("pagination");
		$this->load->model('pagination_model');
	}

	public function homepage(){
		
		return $this->db->select("*")
				->from("li_slider")
				->where("status = 1")
				->order_by("priority", "asc")
				->limit(5)
				->get()
				->result_array();

	}

	

	public function slider_data($id=''){

		return $this->db->select("*")
				->from("li_haberler")
				->where("status","1")
				->limit(5)
				->get()
				->result();

	}


	public function comming_data($basla, $bitis){

		return $this->db->select("*")
				->from("li_haberler")
				->where("status","1")
				->where("tarih>=",$basla)
				->where("tarih<=",$bitis)
				->order_by("tarih", "DESC")
				->get()
				->result();

	}

	public function etkinlik_like($id, $likeCount){
				$likeCount = $likeCount +1;
				$this->db->set('likeCount', $likeCount);
				$this->db->where('id', $id);
				$this->db->update('li_haberler');
	}


	public function etkinlik_seen($id, $seenCount){
				$seenCount = $seenCount +1;
				$this->db->set('seenCount', $seenCount);
				$this->db->where('id', $id);
				$this->db->update('li_haberler');
	}
}
