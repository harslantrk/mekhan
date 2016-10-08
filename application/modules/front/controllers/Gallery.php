<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('pages_model', 'pages');
		$this->load->model('boats_model');
	}

	public function index($seo_url=null)
	{

		$data['pages']	 		  = $this->pages->get_sidebar_list('0');
		$data['get_definitions']  = $this->settings_model->get_definitions();


		if( $this->uri->segment(2) ){
			$data['title']		=$this->session->userdata('front_title').' '.$this->boats_model->galleries( $this->uri->segment(2) );
		}else{
			$data['title']		=$this->session->userdata('front_title').' Galeri';
		}

		$data['description']=$this->session->userdata('front_description').' Galeri';
		$data['keywords']	=$this->session->userdata('front_keywords').' Galeri';
		
		$data['page'] = $this->pages->get_data('gallery');
		$data['galleries']  = $this->boats_model->galleries();
		
		$gallery 			= $this->boats_model->gallery($this->uri->segment(2));
		$data['gallery'] 	= json_decode($gallery , true);


		$this->load->view('header',$data);
		$this->load->view('gallery');
		$this->load->view('footer');

	}



}
