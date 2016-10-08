<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pages_model extends CI_Model {

	public $get_sidebar_list;

	function __construct()
	{
		parent::__construct();

		$this->load->library("pagination");
		$this->load->model('pagination_model');
	}


	public function index()
	{

	}
	
	public function get_data($id){

		$data = "";

		$query = $this->db->query("SELECT * FROM li_pages WHERE id = '".$id."' OR seo_url = '".$id."'");

		if ($query->num_rows() > 0){
			$data = $query->row_array();
		}

		return $data;

	}

	public function get_pages_list($top_id=0){

		$data = "";

		$query = $this->db->query("SELECT * FROM li_pages WHERE top_id = '".$top_id."' and status = '1' ORDER BY priority");

		if ($query->num_rows() > 0){
			$data = $query->result_array();
		}

		return $data;

	}
	public function get_sidebar_list($top_id=''){
		
		if($top_id!=''){
			$query = $this->db->query("SELECT * FROM li_pages WHERE top_id = '".$top_id."' and status = '1' ORDER BY priority");
		}else{
			$query = $this->db->query("SELECT * FROM li_pages WHERE status = '1' ORDER BY priority");
		}

		$data = $query->result_array(); 
		    
		if ($query->num_rows() > 0){

			foreach ($data as $row):
				$items[$row['top_id']][] = $row;
			endforeach;

			$this->foreach_list($items);
			return $this->get_sidebar_list;
		}

	}

	public function foreach_list($items=null, $top_id=""){

		$index = $top_id == null ? '0' : $top_id;

		if (isset($items[$index])){

			$ul_class 	= $top_id == null ? '<ul class="nav navbar-nav navbar-right">' : '<ul>' ;

			$li_class 	= $top_id == null ? 'class="dropdown"' : 'class=""';


			$this->get_sidebar_list .= ''. $ul_class.'';

			foreach ($items[$index] as $child) {

				if($child['seo_url']=='/'){$child['seo_url']='';}
				
				$li=$li_class;

				$this->get_sidebar_list .= '<li '.$li.'>';
				
				$this->get_sidebar_list .= '<a href="'.base_url().$child['seo_url'].'"  >'.$child['title'].'</a>';				
				
				$this->foreach_list($items, $child['id']);

				$this->get_sidebar_list .= '</li>';

			}
			if($top_id == null){$this->get_sidebar_list .= '</ul>';}else{$this->get_sidebar_list .= '</ul>';}
			
		}

	}

	public function sub_id_control($id=0){

		$query = $this->db->query('SELECT * FROM li_pages WHERE top_id="'.$id.'" AND status = "1" ORDER BY priority');

		return $query->num_rows();

	}






}
?>