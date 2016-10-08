<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('log_model');
		$this->load->model('login_model');
		$this->login_model->login_control();

		$this->load->helper('text');
		
		$this->load->model('member_model');

		$this->load->library('form_validation');
		$this->load->helper('security'); // for xss_clean
		$this->form_validation->set_message('required', '%s Alanı Gerekli');
		$this->form_validation->set_message('matches', '%s Eşleşmiyor');
		$this->form_validation->set_message('valid_email', '%s Hatalı');
		$this->form_validation->set_message('is_unique', '%s Kullanımda');
		$this->form_validation->set_message('is_unique_declare','%s Farklı Kullanıcı Tarafından Kullanılıyor');
	}

	public function is_unique_declare($val,$field){ // for special validate
		$result = $this->db->query("SELECT * FROM li_members WHERE ".$field."='".$val."' AND id!='".$this->uri->segment(4)."'");
		if($result->num_rows() > 0){return false;}else{ return true;}
	}

	public function index()
	{
		$this->load->view('header');
		if(array_search('list',$this->session->userdata('auth')['members'])!==false){

			$data['members']=$this->member_model->member_data();
			$this->load->view('members',$data);

		}else{
			$this->session->set_flashdata('msg0',"Bu bölüm için yetkiniz yoktur !");
			$this->load->view('assets/msg');
		}

		$this->load->view('footer');
		$this->session->set_flashdata('msg1',"");
		$this->session->set_flashdata('msg0',"");
	}

	public function member_list($show=20, $page=1)
	{
		$this->load->view('header');
		
		if(array_search('list',$this->session->userdata('auth')['members'])!==false){

			if($this->input->post('form_control')==1){
				$this->session->set_userdata('datetime_members',$this->input->post('datetime_members'));
				$this->session->set_userdata('query_members',$this->input->post('query_members'));
			}
			if($this->input->post('form_control')=="reset"){
				$this->session->set_userdata('datetime_members','');
				$this->session->set_userdata('query_members','');
			}
			$data=$this->member_model->member_list($show, $page);
			$this->load->view('members',$data);

		}else{
			$this->session->set_flashdata('msg0',"Bu bölüm için yetkiniz yoktur !");
			$this->load->view('assets/msg');
		}

		$this->load->view('footer');
		$this->session->set_flashdata('msg1',"");
		$this->session->set_flashdata('msg0',"");
	}


	public function update_member(){
		$this->load->view('header');
		$id=$this->uri->segment(4);

		if(array_search('update',$this->session->userdata('auth')['members'])!==false){

			if($id){

				$data['list']=$this->member_model->member_data($id);
				$this->load->view('member_update',$data);
			}

		}else{
			$this->session->set_flashdata('msg0',"Bu bölüm için yetkiniz yoktur !");
			$this->load->view('assets/msg');
		}

		$this->load->view('footer');
		$this->session->set_flashdata('msg1',"");
		$this->session->set_flashdata('msg0',"");
	}


}
?>