<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Modeller extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('log_model');
		$this->load->model('login_model');
		$this->login_model->login_control();

		$this->load->model('boats_model');
		$this->load->model('modeller_model');
		$this->load->library('form_validation');
		$this->load->helper('security'); // for xss_clean
		$this->form_validation->set_message('required', '%s Alanı Gerekli');
		$this->form_validation->set_message('matches', '%s Eşleşmiyor');
		$this->form_validation->set_message('valid_email', '%s Hatalı');
		$this->form_validation->set_message('is_unique', '%s Kullanımda');
		$this->form_validation->set_message('is_unique_declare','%s Farklı Kullanıcı Tarafından Kullanılıyor');
	}

	public function is_unique_declare($val,$field){ // for special validate
		$result = $this->db->query("SELECT * FROM li_modeller WHERE ".$field."='".$val."' AND id!='".$this->uri->segment(4)."'");
		if($result->num_rows() > 0){return false;}else{ return true;}
	}

	public function index()
	{
		$this->load->view('header');

			$data['modeller']=$this->modeller_model->modeller_data();
			$this->load->view('modeller',$data);


		$this->load->view('footer');
		$this->session->set_flashdata('msg1',"");
		$this->session->set_flashdata('msg0',"");
	}



	public function  insert_modeller()
	{	
		$this->load->view('header');
		
			if(!$this->input->post()){
				$this->load->view('modeller_insert');
			}else{
				$this->form_validation->set_rules('title', 'Galeri Adı', 'trim|required|xss_clean');

				
				if ($this->form_validation->run() == FALSE){
					$this->session->set_flashdata('msg0',validation_errors());
					$this->load->view('modeller_insert');
				}else{

					$result=$this->boats_model->insert_modeller();

					if($result==true){
						$this->log_model->insert_log('Yeni Model Eklendi Eklenen ID: '.$this->db->insert_id().'','insert');
						$this->session->set_flashdata('msg1',"Galeri Eklendi");
						redirect('admin/gallery');
					}else{
						$this->session->set_flashdata('msg0',"Model Eklenemedi");
						$this->load->view('modeller_insert');
					}
				}
			}


		$this->load->view('footer');
		$this->session->set_flashdata('msg1',"");
		$this->session->set_flashdata('msg0',"");
	}

	public function update_gallery()
	{
		$this->load->view('header');
		$id=$this->uri->segment(4);

		if(array_search('update',$this->session->userdata('auth')['gallery'])!==false || $id==$this->session->userdata('id')){

			if($id){
				
				if(!$this->input->post()){
					$galeri = $this->boats_model->gallery_data($id);
					$data['list'] = json_decode($galeri[0]["img"]);
					$data["id"] = $galeri[0]["id"];
					$data["priority"] = $galeri[0]["priority"];
					$data["status"] = $galeri[0]["status"];
					$this->load->view('gallery_update',$data);
				}else{

					$this->form_validation->set_rules('title', 'Galeri Adı', 'trim|required|xss_clean');

					if ($this->form_validation->run() == FALSE){
						$this->session->set_flashdata('msg0',validation_errors());
					}else{
 
						$result=$this->boats_model->update_gallery($id);

						if($result==true)
						{
							$this->log_model->insert_log('Galeri Bilgiler Güncellendi ID: '.$id.'','update');
							$this->session->set_flashdata('msg1',"Bilgiler Güncellendi");
						}
						else{
							$this->session->set_flashdata('msg0',"Değişiklik Yapılmadı !");
						}

					}
					$data=array();
					$data['list']=$this->boats_model->gallery_data($id);
					$this->load->view('gallery_update',$data);
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