<?php

class Category_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$this->load->library("pagination");
		$this->load->model('pagination_model');
	}

	public function category_data($id='')
	{
		$this->db->select("*");
		$this->db->from('li_categories');
		if($id){
			$this->db->where('id',$id);
		}
		$query =$this->db->get();
		return $query->result();
	}

	public function insert_category(){


		if($this->input->post('status')){$status=1;}else{$status=0;}

		$data=array('top_id'  	 =>0,
					'title'  	 =>$this->input->post('title'),
					'seo_url'	 =>seo($this->input->post('title')),
					'priority'   =>$this->input->post('priority'),
					'link'   =>$this->input->post('link'),
					'status'     =>$status
					);

		$this->db->insert('li_categories',$data);
		return ($this->db->affected_rows() != 1 ) ? false:true;
	}
	

	public function category_list($top_id, $show, $category){
		
		$where="id";
		
		if($this->session->userdata('query_category')){ $where.= " AND (title LIKE '%".$this->session->userdata('query_category')."%' )"; }

		if($this->session->userdata('datetime_category')){
			$date= explode(' - ', $this->session->userdata('datetime_category'));
			if(check_date($date[0]) && check_date($date[1])){
				$where.=" AND (times BETWEEN '".date('Y-m-d 00:00:00',strtotime($date[0]))."' AND '".date('Y-m-d 23:59:59',strtotime($date[1]))."') ";
			}else{
				$this->session->set_flashdata('msg0',"Tarih Alanı Hatalı");
			}
		}

		$sql="SELECT * FROM li_categories WHERE ".$where." AND top_id='".$top_id."' ORDER BY priority ASC";
		
		return  $this->pagination_model->get_list($sql,base_url("admin/categories/category_list/".$top_id."/".$show."/"),$show,$category,6);
		
	}

	public function category_navigator($id,$nav=''){
			
		$query 	= $this->db->query("SELECT * FROM li_categories WHERE id='".$id."'");
		
		if($query->num_rows()>0){
			$row = $query->row_array();
			$nav = '<li><a href="'.base_url().'admin/categories/category_list/'.$id.'/">'.$row["title"].'</a></li>'.$nav;
			if($row["top_id"]>0){
				$nav = $this->category_navigator($row["top_id"],$nav);
			}
		}
		return $nav;
	}

	public function category_selector($id=0,$nav='',$real_id=false){
		if(!$real_id){$real_id=$id;}
		if(!$id){
			$nav = $this->category_select_option().$nav;
		}else{

			$query 	= $this->db->query("SELECT * FROM li_categories WHERE id='".$id."'");
			if($query->num_rows()>0){
				
				$row = $query->row_array();
				$nav = $this->category_select_option($row["top_id"],$row["id"]).$nav;
				
				if($row["top_id"]!=0){
					return $this->category_selector($row["top_id"],$nav,$real_id);
				}else{

					$query 	= $this->db->query("SELECT * FROM li_categories WHERE top_id='".$real_id."'");
					if($query->num_rows()>0){
						$row = $query->row_array();
						$nav = $nav.$this->category_select_option($real_id);
					}
				}
			}
		}

		return $nav;
	}

	public function category_select_option($top_id=0,$id=0){
		$result='<select class="form-control m-b">';
		$result.='<option value="'.$top_id.'"></option>';
		$query 	= $this->db->query("SELECT * FROM li_categories WHERE top_id=".$top_id);
		foreach($query->result_array() as $row){
			if($row['id']==$id){
				$result .= '<option value="'.$row['id'].'" selected="selected">'.$row["title"].'</option>';
			}else{
				$result .= '<option value="'.$row['id'].'">'.$row["title"].'</option>';
			}
		}
		return $result.'</select>';
	}

	public function update_category($id)
	{
		if($this->input->post('status')){$status=1;}else{$status=0;}
		$data=array(
					'title'  	 =>$this->input->post('title'),
					'seo_url'	 =>seo($this->input->post('title')),
					'fotograf'	 =>$this->input->post('fotograf'),
					'priority'   =>$this->input->post('priority'),
					'link'   =>$this->input->post('link'),
					'status'     =>$status
					);

		if($this->input->post('top_id')!=$id){// sınırsız döngü olmaması için top_id kendi id si olarak atamayı engelleme
			$data['top_id']=$this->input->post('top_id');
		}
		
		$this->db->where('id',$id);
		$this->db->update("li_categories",$data);
		return ($this->db->affected_rows() == 1 || $this->db->affected_rows() == 2 ) ? true:false;
	}

	public function update_category_status($data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update("li_categories",$data);
		return ($this->db->affected_rows() == 1 ) ? true:false;
	}

	public function update_category_priority($data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update("li_categories",$data);
		return ($this->db->affected_rows() == 1 ) ? true:false;
	}

	public function delete_category($id)
	{
		$this->db->where("id='".$id."'");
		$this->db->delete('li_categories');

		$query 	= $this->db->query("SELECT * FROM li_categories WHERE top_id='".$id."'");
		
		if($query->num_rows()>0){
			
			foreach($query->result() as $row){
				$this->delete_category($row->id);
			}

		}
		return true;
	}


}
