<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->login_model->login_control();
	}

	public function event(){

		return $this->db->select("baslik, icerik, img, tarih, kategori")
				->from("li_haberler")
				->where("kategori","genel")
				->get()
				->result();
	}

	public function blog() {
        
        Core::header();

        $this->load->view('blog');

    }

    
	public function index()
	{
		$this->load->view('header');
		if(array_search('update',$this->session->userdata('auth')['settings'])!==false){

			if($this->input->post()){
				$data=array('title'=>$this->input->post('title'),
							'description'=>$this->input->post('description'),
							'keywords'=>$this->input->post('keywords'),
							'tel'=>$this->input->post('tel'),
							'tel2'=>$this->input->post('tel2'),
							'email'=>$this->input->post('email'),
							'address'=>$this->input->post('address'),
							'smtp_host'=>$this->input->post('smtp_host'),
							'smtp_email'=>$this->input->post('smtp_email'),
							'smtp_pass'=>$this->input->post('smtp_pass'),
							'note'=>$this->input->post('note')
							);
				$result=$this->settings_model->update_settings($data,1);
				if($result==true)
				{
					$this->session->set_flashdata('msg1',"Ayarlar Güncellendi");
				}
				else
				{
					$this->session->set_flashdata('msg0',"Güncelleme Başarısız");
				}
			}
			$data['settings']=$this->settings_model->get_data();
			$this->load->view('settings',$data);

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