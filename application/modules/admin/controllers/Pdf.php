<?php 
class Pdf extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct(); 
    } 

    public function index() 
    { 
    	$this->load->view('header');

    	if($this->input->get('plaka')){
    		$this->session->set_flashdata('msg1',"PDF Oluşturuldu");
    	}
        
    	$this->load->view('pdf');

    	$this->load->view('footer');
		$this->session->set_flashdata('msg1',"");
		$this->session->set_flashdata('msg0',"");

    } 
} 
