<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('log_model');
		$this->load->model('login_model');
		$this->login_model->login_control();

		$this->load->model('user_model');

		$this->load->library('form_validation');
		$this->load->helper('security'); // for xss_clean
		$this->form_validation->set_message('required', '%s Alanı Gerekli');
		$this->form_validation->set_message('matches', '%s Eşleşmiyor');
		$this->form_validation->set_message('valid_email', '%s Hatalı');
		$this->form_validation->set_message('is_unique', '%s Kullanımda');
		$this->form_validation->set_message('is_unique_declare','%s Farklı Kullanıcı Tarafından Kullanılıyor');
	}

	public function is_unique_declare($val,$field){ // for special validate
		$result = $this->db->query("SELECT * FROM li_users WHERE ".$field."='".$val."' AND id!='".$this->uri->segment(4)."'");
		if($result->num_rows() > 0){return false;}else{ return true;}
	}

	public function index()
	{
		$this->load->view('header');
		if(array_search('list',$this->session->userdata('auth')['users'])!==false){

			$data['user']=$this->user_model->user_data();
			$this->load->view('user',$data);

		}else{
			$this->session->set_flashdata('msg0',"Bu bölüm için yetkiniz yoktur !");
			$this->load->view('assets/msg');
		}

		$this->load->view('footer');
		$this->session->set_flashdata('msg1',"");
		$this->session->set_flashdata('msg0',"");
	}



	public function  insert_user()
	{	
		$this->load->view('header');
		if(array_search('insert',$this->session->userdata('auth')['users'])!==false){
			if(!$this->input->post()){
				$this->load->view('user_insert');
			}else{
				$this->form_validation->set_rules('fullname', 'Tam Ad', 'trim|required|xss_clean');
				$this->form_validation->set_rules('username', 'Kullanıcı Adı', 'trim|required|is_unique[li_users.username]|xss_clean');
				$this->form_validation->set_rules('password', 'Parola', 'required|matches[passconf]');
				$this->form_validation->set_rules('passconf', 'Parola', 'required');
				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[li_users.email]');
				if ($this->form_validation->run() == FALSE){
					$this->session->set_flashdata('msg0',validation_errors());
					$this->load->view('user_insert');
				}else{
					$result=$this->user_model->insert_user();
					if($result==true){
						$this->log_model->insert_log('Yeni Kullanıcı Eklendi Eklenen ID: '.$this->db->insert_id().'','insert');
						$this->session->set_flashdata('msg1',"Kullanıcı Eklendi");
						redirect('admin/user');
					}else{
						$this->session->set_flashdata('msg0',"Kullanıcı Eklenemedi");
						$this->load->view('user_insert');
					}
				}
			}
		}else{
			$this->session->set_flashdata('msg0',"Bu bölüm için yetkiniz yoktur !");
			$this->load->view('assets/msg');
		}
		$this->load->view('footer');
		$this->session->set_flashdata('msg1',"");
		$this->session->set_flashdata('msg0',"");
	}
	public function update_user()
	{
		$this->load->view('header');
		$id=$this->uri->segment(4);

		if($this->session->userdata('id')==1 || ( array_search('update',$this->session->userdata('auth')['users'])!==false && $id!=1 ) || $id==$this->session->userdata('id') ){

			if($id){
				
				if(!$this->input->post()){
					$data['img_list']=$this->user_model->img_list($id);
					$data['user']=$this->user_model->user_data($id);
					$this->load->view('user_update',$data);
				}else{

					$this->form_validation->set_rules('fullname', 'Tam Ad', 'trim|required|xss_clean');
					$this->form_validation->set_rules('username', 'Kullanıcı Adı', 'trim|required|callback_is_unique_declare[username]|xss_clean');
					$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_is_unique_declare[email]');
					if($this->input->post('password')){
						$this->form_validation->set_rules('password', 'Şifre', 'required|matches[passconf]');
						$this->form_validation->set_rules('passconf', 'Şifre', 'required');
					}	
					
					if ($this->form_validation->run() == FALSE){
						$this->session->set_flashdata('msg0',validation_errors());
					}else{
 
						$result=$this->user_model->update_user($id);

						if($result==true)
						{
							$this->log_model->insert_log('Bilgiler Güncellendi Güncellenen ID: '.$id.'','update');
							$this->session->set_flashdata('msg1',"Bilgiler Güncellendi");
						}
						else{
							$this->session->set_flashdata('msg0',"Değişiklik Yapılmadı !");
						}

					}
					$data=array();
					$data['img_list']=$this->user_model->img_list($id);
					$data['user']=$this->user_model->user_data($id);
					$this->load->view('user_update',$data);
				}
			}else{
				$this->session->set_flashdata('msg0',"id eksik");
				$this->load->view('assets/msg');
			}

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