<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		
		if(!$this->session->userdata('front_id')){
			$settings=$this->get_data();
			$this->session->set_userdata($settings[0]);
		}
		//print_r($this->session->all_userdata());

	}
	public function event(){

		return $this->db->select("baslik, icerik, img, tarih, link")
				->from("li_haberler")
				->where("kategori","genel")
				->limit(10)
				->get()
				->result();
	}

	public function blog_post(){

		return $this->db->select("title, content, img, date")
				->from("li_blog")
				->where("status","1")
				->get()
				->result();
	}


	public function tum_haberler(){

		return $this->db->select("baslik, icerik, img, tarih")
				->from("li_haberler")
				->where("status","1")
				->get()
				->result();
	}


	public function slider_galeri(){
		$bugun = array('kategori' => 'galeri' , 'tarih' => date("Y-m-d") );
		
		return $this->db->select("baslik, icerik, img, tarih")
				->from("li_haberler")
				->where($bugun)
				->limit(10)
				->get()
				->result();
	}

	public function galeri_slider(){
		
		
		return $this->db->select("baslik, icerik, img, tarih, link")
				->from("li_haberler")
				->where("kategori", "galeri")
				->limit(10)
				->get()
				->result();
	}

	public function video_page(){

		return $this->db->select("baslik, icerik, img, tarih")
				->from("li_haberler")
				->where("kategori","video")
				->get()
				->result();
	}

	public function sidebar_reklam(){

		return $this->db->select("*")
				->from("li_categories")
				->where("status","1")
				->get()
				->result();
	}

	

	public function footer_reklam(){

		return $this->db->select("*")
				->from("li_boats")
				->where("status","1")
				->get()
				->result();
	}

	


	public function get_data($id=1)
	{
		$this->db->select('id as front_id,
			title as front_title, 
			description as front_description, 
			keywords as front_keywords, 
			tel as front_tel, 
			tel2 as front_tel2, 
			email as front_email, 
			address as front_address');	
		$this->db->from('li_settings');
		if($id){$this->db->where('id',$id);}
		$query =$this->db->get();
		return $query->result_array();
	}

	public function county_select_option($parent_id=0, $id=0){

		$result ='<label for="county">İl<span style="color:red;">*</span></label><select class="form-control m-b"  name="county" id="county">';
		$result.='<option value="0">İl Seçiniz</option>';

		$query 	= $this->db->query("SELECT * FROM li_county WHERE parent_id=0 ORDER BY value ASC");
		foreach($query->result_array() as $row){
			if($row['id']==$parent_id){
				$result .= '<option value="'.$row['id'].'" selected="selected">'.$row["value"].'</option>';
			}else{
				$result .= '<option value="'.$row['id'].'">'.$row["value"].'</option>';
			}
		}
		$result.='</select>';
		if($parent_id==0){return $result;}
		else{
			$result.='</div><div class="form-group"><label for="town">İlçe<span style="color:red;">*</span></label><select class="form-control m-b"  name="town" id="town">';
			$result.='<option value="'.$parent_id.'">İlçe Seçiniz</option>';
			$query 	= $this->db->query("SELECT * FROM li_county WHERE parent_id=".$parent_id." ORDER BY value ASC");
			foreach($query->result_array() as $row){
				if($row['id']==$id){
					$result .= '<option value="'.$row['id'].'" selected="selected">'.$row["value"].'</option>';
				}else{
					$result .= '<option value="'.$row['id'].'">'.$row["value"].'</option>';
				}
			}
			return $result.'</select>';
			 
		}

	}

	public function get_definitions(){

		$this->db->select('definitions');	
		$this->db->from('li_settings');
		$this->db->where('id',1);
		$query =$this->db->get();
		return $query->result_array();
		
	}
	
	//Firmaya ait temel bilgileri. Sayfa title, sosyal medya hesapları vs.
	public function sayfa_bilgileri(){
		return $this->db->get("li_settings")->row_array();
		
	}

}
?>