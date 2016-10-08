<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('log_model');
		$this->load->model('login_model');
		$this->login_model->login_control();
	}

	public function log_list($show=20, $page=1)
	{
		$this->load->view('header');

		if(array_search('list',$this->session->userdata('auth')['logs'])!==false){
			
			if($this->input->post('form_control')==1){
				$this->session->set_userdata('datetime_log',$this->input->post('datetime_log'));
				$this->session->set_userdata('query_log',$this->input->post('query_log'));
			}

			if($this->input->post('form_control')=="reset"){
				$this->session->set_userdata('datetime_log','');
				$this->session->set_userdata('query_log','');
			}
			$data=$this->log_model->log_list($show, $page);
			$this->load->view('logs',$data);
		
		}else{
			$this->session->set_flashdata('msg0',"Bu bölüm için yetkiniz yoktur !");
			$this->load->view('assets/msg');
		}

		$this->load->view('footer');
		$this->session->set_flashdata('msg1',"");
		$this->session->set_flashdata('msg0',"");
	}

	


}
