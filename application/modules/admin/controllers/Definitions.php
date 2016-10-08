<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Definitions extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->login_model->login_control();
		$this->load->model('definitions_model');
	}


	public function index()
	{
		$this->load->view('header');
		if(array_search('update',$this->session->userdata('auth')['definitions'])!==false){

			if($this->input->post()){

				$result=$this->definitions_model->update_definitions();
				if($result==true)
				{
					$this->session->set_flashdata('msg1',"Tanımlamalar Güncellendi");
				}
				else
				{
					$this->session->set_flashdata('msg0',"Güncelleme Başarısız");
				}
			}
			$data['definitions']=$this->definitions_model->get_data();
			$this->load->view('definitions',$data);

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