<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('log_model');
		$this->load->model('login_model');
		$this->login_model->login_control();

		$this->load->model('slider_model');

		$this->load->library('form_validation');
		$this->load->helper('security'); // for xss_clean
		$this->form_validation->set_message('required', '%s Alanı Gerekli');
		$this->form_validation->set_message('matches', '%s Eşleşmiyor');
		$this->form_validation->set_message('valid_email', '%s Hatalı');
		$this->form_validation->set_message('is_unique', '%s Kullanımda');
		$this->form_validation->set_message('is_unique_declare','%s Farklı Kullanıcı Tarafından Kullanılıyor');
	}

	public function is_unique_declare($val,$field){ // for special validate
		$result = $this->db->query("SELECT * FROM li_slider WHERE ".$field."='".$val."' AND id!='".$this->uri->segment(4)."'");
		if($result->num_rows() > 0){return false;}else{ return true;}
	}

	public function index()
	{
		$this->load->view('header');
		if(array_search('list',$this->session->userdata('auth')['slider'])!==false){

			$data['slider']=$this->slider_model->slider_data();
			$this->load->view('mekan_ekle',$data);

		}else{
			$this->session->set_flashdata('msg0',"Bu bölüm için yetkiniz yoktur !");
			$this->load->view('assets/msg');
		}

		$this->load->view('footer');
		$this->session->set_flashdata('msg1',"");
		$this->session->set_flashdata('msg0',"");
	}

	

	public function  insert_slider()
	{	
		$this->load->view('header');

		if(array_search('insert',$this->session->userdata('auth')['slider'])!==false){
		
			if(!$this->input->post()){
				$this->load->view('slider_insert');
			}else{
				$this->form_validation->set_rules('title', 'Slider Adı', 'trim|required|xss_clean');

				
				if ($this->form_validation->run() == FALSE){
					$this->session->set_flashdata('msg0',validation_errors());
					$this->load->view('slider_insert');
				}else{

					$result=$this->slider_model->insert_slider();

					if($result==true){
						$this->log_model->insert_log('Yeni Mekan Eklendi Eklenen ID: '.$this->db->insert_id().'','insert');
						$this->session->set_flashdata('msg1',"Mekan Eklendi");
						redirect('admin/slider');
					}else{
						$this->session->set_flashdata('msg0',"Mekan Eklenemedi");
						$this->load->view('slider_insert');
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

	public function update_slider()
	{
		$this->load->view('header');
		$id=$this->uri->segment(4);

		if(array_search('update',$this->session->userdata('auth')['slider'])!==false || $id==$this->session->userdata('id')){

			if($id){
				
				if(!$this->input->post()){

					$data['list']=$this->slider_model->slider_data($id);
					$data['resimler']	=	$this->boats_model->mekanSlider($id);
					$this->load->view('slider_update',$data);
				}else{

					$this->form_validation->set_rules('title', 'Slider Adı', 'trim|required|xss_clean');

					if ($this->form_validation->run() == FALSE){
						$this->session->set_flashdata('msg0',validation_errors());
					}else{
 
						$result=$this->slider_model->update_slider($id);

						if($result==true)
						{
							$this->log_model->insert_log('Slider Bilgiler Güncellendi Güncellenen ID: '.$id.'','update');
							$this->session->set_flashdata('msg1',"Bilgiler Güncellendi");
							redirect('admin/slider');
						}
						else{
							$this->session->set_flashdata('msg0',"Değişiklik Yapılmadı !");
							redirect('admin/slider');
						}

					}
					$data=array();
					$data['list']=$this->slider_model->slider_data($id);
					//$data['mekan_resimler']	=	$this->boats_model->mekanSlider();
					$this->load->view('slider_update',$data);
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