<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Siparis extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('log_model');
		$this->load->model('login_model');
		$this->login_model->login_control();

		$this->load->model('boats_model');

		$this->load->library('form_validation');
		$this->load->helper('security'); // for xss_clean
		$this->form_validation->set_message('required', '%s Alanı Gerekli');
		$this->form_validation->set_message('matches', '%s Eşleşmiyor');
		$this->form_validation->set_message('valid_email', '%s Hatalı');
		$this->form_validation->set_message('is_unique', '%s Kullanımda');
		$this->form_validation->set_message('is_unique_declare','%s Farklı Kullanıcı Tarafından Kullanılıyor');
	}

	public function is_unique_declare($val,$field){ // for special validate
		$result = $this->db->query("SELECT * FROM li_rezervasyon WHERE ".$field."='".$val."' AND id!='".$this->uri->segment(4)."'");
		if($result->num_rows() > 0){return false;}else{ return true;}
	}

	public function index()
	{
		$this->load->view('header');

			$data['siparis']=$this->boats_model->siparis_data();
			$this->load->view('siparis',$data);

		$this->load->view('footer');
		$this->session->set_flashdata('msg1',"");
		$this->session->set_flashdata('msg0',"");
	}

	public function update_siparis(){
		$this->load->view('header');
		$id=$this->uri->segment(4);

			if($id){
				$data["id"]			= $this->uri->segment(4);
				$data["siparis"]	= $this->boats_model->siparisDetay_data($id);
				$data["secenek"] = json_decode($data["siparis"]["ek_secenek"]);
				$this->load->view('siparis_update',$data);

			}else{
				$this->session->set_flashdata('msg0',"id eksik");
				$this->load->view('assets/msg');
			}


		$this->load->view('footer');
		$this->session->set_flashdata('msg1',"");
		$this->session->set_flashdata('msg0',"");
	}

}
?>
