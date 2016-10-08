<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Password_reset extends CI_Controller {

	function __construct()
	{
		parent::__construct();


		$this->load->model('login_model');
		$this->load->model('log_model');

		$this->load->library('form_validation');
		$this->load->helper('security'); // for xss_clean
		$this->form_validation->set_message('required', '%s Alanı Gerekli');
		$this->form_validation->set_message('matches', '%s Eşleşmiyor');
		$this->form_validation->set_message('valid_email', '%s Hatalı');
		$this->form_validation->set_message('is_unique', '%s Kullanımda');
		$this->form_validation->set_message('is_unique_declare','%s Farklı Kullanıcı Tarafından Kullanılıyor');
	}

	public function index()
	{
		if($this->input->post('email')){
			
			if($this->login_model->password_reset()==1){
				$this->session->set_flashdata('msg1',"Parola Sıfırlama iletisi email adresinize gönderilmiştir.");
			}
			else if($this->login_model->password_reset()==2){
				$this->session->set_flashdata('msg0',"Böyle bir üyelik yoktur");
			}
			else{
				$this->session->set_flashdata('msg0',"Eposta Gönderilemedi !");
			}
		}

		$this->load->view('password_reset');
		$this->session->set_flashdata('msg1',"");
		$this->session->set_flashdata('msg0',"");
	}

	public function key($key=false)
	{
		$id=$this->login_model->key_control($key);
		if(!$id){
			$this->session->set_flashdata('msg0',"Süresi dolmuş veya Geçersiz bağlantı ");
			redirect(base_url().'admin/password_reset');
		}
		else if($this->input->post()){

			$this->form_validation->set_rules('password', 'Parola', 'required|matches[passconf]');
			$this->form_validation->set_rules('passconf', 'Parola', 'required');

			if ($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('msg0',validation_errors());
				$this->load->view('password_renewal');
			}
			else{

				$data	=array( 'password' => $this->input->post('password') );
				$result =$this->login_model->update_password($data,$id);

				if($result==true){
					$this->login_model->key_delete($key);
					$this->log_model->insert_log('ID:'.$id.' Şifre Başarıyla Güncellendi','update');
					$this->session->set_flashdata('msg1',"Şifre Başarıyla Güncellendi");
					redirect(base_url().'admin');
				}
				else{
					$this->log_model->insert_log('ID:'.$id.' Şifre Güncelleme Başarısız','update');
					$this->session->set_flashdata('msg0',"Güncelleme Başarısız Tekrar deneyiniz");
					redirect(base_url().'admin/password_reset');
				}
			}


		}
		else{
			$this->load->view('password_renewal');
		}
		
		$this->session->set_flashdata('msg1',"");
		$this->session->set_flashdata('msg0',"");

	}


	


}
?>