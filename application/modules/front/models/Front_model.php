<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Front_model extends CI_Model {


	function __construct()
	{
		parent::__construct();

		$this->load->library("pagination");
		$this->load->model('pagination_model');
	}


	public function index()
	{

	}
	
	public function get_seo_url($seo_url){

		$data = "";
		$result = null;

		$pages 		= $this->db->query("SELECT * FROM li_pages WHERE seo_url = '".$seo_url."' ORDER BY priority");
		$categories = $this->db->query("SELECT * FROM li_categories WHERE seo_url = '".$seo_url."' ORDER BY priority");


		if ($pages->num_rows() > 0){
			$data = $pages->row_array();

			$result['modules'] 	= 'content';
			$result['id']		= $data['id'];

		}else if($categories->num_rows() > 0){
			
			$data = $categories->row_array();

			$result['modules'] 	= 'categories';
			$result['id']		= $data['id'];
		}

		return $result;
	}
	public function get_ilce($id){
		$query_ilce = $this->db->query("SELECT id, value FROM li_county where parent_id='".$id."' ORDER BY id asc");
		$result=$query_ilce->result_array();
		return $result;
	}
	

}
?>