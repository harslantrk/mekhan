<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('log_model');
		$this->load->model('login_model');
		$this->login_model->login_control();

		$this->load->model('service_model');

		$this->load->library('form_validation');
		$this->load->helper('security'); // for xss_clean
		$this->form_validation->set_message('required', '%s Alanı Gerekli');
		$this->form_validation->set_message('matches', '%s Eşleşmiyor');
		$this->form_validation->set_message('valid_email', '%s Hatalı');
		$this->form_validation->set_message('is_unique', '%s Kullanımda');
		$this->form_validation->set_message('is_unique_declare','%s Farklı Kullanıcı Tarafından Kullanılıyor');
	}

	public function is_unique_declare($val,$field){ // for special validate
		$result = $this->db->query("SELECT * FROM li_services WHERE ".$field."='".$val."' AND id!='".$this->uri->segment(4)."'");
		if($result->num_rows() > 0){return false;}else{ return true;}
	}

	public function index()
	{
		$this->load->view('header');
		if(array_search('list',$this->session->userdata('auth')['services'])!==false){

			$data['services']=$this->service_model->service_data();
			$this->load->view('services',$data);

		}else{
			$this->session->set_flashdata('msg0',"Bu bölüm için yetkiniz yoktur !");
			$this->load->view('assets/msg');
		}

		$this->load->view('footer');
		$this->session->set_flashdata('msg1',"");
		$this->session->set_flashdata('msg0',"");
	}

	public function service_list($show=20, $page=1)
	{
		$this->load->view('header');
		
		if(array_search('list',$this->session->userdata('auth')['services'])!==false){

			if($this->input->post('form_control')==1){
				$this->session->set_userdata('datetime_services',$this->input->post('datetime_services'));
				$this->session->set_userdata('query_services',$this->input->post('query_services'));
			}
			if($this->input->post('form_control')=="reset"){
				$this->session->set_userdata('datetime_services','');
				$this->session->set_userdata('query_services','');
			}
			$data=$this->service_model->service_list($show, $page);
			$this->load->view('services',$data);

		}else{
			$this->session->set_flashdata('msg0',"Bu bölüm için yetkiniz yoktur !");
			$this->load->view('assets/msg');
		}

		$this->load->view('footer');
		$this->session->set_flashdata('msg1',"");
		$this->session->set_flashdata('msg0',"");
	}


	public function update_service()
	{
		$this->load->model('category_model');
		$this->load->view('header');
		$id=$this->uri->segment(4);

		if(array_search('update',$this->session->userdata('auth')['services'])!==false){

			if($id){
				
				if(!$this->input->post()){
					$data['list']=$this->service_model->service_data($id);
					$top_id=$data['list'][0]->cat_id;
					$data['top_id']=$this->category_model->category_selector($top_id,'<input type="hidden" name="top_id" value="'.$top_id.'" />');
					$this->load->view('service_update',$data);
				}else{

					$this->form_validation->set_rules('title', 'Başlık', 'trim|required|xss_clean');
					
					$this->form_validation->set_rules('county', 'İl', 'trim|xss_clean');
					$this->form_validation->set_rules('town', 'İlçe', 'trim|xss_clean');
					$this->form_validation->set_rules('amount', '', 'trim|xss_clean');
					$this->form_validation->set_rules('tel', 'Tel', 'trim|xss_clean');
					$this->form_validation->set_rules('date_start', 'Tarih', 'trim|xss_clean');
					$this->form_validation->set_rules('date_end', 'Tarih', 'trim|xss_clean');
					$this->form_validation->set_rules('details', 'Ayrıntılar', 'trim|xss_clean');

					if ($this->form_validation->run() == FALSE){
						$this->session->set_flashdata('msg0',validation_errors());
					}else{
 
						$result=$this->service_model->update_service($id);

						if($result==true)
						{
							$this->log_model->insert_log('ID:'.$id.' Hizmet Güncellendi','update');
							$this->session->set_flashdata('msg1',"Bilgiler Güncellendi");
						}
						else{
							$this->session->set_flashdata('msg0',"Değişiklik Yapılmadı !");
						}

					}
					$data=array();
					$data['list']=$this->service_model->service_data($id);
					$top_id=$data['list'][0]->cat_id;
					$data['top_id']=$this->category_model->category_selector($top_id,'<input type="hidden" name="top_id" value="'.$top_id.'" />');
					$this->load->view('service_update',$data);
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