<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('category_model');
		$this->load->model('log_model');
		$this->load->model('login_model');
		$this->login_model->login_control();

		$this->load->library('form_validation');
		$this->load->helper('security'); // for xss_clean
		$this->form_validation->set_message('required', '%s Alanı Gerekli');
		$this->form_validation->set_message('matches', '%s Eşleşmiyor');
		$this->form_validation->set_message('valid_email', '%s Hatalı');
		$this->form_validation->set_message('is_unique', '%s Kullanımda');
		$this->form_validation->set_message('is_unique_declare','%s Farklı Marka Kullanımda');

	}

	public function is_unique_declare($val,$field){ // for special validate
		$result = $this->db->query("SELECT * FROM li_categories WHERE ".$field."='".$val."' AND id!='".$this->uri->segment(4)."'");
		if($result->num_rows() > 0){return false;}else{ return true;}
	}

	public function category_list($top_id=0, $show=20, $category=1)
	{
		$this->load->view('header');
		
		if(array_search('list',$this->session->userdata('auth')['categories'])!==false){

			if($this->input->post('form_control')==1){
				$this->session->set_userdata('datetime_category',$this->input->post('datetime_category'));
				$this->session->set_userdata('query_category',$this->input->post('query_category'));
			}
			if($this->input->post('form_control')=="reset"){
				$this->session->set_userdata('datetime_category','');
				$this->session->set_userdata('query_category','');
			}
			$data=$this->category_model->category_list($top_id, $show, $category);
			$data['nav']=$this->category_model->category_navigator($top_id);
			$data['top_id']=$top_id;
			$this->load->view('reklam_ekle',$data);

		}else{
			$this->session->set_flashdata('msg0',"Bu bölüm için yetkiniz yoktur !");
			$this->load->view('assets/msg');
		}

		$this->load->view('footer');
		$this->session->set_flashdata('msg1',"");
		$this->session->set_flashdata('msg0',"");
	}

	public function  insert_category($top_id=0)
	{	
		$this->load->view('header');

		if(array_search('insert',$this->session->userdata('auth')['categories'])!==false){
			
			if(!$this->input->post()){
				$data['top_id']=$this->category_model->category_selector($top_id,'<input type="hidden" name="top_id" value="'.$top_id.'" />');
				$this->load->view('category_insert',$data);
			}else{
				$this->form_validation->set_rules('title', 'Başlık', 'trim|required|xss_clean');
				$this->form_validation->set_rules('content', 'İçerik', 'trim');
				$this->form_validation->set_rules('priority', 'Öncelik', 'trim');
				
				if ($this->form_validation->run() == FALSE){
					$this->session->set_flashdata('msg0',validation_errors());
					$this->load->view('category_insert');
				}else{

					$result=$this->category_model->insert_category();

					if($result==true){
						$this->log_model->insert_log('Yeni Marka Eklendi Eklenen ID: '.$this->db->insert_id().'','insert');
						$this->session->set_flashdata('msg1',"Marka Eklendi");
						redirect('admin/categories/category_list');
					}else{
						$this->session->set_flashdata('msg0',"Marka Eklenemedi");
						$this->load->view('category_insert');
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

	public function update_category($id=false)
	{	
		$this->load->view('header');

		if(array_search('update',$this->session->userdata('auth')['categories'])!==false){

			if($id){
				
				if(!$this->input->post()){
					$data['list']=$this->category_model->category_data($id);
					if($data['list']){
						$top_id=$data['list'][0]->top_id;
						$data['top_id']=$this->category_model->category_selector($top_id,'<input type="hidden" name="top_id" value="'.$top_id.'" />');
					}
					$this->load->view('category_update',$data);
				}else{

					$this->form_validation->set_rules('title', 'Başlık', 'trim|required|xss_clean');
					$this->form_validation->set_rules('priority', 'Öncelik', 'trim');

					
					if ($this->form_validation->run() == FALSE){
						$this->session->set_flashdata('msg0',validation_errors());
					}else{

						$result=$this->category_model->update_category($id);

						$data=array();
						
						if($result==true)
						{
							$this->log_model->insert_log('Marka Güncellendi Güncellenen ID: '.$id.'','update');
							$this->session->set_flashdata('msg1',"İçerik Güncellendi");
						}
						else{
							$this->session->set_flashdata('msg0',"Değişiklik Yapılmadı !");
						}

					}

					redirect(base_url().'admin/categories/update_category/'.$id);
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