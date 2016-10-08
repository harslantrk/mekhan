<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Iletisim extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('log_model');
		$this->load->model('login_model');
		$this->login_model->login_control();
		$this->load->model('boats_model');
	}

	public function is_unique_declare($val,$field){ // for special validate
		$result = $this->db->query("SELECT * FROM li_iletisim WHERE ".$field."='".$val."' AND id!='".$this->uri->segment(4)."'");
		if($result->num_rows() > 0){return false;}else{ return true;}
	}

	public function index(){
		$this->load->view('header');

			$data['iletisim']=$this->boats_model->iletisim_data();
			$this->load->view('iletisim',$data);

		$this->load->view('footer');
		$this->session->set_flashdata('msg1',"");
		$this->session->set_flashdata('msg0',"");
	}


	public function update_iletisim(){
		$this->load->view('header');
		$id=$this->uri->segment(4);
		if($id){
			$data["id"]			= $this->uri->segment(4);
			$data["iletisim"]	= $this->boats_model->iletisim_data($id);
			$this->load->view('iletisim_update',$data);
			$this->load->view('footer');
		}
	}


}
?>