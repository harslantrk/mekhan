<?php

class Page_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$this->load->library("pagination");
		$this->load->model('pagination_model');
	}

	public function page_data($id='')
	{
		$this->db->select("*");
		$this->db->from('li_pages');
		if($id){
			$this->db->where('id',$id);
		}
		$query =$this->db->get();
		return $query->result();
	}

	public function insert_page(){

		if($this->input->post('status')){$status=1;}else{$status=0;}

		$data=array('top_id'  	 =>$this->input->post('top_id'),
					'title'  	 =>$this->input->post('title'),
					'seo_url'	 =>$this->input->post('seo_url'),
					'content'	 =>$this->input->post('content'),
					'description'=>$this->input->post('description'),
					'keywords'	 =>$this->input->post('keywords'),
					'priority'   =>$this->input->post('priority'),
					'status'     =>$status
					);

		$this->db->insert('li_pages',$data);
		return ($this->db->affected_rows() != 1 ) ? false:true;
	}
	

	public function page_list($top_id, $show, $page){
		
		$where="id";
		
		if($this->session->userdata('query_page')){ $where.= " AND (title LIKE '%".$this->session->userdata('query_page')."%' OR content LIKE '%".$this->session->userdata('query_page')."%')"; }

		if($this->session->userdata('datetime_page')){
			$date= explode(' - ', $this->session->userdata('datetime_page'));
			if(check_date($date[0]) && check_date($date[1])){
				$where.=" AND (times BETWEEN '".date('Y-m-d 00:00:00',strtotime($date[0]))."' AND '".date('Y-m-d 23:59:59',strtotime($date[1]))."') ";
			}else{
				$this->session->set_flashdata('msg0',"Tarih Alanı Hatalı");
			}
		}

		$sql="SELECT * FROM li_pages WHERE ".$where." AND top_id='".$top_id."' ORDER BY priority ASC";
		
		return  $this->pagination_model->get_list($sql,base_url("admin/pages/page_list/".$top_id."/".$show."/"),$show,$page,6);
		
	}

	public function page_navigator($id,$nav=''){
			
		$query 	= $this->db->query("SELECT * FROM li_pages WHERE id='".$id."'");
		
		if($query->num_rows()>0){
			$row = $query->row_array();
			$nav = '<li><a href="'.base_url().'admin/pages/page_list/'.$id.'/">'.$row["title"].'</a></li>'.$nav;
			if($row["top_id"]>0){
				$nav = $this->page_navigator($row["top_id"],$nav);
			}
		}
		return $nav;
	}

	public function page_selector($id=0,$nav='',$real_id=false){
		if(!$real_id){$real_id=$id;}
		if(!$id){
			$nav = $this->page_select_option().$nav;
		}else{

			$query 	= $this->db->query("SELECT * FROM li_pages WHERE id='".$id."'");
			if($query->num_rows()>0){
				
				$row = $query->row_array();
				$nav = $this->page_select_option($row["top_id"],$row["id"]).$nav;
				
				if($row["top_id"]!=0){
					return $this->page_selector($row["top_id"],$nav,$real_id);
				}else{

					$query 	= $this->db->query("SELECT * FROM li_pages WHERE top_id='".$real_id."'");
					if($query->num_rows()>0){
						$row = $query->row_array();
						$nav = $nav.$this->page_select_option($real_id);
					}
				}
			}
		}

		return $nav;
	}

	public function page_select_option($top_id=0,$id=0){
		$result='<select class="form-control m-b">';
		$result.='<option value="'.$top_id.'"></option>';
		$query 	= $this->db->query("SELECT * FROM li_pages WHERE top_id=".$top_id);
		foreach($query->result_array() as $row){
			if($row['id']==$id){
				$result .= '<option value="'.$row['id'].'" selected="selected">'.$row["title"].'</option>';
			}else{
				$result .= '<option value="'.$row['id'].'">'.$row["title"].'</option>';
			}
		}
		return $result.'</select>';
	}

	public function update_page($id)
	{
		if($this->input->post('status')){$status=1;}else{$status=0;}
		$data=array(
					'title'  	 =>$this->input->post('title'),
					'seo_url'	 =>$this->input->post('seo_url'),
					'content'	 =>$this->input->post('content'),
					'description'=>$this->input->post('description'),
					'keywords'	 =>$this->input->post('keywords'),
					'priority'   =>$this->input->post('priority'),
					'status'     =>$status
					);

		if($this->input->post('top_id')!=$id){// sınırsız döngü olmaması için top_id kendi id si olarak atamayı engelleme
			$data['top_id']=$this->input->post('top_id');
		}
		
		$this->db->where('id',$id);
		$this->db->update("li_pages",$data);
		return ($this->db->affected_rows() == 1 || $this->db->affected_rows() == 2 ) ? true:false;
	}

	public function update_page_status($data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update("li_pages",$data);
		return ($this->db->affected_rows() == 1 ) ? true:false;
	}

	public function update_page_priority($data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update("li_pages",$data);
		return ($this->db->affected_rows() == 1 ) ? true:false;
	}

	public function delete_page($id)
	{
		$this->db->where("id='".$id."'");
		$this->db->delete('li_pages');

		$query 	= $this->db->query("SELECT * FROM li_pages WHERE top_id='".$id."'");
		
		if($query->num_rows()>0){
			
			foreach($query->result() as $row){
				$this->delete_page($row->id);
			}

		}
		return true;
	}


}
