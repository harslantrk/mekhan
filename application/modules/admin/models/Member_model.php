<?php

class Member_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$this->load->library("pagination");
		$this->load->model('pagination_model');
	}

	public function member_data($id='')
	{
		$this->db->select("*");
		$this->db->from('li_members');
		if($id){
			$this->db->where('id',$id);
		}
		$query =$this->db->get();
		return $query->result();
	}

	public function member_list($show, $page){
		
		$where="id";
		
		if($this->session->userdata('query_members')){ $where.= " AND (fullname LIKE '%".$this->session->userdata('query_members')."%' OR note LIKE '%".$this->session->userdata('query_members')."%')"; }

		if($this->session->userdata('datetime_members')){
			$date= explode(' - ', $this->session->userdata('datetime_members'));
			if(check_date($date[0]) && check_date($date[1])){
				$where.=" AND (times BETWEEN '".date('Y-m-d 00:00:00',strtotime($date[0]))."' AND '".date('Y-m-d 23:59:59',strtotime($date[1]))."') ";
			}else{
				$this->session->set_flashdata('msg0',"Tarih Alanı Hatalı");
			}
		}

		$sql="SELECT * FROM li_members WHERE ".$where." ORDER BY id DESC";
		
		return  $this->pagination_model->get_list($sql,base_url("admin/members/member_list/".$show."/"),$show,$page,5);
		
	}

	public function insert_member(){

		if($this->input->post('status')){$status=1;}else{$status=0;}

		$data=array(
					'ad'  =>$this->input->post('fullname'),
					'email'     =>$this->input->post('member_email'),
					'password'	=>md5($this->input->post('password')),
					'status'    =>$status
					);

		$this->db->insert('li_members',$data);
		return ($this->db->affected_rows() != 1 ) ? false:true;
	}
	
	public function update_member($id)
	{
		if($this->input->post('status')){$status=1;}else{$status=0;}

		$data=array(
					'ad'  =>$this->input->post('fullname'),
					'email'     =>$this->input->post('member_email'),
					'password'	=>md5($this->input->post('password')),
					'ip'   		=>$this->input->ip_address(),
					'status'    =>$status
					);

		if($this->input->post('password')){
			$data['password']=md5( $this->input->post('password') );
		}

		$this->db->where('id',$id);
		$this->db->update("li_members",$data);
		return ($this->db->affected_rows() == 1 || $this->db->affected_rows() == 2 ) ? true:false;
	}

	public function update_member_status($data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update("li_members",$data);
		return ($this->db->affected_rows() == 1 ) ? true:false;
	}

	public function delete_member($id)
	{

		$this->db->where("id", $id)->delete("li_members");
		return ($this->db->affected_rows() != 0 ) ? true:false;
	}

	public function add_img($id){
			
		$this->load->helper('specials_helper');
		$config['upload_path'] = './uploads/member';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$this->load->library('upload', $config);

		if($this->upload->do_upload('file')){ 
			$newimg = date("Y.m.d-h.i.s")."-".seo_url($this->upload->orig_name);		
			$config['image_library'] 	= 'gd2';
			$config['source_image']		= $this->upload->upload_path."/".$this->upload->orig_name;
			
			$config['new_image']		= $this->upload->upload_path."/L/".$newimg;
			$config['width']			= 1920;
			$config['height']			= 1080;
			$this->load->library('image_lib',$config);
			$this->image_lib->resize();
			$this->image_lib->clear();

			$config['new_image']		= $this->upload->upload_path."/M/".$newimg;
			$config['width']			= 640;
			$config['height']			= 480;
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			$this->image_lib->clear();

			$config['new_image']		= $this->upload->upload_path."/S/".$newimg;
			$config['width']			= 200;
			$config['height']			= 150;
			$this->image_lib->initialize($config); 
			$this->image_lib->resize();
			$this->image_lib->clear();

			$config['new_image']		= $this->upload->upload_path."/XS/".$newimg;
			$config['width']			= 60;
			$config['height']			= 60;
			$this->image_lib->initialize($config); 
			$this->image_lib->resize();
			$this->image_lib->clear();
			
			@unlink($this->upload->upload_path."/".$this->upload->orig_name);
			
			$img_url=$this->db->query('SELECT img FROM li_members WHERE id='.$id);
			if($img_url->num_rows()>0){// önceki resimleri siliyoruz
				$img_url=$img_url->row_array();
				@unlink($this->upload->upload_path."/L/".$img_url['img']);
				@unlink($this->upload->upload_path."/M/".$img_url['img']);
				@unlink($this->upload->upload_path."/S/".$img_url['img']);
				@unlink($this->upload->upload_path."/XS/".$img_url['img']);
			}

			$data = array('img' => $newimg);
			$this->db->where('id',$id);
			$this->db->update('li_members',$data);
			return $this->img_list($id);
		}			
			
	}
	
	
	public function img_list($id){
		$list='<div class="hr-line-dashed"></div>';
		$query = $this->db->query("SELECT * from li_members WHERE id='".$id."'");
		if($query->num_rows()>0){
			foreach($query->result() as $val){
				if($val->img){$imgs=base_url().'uploads/member/S/'.$val->img; $imgl=base_url().'uploads/member/L/'.$val->img;}else{$imgs=base_url().'uploads/no-avatar.png';$imgl=base_url().'uploads/no-avatar.png';}
				$list .= '<div><a href="'.$imgl.'" title="'.$val->fullname.'" data-gallery=""><img src="'.$imgs.'" /></a>';
				if($val->img){
					$list .= '<button data-id="'.$val->id.'" rel="tooltip" data-title="Profil Resmi" title="Sil" data-toggle="modal" data-target="#delApprove" class="delete-img btn btn-danger btn-circle" type="button" style="position:absolute; margin:-5px 0px 0px -20px;"><i class="fa fa-times"></i></button>';
				}
				$list .= '</div>';
			}
		}
		return $list;
	}

	public function img_delete($id){
		$img_url=$this->db->query("SELECT img FROM li_members WHERE id='".$id."'");
		if($img_url->num_rows()>0){
			$img_url=$img_url->row_array();
			@unlink("./uploads/member/L/".$img_url['img']);
			@unlink("./uploads/member/M/".$img_url['img']);
			@unlink("./uploads/member/S/".$img_url['img']);
			@unlink("./uploads/member/XS/".$img_url['img']);
		}
		$data = array('img' => NULL);
		$this->db->where('id',$id);
		$this->db->update('li_members',$data);
		return $this->img_list($id);
	}

}
