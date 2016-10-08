<?php class Siparis_model extends CI_Model{	function __construct()	{		parent:: __construct();		$this->load->library("pagination");		$this->load->model('pagination_model');	}	function kaydet($tablo, $data){		return $this->db->insert($tablo, $data);	}	function getir($tablo, $col, $val){		return $this->db->select("*")						->from($tablo)						->where($col, $val)						->get()						->result_array();	}	function update($tablo, $data, $id){		return $this->db->where('id', $id)				->update($tablo, $data);	}    public function rezervasyon(){		return $this->db->select("*")						->from('li_rezervasyon')						->where('status',1)						->get()						->result_array();	}	public function boats_to_rez($id){		return $this->db->select("*")						->from('li_boats')						->join("li_rezervasyon", "li_boats.id = '.$id.'")						->get()						->row_array();	}	function siparislerim($id){		return $this->db->select("*")						->from('li_rezervasyon')						->where('uyeid', $id)						->get()						->result_array();	}	public function insert($data){		$this->db->insert('rezervasyon', $data);		if ($this->db->affected_rows() > 0) {			return true;		} else {			return false;		}	}	public function yorumKaydet($data){		$this->db->insert('li_yorum',$data);		if ($this->db->affected_rows() > 0) {			return true;		} else {			return false;		}	}	public function yorumlar($id){		return $this->db->select("*")						->from('li_yorum')						->where("boat_id", $id)						->get()						->result_array();	}}