<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('log_model');
		$this->load->model('login_model');
	}

	

	public function index()
	{
		
		if($this->session->userdata('id')){
			$this->load->model('dashboard_model');
			$data['statistics']=$this->dashboard_model->statistics();
			$this->load->view('header',$data);
			$this->load->view('dashboard');
			$this->load->view('footer');
		}
		else if($this->input->post()){
			$login=$this->login_model->login_up();
			if($login){
				$this->load->model('dashboard_model');
				$data['statistics']=$this->dashboard_model->statistics();
				$this->load->view('header',$data);
				$this->load->view('dashboard');
				$this->load->view('footer');
			}
			else{
				$this->session->set_flashdata('msg0',"Kullanıcı adı veya Şifre Hatalı");
				$this->load->view('login');
			}
		}
		else if($this->input->cookie('id')){
			$login=$this->login_model->cookie_login_up();
			if($login){
				$this->load->model('dashboard_model');
				$data['statistics']=$this->dashboard_model->statistics();
				$this->load->view('header',$data);
				$this->load->view('dashboard');
				$this->load->view('footer');
			}else{
				$this->session->set_flashdata('msg0',"Tekrar giriş yapınız");
				$this->load->view('login');
			}
		}
		else{
			$this->load->view('login');
		}	
		
		$this->session->set_flashdata('msg0',"");
	}

	public function logout(){
		$this->log_model->insert_log('Çıkış Yapıldı ','login');
		$this->session->sess_destroy();
		delete_cookie("id");
		delete_cookie("ckf_role");
        redirect('admin');
	}

	public function blog() {
        $this->load->view('header');

        $this->load->view('blog');
    }
}?>