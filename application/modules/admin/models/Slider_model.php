<?php

class Slider_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$this->load->library("pagination");
		$this->load->model('pagination_model');
	}

	public function slider_data($id='')
	{
		$this->db->select("*");
		$this->db->from('li_slider');
		if($id){
			$this->db->where('id',$id);
		}
		$query =$this->db->get();
		return $query->result();
	}

	function seo($s) {
	 $tr = array('ş','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',':',',');
	 $eng = array('s','s','i','i','i','g','g','u','u','o','o','c','c','','','-','-','');
	 $s = str_replace($tr,$eng,$s);
	 $s = strtolower($s);
	 $s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
	 $s = preg_replace('/\s+/', '-', $s);
	 $s = preg_replace('|-+|', '-', $s);
	 $s = preg_replace('/#/', '', $s);
	 $s = str_replace('.', '', $s);
	 $s = trim($s, '-');
	 return $s;
	}
	public function insert_slider(){
		
		if($this->input->post('status')){$status=1;}else{$status=0;}

		$data=array(
					'title'  	 =>$this->input->post('title'),
					'img'	 	 =>$this->input->post('img'),
					'priority'   =>$this->input->post('priority'),
					'status'     =>$status,
					'map'   =>$this->input->post('map'),
					'link' => $this->seo($this->input->post("title")),
					'kategori'     =>$this->input->post('kategori'),
					'il'     =>$this->input->post('il'),
					'ilce'     =>$this->input->post('ilce'),
					'extra'     =>$this->input->post('extra'),
					'fiyat'     =>$this->input->post('fiyat'),
					'telefon'     =>$this->input->post('telefon'),
					'content'	 =>$this->input->post('content')
					);

		$this->db->insert('li_slider',$data);
		$mekan_id = $this->db->insert_id();

		$kosul2 = $this->db->affected_rows();

		if (isset($_FILES['mekan_resimler'])) {
			$files = $_FILES['mekan_resimler']['name'];
			$SITE_ROOT = "uplo4ds/files/";
			$move_upload = move_uploaded_file($_FILES['mekan_resimler']['tmp_name'][0], $SITE_ROOT.$_FILES['mekan_resimler']['name'][0]);
			
		
			$img = array();
			$files = $_FILES['mekan_resimler']['name'];
			
			foreach ($files as $key => $value) {
					$data2=array(
					'image_path'  	 =>$value,
					'mekan_id'		 =>$mekan_id
					);
			
			
			$this->db->insert("mekan_resimler",$data2);
			$kosul1 = $this->db->affected_rows();
			}
		}

		
		
		return ($kosul1 != 0 || $kosul2 != 0 ) ? true:false;
	}
	
	public function update_slider($id)
	{

		if($this->input->post('status')){$status=1;}else{$status=0;}
		if (isset($_FILES['mekan_resimler'])) {
			$files = $_FILES['mekan_resimler']['name'];
			$SITE_ROOT = "uplo4ds/files/";
			$move_upload = move_uploaded_file($_FILES['mekan_resimler']['tmp_name'][0], $SITE_ROOT.$_FILES['mekan_resimler']['name'][0]);
			

			
		
			$img = array();
			$files = $_FILES['mekan_resimler']['name'];
			
			foreach ($files as $key => $value) {
					$data2=array(
					
					'image_path'  	 =>$value,
					'mekan_id'		 =>$id

					);
			
			
			$this->db->insert("mekan_resimler",$data2);

			$kosul1 = $this->db->affected_rows();
			
			}
		}
		
		$data=array(
					
					'title'  	 =>$this->input->post('title'),
					'img'	 	 =>$this->input->post('img'),
					'priority'   =>$this->input->post('priority'),
					'status'     =>$status,
					'kategori'     =>$this->input->post('kategori'),
					'link' => $this->seo($this->input->post("title")),
					'il'     =>$this->input->post('il'),
					'ilce'     =>$this->input->post('ilce'),
					'extra'     =>$this->input->post('extra'),
					'telefon'     =>$this->input->post('telefon'),
					'fiyat'     =>$this->input->post('fiyat'),
					'map'		=>$this->input->post('map'),
					'content'	 =>$this->input->post('content'),

					);
		
        
        
		$this->db->where('id',$id);
		$this->db->update("li_slider",$data);
		$kosul2 = $this->db->affected_rows();
		return ($kosul1 != 0 || $kosul2 != 0 ) ? true:false;
	}

	public function update_slider_status($data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update("li_slider",$data);
		return ($this->db->affected_rows() == 1 ) ? true:false;
	}

	public function delete_slider($id)
	{
		$this->db->where("id='".$id."'");
		$this->db->delete('li_slider');
		return ($this->db->affected_rows() == 1 ) ? true:false;
	}

	public function delete_mekan_slider($id)
	{
		$this->db->where("id='".$id."'");
		$this->db->delete('mekan_resimler');
		return ($this->db->affected_rows() == 1 ) ? true:false;
	}

	public function delete_etkinlik_slider($id)
	{
		$this->db->where("id='".$id."'");
		$this->db->delete('etkinlik_resimler');
		return ($this->db->affected_rows() == 1 ) ? true:false;
	}




}
