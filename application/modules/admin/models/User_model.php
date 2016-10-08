<?php

class User_model extends CI_Model 
{

	
	public function user_data($id='')
	{
		$this->db->select("*, li_users.id as id");
		$this->db->from('li_users');
		if($id){
			$this->db->where('li_users.id',$id);
			$this->db->join('li_auth', 'li_auth.user_id = li_users.id');
		}else{
			$this->db->where('li_users.id!=1 AND li_users.id!=2');
		}
		$query =$this->db->get();
		return $query->result();
	}

	public function insert_user()
	{
		$data=array('fullname'=>$this->input->post('fullname'),
						'username'=>$this->input->post('username'),
						'password'=>md5($this->input->post('password')),
						'email'=>$this->input->post('email'),
						'tel'=>$this->input->post('tel'),
						'status'=>1);
		
		////////////////////////////////////////////////// authority
		$auth=array(
			'pages'=>'',
			'categories'=>'',
			'users'=>'',
			'logs'=>'',
			'settings'=>''
		);

		$members=array();
		if($this->input->post('members_insert')){ array_push($members,"insert"); }
		if($this->input->post('members_list')){ array_push($members,"list"); }
		if($this->input->post('members_status')){ array_push($members,"status"); }
		if($this->input->post('members_update')){ array_push($members,"update"); }
		if($this->input->post('members_delete')){ array_push($members,"delete"); }
		$auth['members']=implode(',',$members);

		$services=array();
		if($this->input->post('services_list')){ array_push($services,"list"); }
		if($this->input->post('services_status')){ array_push($services,"status"); }
		if($this->input->post('services_update')){ array_push($services,"update"); }
		if($this->input->post('services_delete')){ array_push($services,"delete"); }
		$auth['services']=implode(',',$services);

		$bids=array();
		if($this->input->post('bids_list')){ array_push($bids,"list"); }
		if($this->input->post('bids_status')){ array_push($bids,"status"); }
		if($this->input->post('bids_update')){ array_push($bids,"update"); }
		if($this->input->post('bids_delete')){ array_push($bids,"delete"); }
		$auth['bids']=implode(',',$bids);

		$customers=array();
		if($this->input->post('customers_insert')){ array_push($customers,"insert"); }
		if($this->input->post('customers_list')){ array_push($customers,"list"); }
		if($this->input->post('customers_status')){ array_push($customers,"status"); }
		if($this->input->post('customers_priority')){ array_push($customers,"priority"); }
		if($this->input->post('customers_update')){ array_push($customers,"update"); }
		if($this->input->post('customers_delete')){ array_push($customers,"delete"); }
		$auth['customers']=implode(',',$customers);

		$gallery=array();
		if($this->input->post('gallery_insert')){ array_push($gallery,"insert"); }
		if($this->input->post('gallery_list')){ array_push($gallery,"list"); }
		if($this->input->post('gallery_status')){ array_push($gallery,"status"); }
		if($this->input->post('gallery_priority')){ array_push($gallery,"priority"); }
		if($this->input->post('gallery_update')){ array_push($gallery,"update"); }
		if($this->input->post('gallery_delete')){ array_push($gallery,"delete"); }
		$auth['gallery']=implode(',',$gallery);

		$slider=array();
		if($this->input->post('slider_insert')){ array_push($slider,"insert"); }
		if($this->input->post('slider_list')){ array_push($slider,"list"); }
		if($this->input->post('slider_status')){ array_push($slider,"status"); }
		if($this->input->post('slider_priority')){ array_push($slider,"priority"); }
		if($this->input->post('slider_update')){ array_push($slider,"update"); }
		if($this->input->post('slider_delete')){ array_push($slider,"delete"); }
		$auth['slider']=implode(',',$slider);


		$blog=array();
		if($this->input->post('slider_insert')){ array_push($blog,"insert"); }
		if($this->input->post('slider_list')){ array_push($blog,"list"); }
		if($this->input->post('slider_status')){ array_push($blog,"status"); }
		if($this->input->post('slider_priority')){ array_push($blog,"priority"); }
		if($this->input->post('slider_update')){ array_push($blog,"update"); }
		if($this->input->post('slider_delete')){ array_push($blog,"delete"); }
		$auth['blog']=implode(',',$blog);



		$categories=array();
		if($this->input->post('categories_insert')){ array_push($categories,"insert"); }
		if($this->input->post('categories_list')){ array_push($categories,"list"); }
		if($this->input->post('categories_status')){ array_push($categories,"status"); }
		if($this->input->post('categories_priority')){ array_push($categories,"priority"); }
		if($this->input->post('categories_update')){ array_push($categories,"update"); }
		if($this->input->post('categories_delete')){ array_push($categories,"delete"); }
		$auth['categories']=implode(',',$categories);

		$pages=array();
		if($this->input->post('pages_insert')){ array_push($pages,"insert"); }
		if($this->input->post('pages_list')){ array_push($pages,"list"); }
		if($this->input->post('pages_status')){ array_push($pages,"status"); }
		if($this->input->post('pages_priority')){ array_push($pages,"priority"); }
		if($this->input->post('pages_update')){ array_push($pages,"update"); }
		if($this->input->post('pages_delete')){ array_push($pages,"delete"); }
		$auth['pages']=implode(',',$pages);
		
		$users=array();
		if($this->input->post('users_insert')){ array_push($users,"insert"); }
		if($this->input->post('users_list')){ array_push($users,"list"); }
		if($this->input->post('users_status')){ array_push($users,"status"); }
		if($this->input->post('users_update')){ array_push($users,"update"); }
		if($this->input->post('users_delete')){ array_push($users,"delete"); }
		$auth['users']=implode(',',$users);
		
		if($this->input->post('logs_list')){ $auth['logs']='list'; }
		if($this->input->post('definitions_update')){ $auth['definitions']='update'; }
		if($this->input->post('settings_update')){ $auth['settings']='update'; }
		////////////////////////////////////////////////// authority

		$this->db->insert('li_users',$data);

		$sql  = "INSERT INTO li_auth";
	    $sql .= " (`user_id`,`".implode("`, `", array_keys($auth))."`)";
	    $sql .= " VALUES ('".$this->db->insert_id()."','".implode("', '", $auth)."') ";
	    $this->db->query($sql);

		return ($this->db->affected_rows() != 1 ) ? false:true;
	}

	public function update_user_status($data,$id)
	{

		$this->db->where('id',$id);
		$this->db->update('li_users',$data);
		if($this->session->userdata('id')==$id){
			$this->db->select('*');	
			$this->db->from('li_users');
			$this->db->where('id',$id);
			$query =$this->db->get();
			$this->session->set_userdata($query->row_array());
		}
		return ($this->db->affected_rows() != 1 ) ? false:true;
	}
	
	public function update_user($id)
	{
		$data=array("u.fullname='".$this->input->post('fullname')."'",
					"u.username='".$this->input->post('username')."'",
					"u.email='".$this->input->post('email')."'",
					"u.tel='".$this->input->post('tel')."'"
		);

		////////////////////////////////////////////////// authority
		if($id!=$this->session->userdata('id')){


			$members=array();
			if($this->input->post('members_insert')){ array_push($members,"insert"); }
			if($this->input->post('members_list')){ array_push($members,"list"); }
			if($this->input->post('members_status')){ array_push($members,"status"); }
			if($this->input->post('members_update')){ array_push($members,"update"); }
			if($this->input->post('members_delete')){ array_push($members,"delete"); }
			array_push($data,"a.members='".implode(',',$members)."'");

			$services=array();
			if($this->input->post('services_list')){ array_push($services,"list"); }
			if($this->input->post('services_status')){ array_push($services,"status"); }
			if($this->input->post('services_update')){ array_push($services,"update"); }
			if($this->input->post('services_delete')){ array_push($services,"delete"); }
			array_push($data,"a.services='".implode(',',$services)."'");

			$bids=array();
			if($this->input->post('bids_list')){ array_push($bids,"list"); }
			if($this->input->post('bids_status')){ array_push($bids,"status"); }
			if($this->input->post('bids_update')){ array_push($bids,"update"); }
			if($this->input->post('bids_delete')){ array_push($bids,"delete"); }
			array_push($data,"a.bids='".implode(',',$bids)."'");

			$customers=array();
			if($this->input->post('customers_insert')){ array_push($customers,"insert"); }
			if($this->input->post('customers_list')){ array_push($customers,"list"); }
			if($this->input->post('customers_status')){ array_push($customers,"status"); }
			if($this->input->post('customers_priority')){ array_push($customers,"priority"); }
			if($this->input->post('customers_update')){ array_push($customers,"update"); }
			if($this->input->post('customers_delete')){ array_push($customers,"delete"); }
			array_push($data,"a.customers='".implode(',',$customers)."'");
			
			$slider=array();
			if($this->input->post('slider_insert')){ array_push($slider,"insert"); }
			if($this->input->post('slider_list')){ array_push($slider,"list"); }
			if($this->input->post('slider_status')){ array_push($slider,"status"); }
			if($this->input->post('slider_priority')){ array_push($slider,"priority"); }
			if($this->input->post('slider_update')){ array_push($slider,"update"); }
			if($this->input->post('slider_delete')){ array_push($slider,"delete"); }
			array_push($data,"a.slider='".implode(',',$slider)."'");

			$blog=array();
			if($this->input->post('slider_insert')){ array_push($blog,"insert"); }
			if($this->input->post('slider_list')){ array_push($blog,"list"); }
			if($this->input->post('slider_status')){ array_push($blog,"status"); }
			if($this->input->post('slider_priority')){ array_push($blog,"priority"); }
			if($this->input->post('slider_update')){ array_push($blog,"update"); }
			if($this->input->post('slider_delete')){ array_push($blog,"delete"); }
			$auth['blog']=implode(',',$blog);

			$gallery=array();
			if($this->input->post('gallery_insert')){ array_push($gallery,"insert"); }
			if($this->input->post('gallery_list')){ array_push($gallery,"list"); }
			if($this->input->post('gallery_status')){ array_push($gallery,"status"); }
			if($this->input->post('gallery_priority')){ array_push($gallery,"priority"); }
			if($this->input->post('gallery_update')){ array_push($gallery,"update"); }
			if($this->input->post('gallery_delete')){ array_push($gallery,"delete"); }
			array_push($data,"a.gallery='".implode(',',$gallery)."'");
		
			$categories=array();
			if($this->input->post('categories_insert')){ array_push($categories,"insert"); }
			if($this->input->post('categories_list')){ array_push($categories,"list"); }
			if($this->input->post('categories_status')){ array_push($categories,"status"); }
			if($this->input->post('categories_priority')){ array_push($categories,"priority"); }
			if($this->input->post('categories_update')){ array_push($categories,"update"); }
			if($this->input->post('categories_delete')){ array_push($categories,"delete"); }
			array_push($data,"a.categories='".implode(',',$categories)."'");
		
			$pages=array();
			if($this->input->post('pages_insert')){ array_push($pages,"insert"); }
			if($this->input->post('pages_list')){ array_push($pages,"list"); }
			if($this->input->post('pages_status')){ array_push($pages,"status"); }
			if($this->input->post('pages_priority')){ array_push($pages,"priority"); }
			if($this->input->post('pages_update')){ array_push($pages,"update"); }
			if($this->input->post('pages_delete')){ array_push($pages,"delete"); }
			array_push($data,"a.pages='".implode(',',$pages)."'");
			
			$users=array();
			if($this->input->post('users_insert')){ array_push($users,"insert"); }
			if($this->input->post('users_list')){ array_push($users,"list"); }
			if($this->input->post('users_status')){ array_push($users,"status"); }
			if($this->input->post('users_update')){ array_push($users,"update"); }
			if($this->input->post('users_delete')){ array_push($users,"delete"); }
			array_push($data,"a.users='".implode(',',$users)."'");

			if($this->input->post('logs_list')){ array_push($data,"a.logs='list'"); }else{ array_push($data,"a.logs=''"); }
			if($this->input->post('definitions_update')){ array_push($data,"a.definitions='update'"); }else{ array_push($data,"a.definitions=''"); }
			if($this->input->post('settings_update')){ array_push($data,"a.settings='update'"); }else{ array_push($data,"a.settings=''"); }
		}
		////////////////////////////////////////////////// authority

		if($id!=$this->session->userdata('id') && $id!=1){
			if($this->input->post('status')){$status=1;}else{$status=0;}
			array_push($data,"u.status='".$status."'");
		}

		if($this->input->post('password')){
			array_push($data,"u.password='".md5($this->input->post('password'))."'");
		}

		$data=implode(", ",$data);

		$this->db->query("UPDATE li_users AS u, li_auth AS a SET ".$data." WHERE a.user_id = u.id AND u.id=".$id);
		
		if($this->session->userdata('id')==$id){
			$this->db->select('*, li_users.id as id');	
			$this->db->from('li_users');
			$this->db->where('li_users.id',$id);
			$this->db->join('li_auth', 'li_auth.user_id = li_users.id');
			$query =$this->db->get();
			$this->session->set_userdata($query->row_array());
		}
		return ($this->db->affected_rows() == 1 || $this->db->affected_rows() == 2 ) ? true:false;
	}

	public function delete_user($id)
	{
		$this->db->where("user_id", $id)->delete("li_auth");
		$this->db->where("id", $id)->delete("li_users");
		
		return ($this->db->affected_rows() != 0 ) ? true:false;
	}

	public function add_img($id){
			
		$this->load->helper('specials_helper');
		$config['upload_path'] = './uploads/users';
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
			
			$img_url=$this->db->query('SELECT img FROM li_users WHERE id='.$id);
			if($img_url->num_rows()>0){// önceki resimleri siliyoruz
				$img_url=$img_url->row_array();
				@unlink($this->upload->upload_path."/L/".$img_url['img']);
				@unlink($this->upload->upload_path."/M/".$img_url['img']);
				@unlink($this->upload->upload_path."/S/".$img_url['img']);
				@unlink($this->upload->upload_path."/XS/".$img_url['img']);
			}

			$data = array('img' => $newimg);
			$this->db->where('id',$id);
			$this->db->update('li_users',$data);
			return $this->img_list($id);
		}			
			
	}
	
	
	public function img_list($id){
		$list='<div class="hr-line-dashed"></div>';
		$query = $this->db->query("SELECT * from li_users WHERE id='".$id."'");
		if($query->num_rows()>0){
			foreach($query->result() as $val){
				if($val->img){$imgs=base_url().'uploads/users/S/'.$val->img; $imgl=base_url().'uploads/users/L/'.$val->img;}else{$imgs=base_url().'uploads/no-avatar.png';$imgl=base_url().'uploads/no-avatar.png';}
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
		$img_url=$this->db->query("SELECT img FROM li_users WHERE id='".$id."'");
		if($img_url->num_rows()>0){
			$img_url=$img_url->row_array();
			@unlink("./uploads/users/L/".$img_url['img']);
			@unlink("./uploads/users/M/".$img_url['img']);
			@unlink("./uploads/users/S/".$img_url['img']);
			@unlink("./uploads/users/XS/".$img_url['img']);
		}
		$data = array('img' => NULL);
		$this->db->where('id',$id);
		$this->db->update('li_users',$data);
		return $this->img_list($id);
	}

}
