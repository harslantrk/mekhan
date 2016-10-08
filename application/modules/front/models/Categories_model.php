<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Categories_model extends CI_Model {

	public $get_pages_list;

	function __construct()
	{
		parent::__construct();
		$this->load->library("pagination");
		$this->load->model('pagination_model');
		$this->load->helper('security');
	}
	public function index()
	{
	}
	public function get_data($id){
		$data = "";
		$query = $this->db->query("SELECT * FROM li_categories WHERE id = '".$id."' AND status = '1' ORDER BY priority");
		if ($query->num_rows() > 0){
			$data = $query->result_array();
		}
		return $data;
	}
	public function get_category_title($id){
		$data = "";
		$query = $this->db->query("SELECT `title` FROM li_categories WHERE id = '".$id."'");
		if ($query->num_rows() > 0){
			$data = $query->result_array();
		}
		return $data;
	}
	public function get_breadcrumb_category_name($id)
	{
		$data = "";
		$query = $this->db->query("SELECT `id`, `title`, `top_id`, `seo_url` FROM li_categories WHERE id = '".$id."'");
		if ($query->num_rows() > 0){
			$to_data = $query->result_array();
			foreach($to_data as $to_data_one){$data[]=$to_data_one;}
		}
		foreach($data as $data_one){$data_one=$data_one;}
		if($data_one['top_id']!=0)
		{
			$query_top = $this->db->query("SELECT `title`, `top_id`, `seo_url` FROM li_categories WHERE id = '".$data_one['top_id']."'");
			if ($query_top->num_rows() > 0){
				$to_data_2 = $query_top->result_array();
				foreach($to_data_2 as $to_data_one_2){$data[]=$to_data_one_2;}
			}
		}
		return $data;
	}
	public function get_list_for_categories($id = null){
		$query = $this->db->query("SELECT * FROM li_categories WHERE status = '1' and top_id='$id' ORDER BY title");
		$data = $query->result_array();
		return $data;
	}
	public function get_list($id = null){
		$query = $this->db->query('SELECT * FROM li_categories WHERE status = "1" ORDER BY priority');
		$data = $query->result_array();
		if ($query->num_rows() > 0){
			foreach ($data as $row):
				$items[$row['top_id']][] = $row;
			endforeach;
			$this->foreach_list($items);
			return $this->get_pages_list;
		}
	}
	public function foreach_list($items, $top_id=null){
		$index = $top_id == null ? '0' : $top_id;
		if (isset($items[$index])){
			//$ul_class 	= $top_id == null ? 'class="nav navbar-nav"' : 'class="dropdown-menu"';
			if($top_id==0)
			{
				//$this->get_pages_list .= '<ul '. $ul_class.'>';
			foreach ($items[$index] as $child) {
				//$this->get_pages_list .= '<li class="dropdown">';
				if($this->uri->segment(1)==$child['seo_url'])
				{
					$this->get_pages_list .= '<a class="navbar_a_active" href="'.base_url().''.$child['seo_url'].'">'.$child['title'].'</a>';
				}
				else
				{
					$ask_top = $this->db->query("SELECT top_id FROM li_categories WHERE seo_url = '".$this->uri->segment(1)."' ORDER BY priority");
					$ask_top_data = $ask_top->row_array();
					if($ask_top_data['top_id']==$child['id'])
					{
						$this->get_pages_list .= '<a class="navbar_a_active" href="'.base_url().''.$child['seo_url'].'">'.$child['title'].'</a>';
					}
					else
					{
						$this->get_pages_list .= '<a class="navbar_a" href="'.base_url().''.$child['seo_url'].'">'.$child['title'].'</a>';
					}
				}
				$this->foreach_list($items, $child['id']);
				//$this->get_pages_list .= '</li>';
			}
			//$this->get_pages_list .= '</ul>';
			}
		}
	}
	public function footer_list(){
		$data = "";
		$query = $this->db->query("SELECT * FROM li_categories WHERE top_id = '0' and status = '1' ORDER BY priority");
		if ($query->num_rows() > 0){
			$data = $query->result_array();
		}
		return $data;
	}
	public function get_list_all($id = null){
		$query = $this->db->query("SELECT id, top_id, title, seo_url FROM li_categories WHERE status = '1' and top_id='0' ORDER BY priority");
		$query_array = $query->result_array();
		foreach($query_array as $query_array_one):
			$query_sub=$this->db->query("SELECT id, top_id, title, seo_url FROM li_categories WHERE status = '1' and top_id='".$query_array_one['id']."' ORDER BY priority");
			if ($query_sub->num_rows() > 0){
				$query_array_one[]=$query_sub->result_array();
				$data[]=$query_array_one;
			}
		endforeach;
		return $data;
	}
	/////kategoriye göre listeleme
	public function search_in_categories(){
			$seo_url=$this->security->xss_clean($this->uri->segment(1));
			$get_cat_id = $this->db->query("select id, top_id from li_categories where seo_url='$seo_url'");
			$get_cat_id_result=$get_cat_id->row_array();
			$sql_cat_type=NULL;
			$get_sub_cats_sentence=NULL;
			if($get_cat_id_result['top_id']==0)
			{
				$get_sub_cats = $this->db->query("select id from li_categories where top_id='".$get_cat_id_result['id']."'");
				$get_sub_cats_result=$get_sub_cats->result_array();
				$total_get_sub_cats_result=count($get_sub_cats_result);
				$count_get_sub_cats_result=1;
				foreach($get_sub_cats_result as $get_sub_cats_result_one)
				{
					if($count_get_sub_cats_result==1)
					{
						$get_sub_cats_sentence.="('".$get_sub_cats_result_one['id']."'";
					}
					else
					{
						$get_sub_cats_sentence.=",'".$get_sub_cats_result_one['id']."'";
					}
					if($count_get_sub_cats_result==$total_get_sub_cats_result)
					{
						$get_sub_cats_sentence.=")";
					}
					$count_get_sub_cats_result++;
				}
				$sql_cat_type='exists';
			}
			else
			{
				$sql_cat_type='normal';
			}
			if($this->input->get('sayfa'))
			{
				$sayfa=$this->security->xss_clean($this->input->get('sayfa'));
			}
			else
			{
				$sayfa=1;
			}
			$limit_sentence=NULL;
			$limit_sentence.=' limit ';
			$perPage=12;
			if($sayfa==0)
			{
				$sayfa=1;
			}
			elseif($sayfa==1)
			{
				$start=0;
			}
			elseif($sayfa>1)
			{
				$start=($perPage*$sayfa)-1;
			}
			$limit_sentence.=$start.', '.$perPage;
			if($sql_cat_type=='normal')
			{
				$query = $this->db->query("select li_services.id as service_id, li_services.member_id, li_services.county as county_service, li_services.town as town_service, li_services.cat_id, (select title from li_categories where id=li_services.cat_id) as cat_name, li_services.title, li_services.details, li_services.tel, li_members.firm, li_members.fullname, li_members.county as county_member, (select value from li_county where id=li_members.county) as county_name_member, li_members.town as town_member, (select value from li_county where id=li_members.town) as town_name_member, li_members.img from li_services, li_members where li_members.id=li_services.member_id and li_members.status = 1 and li_services.status = 1 and cat_id='".$get_cat_id_result['id']."' order by li_services.id desc ".$limit_sentence);
			}
			elseif($sql_cat_type=='exists')
			{
				$query = $this->db->query("select li_services.id as service_id, li_services.member_id, li_services.county as county_service, li_services.town as town_service, li_services.cat_id, (select title from li_categories where id=li_services.cat_id) as cat_name, li_services.title, li_services.details, li_services.tel, li_members.firm, li_members.fullname, li_members.county as county_member, (select value from li_county where id=li_members.county) as county_name_member, li_members.town as town_member, (select value from li_county where id=li_members.town) as town_name_member, li_members.img from li_services, li_members where li_members.id=li_services.member_id and li_members.status = 1 and li_services.status = 1 and cat_id in ".$get_sub_cats_sentence." order by li_services.id desc ".$limit_sentence);
			}
			$result=$query->result_array();
			$data=array();
			$data_row=array();
			foreach($result as $result_one)
			{
				$data_row['service_id']=$result_one['service_id'];
				$data_row['member_id']=$result_one['member_id'];
				$data_row['cat_id']=$result_one['cat_id'];
				$data_row['cat_name']=$result_one['cat_name'];
				//burada cat idsinden ust cat name ini cekicez
				$ask_cat=$this->db->query("select top_id from li_categories where id='".$data_row['cat_id']."'");
				$ask_cat_result=$ask_cat->row_array();
				if($ask_cat_result['top_id']==0)
				{
					$data_row['top_cat_name']=$result_one['cat_name'];
				}
				else
				{
					$ask_cat_name=$this->db->query("select title from li_categories where id='".$ask_cat_result['top_id']."'");
					$ask_cat_name_result=$ask_cat_name->row_array();
					$data_row['top_cat_name']=$ask_cat_name_result['title'];
				}
				$data_row['title']=$result_one['title'];
				$data_row['details']=$result_one['details'];
				$data_row['tel']=$result_one['tel'];
				$data_row['firm']=$result_one['firm'];
				$data_row['full_name']=$result_one['fullname'];
				$data_row['county_member']=$result_one['county_member'];
				$data_row['town_member']=$result_one['town_member'];
				$data_row['county_name_member']=$result_one['county_name_member'];
				$data_row['town_name_member']=$result_one['town_name_member'];
				$data_county_service_name=NULL;
				$data_town_service_name=NULL;
				if($result_one['county_service']!='')
				{
					if(stristr($result_one['county_service'], ','))
					{
						$result_one_county_service=explode(',', $result_one['county_service']);
						foreach($result_one_county_service as $result_one_county_service_one)
						{
							$result_one_county_service_query=$this->db->query("select value from li_county where id='$result_one_county_service_one'");
							$result_one_county_service_result=$result_one_county_service_query->row_array();
							if($data_county_service_name==''){$data_county_service_name=$result_one_county_service_result['value'];}else{$data_county_service_name.='|'.$result_one_county_service_result['value'];}
						}
					}
					else
					{
						$result_one_county_service_query=$this->db->query("select value from li_county where id='".$result_one['county_service']."'");
						$result_one_county_service_result=$result_one_county_service_query->row_array();
						if($data_county_service_name==''){$data_county_service_name=$result_one_county_service_result['value'];}else{$data_county_service_name.='|'.$result_one_county_service_result['value'];}
						if(stristr($result_one['town_service'], ','))
						{
							$result_one_town_service=explode(',', $result_one['town_service']);
							foreach($result_one_town_service as $result_one_town_service_one)
							{
								$result_one_town_service_query=$this->db->query("select value from li_county where id='$result_one_town_service_one'");
								$result_one_town_service_result=$result_one_town_service_query->row_array();
								if($data_town_service_name==''){$data_town_service_name=$result_one_town_service_result['value'];}else{$data_town_service_name.='|'.$result_one_town_service_result['value'];}
							}
						}
						else
						{
							$result_one_town_service_query=$this->db->query("select value from li_county where id='".$result_one['town_service']."'");
							$result_one_town_service_result=$result_one_town_service_query->row_array();
							if($data_town_service_name==''){$data_town_service_name=$result_one_town_service_result['value'];}else{$data_town_service_name.='|'.$result_one_town_service_result['value'];}
						}
					}
				}
				$data_row['county_name_service']=$data_county_service_name;
				$data_row['town_name_service']=$data_town_service_name;
				$data_county_service_name=NULL;
				$data_town_service_name=NULL;
				unset($data_county_service_name);
				unset($data_town_service_name);
				$data_row['img']=$result_one['img'];
				$data[]=$data_row;
				$data_row=NULL;
				unset($data_row);
			}
			return $data;
		}
		public function search_in_categories_total(){
			$seo_url=$this->security->xss_clean($this->uri->segment(1));
			$get_cat_id = $this->db->query("select id, top_id from li_categories where seo_url='$seo_url'");
			$get_cat_id_result=$get_cat_id->row_array();
			$sql_cat_type=NULL;
			$get_sub_cats_sentence=NULL;
			if($get_cat_id_result['top_id']==0)
			{
				$get_sub_cats = $this->db->query("select id from li_categories where top_id='".$get_cat_id_result['id']."'");
				$get_sub_cats_result=$get_sub_cats->result_array();
				$total_get_sub_cats_result=count($get_sub_cats_result);
				$count_get_sub_cats_result=1;
				foreach($get_sub_cats_result as $get_sub_cats_result_one)
				{
					if($count_get_sub_cats_result==1)
					{
						$get_sub_cats_sentence.="('".$get_sub_cats_result_one['id']."'";
					}
					else
					{
						$get_sub_cats_sentence.=",'".$get_sub_cats_result_one['id']."'";
					}
					if($count_get_sub_cats_result==$total_get_sub_cats_result)
					{
						$get_sub_cats_sentence.=")";
					}
					$count_get_sub_cats_result++;
				}
				$sql_cat_type='exists';
			}
			else
			{
				$sql_cat_type='normal';
			}
			if($this->input->get('sayfa'))
			{
				$sayfa=$this->security->xss_clean($this->input->get('sayfa'));
			}
			else
			{
				$sayfa=1;
			}
			if($sql_cat_type=='normal')
			{
				$queryTotal=$this->db->query("select li_services.id from li_services, li_members where li_members.id=li_services.member_id and li_members.status = 1 and li_services.status = 1 and cat_id='".$get_cat_id_result['id']."' order by li_services.id desc");
			}
			elseif($sql_cat_type=='exists')
			{
				$queryTotal=$this->db->query("select li_services.id from li_services, li_members where li_members.id=li_services.member_id and li_members.status = 1 and li_services.status = 1 and cat_id in ".$get_sub_cats_sentence." order by li_services.id desc");
			}
			$num = $queryTotal->num_rows();
			return $num;
		}
		public function search_in_categories_possible_pages(){
			$seo_url=$this->security->xss_clean($this->uri->segment(1));
			$get_cat_id = $this->db->query("select id, top_id from li_categories where seo_url='$seo_url'");
			$get_cat_id_result=$get_cat_id->row_array();
			$sql_cat_type=NULL;
			$get_sub_cats_sentence=NULL;
			if($get_cat_id_result['top_id']==0)
			{
				$get_sub_cats = $this->db->query("select id from li_categories where top_id='".$get_cat_id_result['id']."'");
				$get_sub_cats_result=$get_sub_cats->result_array();
				$total_get_sub_cats_result=count($get_sub_cats_result);
				$count_get_sub_cats_result=1;
				foreach($get_sub_cats_result as $get_sub_cats_result_one)
				{
					if($count_get_sub_cats_result==1)
					{
						$get_sub_cats_sentence.="('".$get_sub_cats_result_one['id']."'";
					}
					else
					{
						$get_sub_cats_sentence.=",'".$get_sub_cats_result_one['id']."'";
					}
					if($count_get_sub_cats_result==$total_get_sub_cats_result)
					{
						$get_sub_cats_sentence.=")";
					}
					$count_get_sub_cats_result++;
				}
				$sql_cat_type='exists';
			}
			else
			{
				$sql_cat_type='normal';
			}
			if($sql_cat_type=='normal')
			{
				$queryTotal=$this->db->query("select li_services.id from li_services, li_members where li_members.id=li_services.member_id and li_members.status = 1 and li_services.status = 1 and cat_id='".$get_cat_id_result['id']."' order by li_services.id desc");
			}
			elseif($sql_cat_type=='exists')
			{
				$queryTotal=$this->db->query("select li_services.id from li_services, li_members where li_members.id=li_services.member_id and li_members.status = 1 and li_services.status = 1 and cat_id in ".$get_sub_cats_sentence." order by li_services.id desc");
			}
			$num = $queryTotal->num_rows();
			$perPage=12;
			$remain=$num%$perPage;
			$result=($num-$remain)/$perPage;
			$possiblePages=0;
			if($remain==0)
			{
				$possiblePages=$result;
			}
			else
			{
				$possiblePages=$result+1;
			}
			return $possiblePages;
		}
}
?>