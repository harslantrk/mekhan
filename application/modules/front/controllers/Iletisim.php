<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iletisim extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('pages_model', 'pages');
		$this->load->model('boats_model');
	}

	public function index($seo_url=null){
			
			if($_POST){
				$data["ad"] 	= postt("ad");
				$data["email"] 	= postt("email");
				$data["tel"] 	= postt("tel");
				$data["mesaj"] 	= postt("mesaj");
				$data["tarih"]	= date("Y-m-d");
				$sonuc = $this->boats_model->kaydet("li_iletisim", $data);
				if($sonuc == true){
					$this->session->set_flashdata("mesaj", "Mesajınız başarılı şekilde gönderilmiştir.");
					header("Refresh:3");
				}else{
					$this->session->set_flashdata("mesaj-hata", "Bir sorun oluştu. Lütfen tekrar deneyiniz.");
					header("Refresh:0");
				}
			}
			$this->header();
			$this->load->view('iletisim');
			$this->footer();
			

	}
	
	function header(){
		$sosyalmedya  = $this->settings_model->get_definitions();
		$data['sosyalmedya']=array();
		$data['sosyalmedya']=json_decode($sosyalmedya[0]['definitions'], true);
		$this->load->view("header", $data);	
	}
	
	function footer(){
		$sosyalmedya  = $this->settings_model->get_definitions();
		$data['sosyalmedya']=array();
		$data['sosyalmedya']=json_decode($sosyalmedya[0]['definitions'], true);
		$this->load->view("footer", $data);	
	}



}
