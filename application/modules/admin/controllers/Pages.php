<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('page_model');
		$this->load->model('log_model');
		$this->load->model('login_model');
		$this->login_model->login_control();

		$this->load->library('form_validation');
		$this->load->helper('security'); // for xss_clean
		$this->form_validation->set_message('required', '%s Alanı Gerekli');
		$this->form_validation->set_message('matches', '%s Eşleşmiyor');
		$this->form_validation->set_message('valid_email', '%s Hatalı');
		$this->form_validation->set_message('is_unique', '%s Kullanımda');
		$this->form_validation->set_message('is_unique_declare','%s Farklı Sayfada Kullanımda');

	}

	public function is_unique_declare($val,$field){ // for special validate
		$result = $this->db->query("SELECT * FROM li_pages WHERE ".$field."='".$val."' AND id!='".$this->uri->segment(4)."'");
		if($result->num_rows() > 0){return false;}else{ return true;}
	}

	public function page_list($top_id=0, $show=20, $page=1)
	{
		$this->load->view('header');
		
		if(array_search('list',$this->session->userdata('auth')['pages'])!==false){//yetki kontrolü

			if($this->input->post('form_control')==1){
				$this->session->set_userdata('datetime_page',$this->input->post('datetime_page'));
				$this->session->set_userdata('query_page',$this->input->post('query_page'));
			}
			if($this->input->post('form_control')=="reset"){
				$this->session->set_userdata('datetime_page','');
				$this->session->set_userdata('query_page','');
			}
			$data=$this->page_model->page_list($top_id, $show, $page);
			$data['nav']=$this->page_model->page_navigator($top_id);
			$data['top_id']=$top_id;
			$this->load->view('pages',$data);

		}else{
			$this->session->set_flashdata('msg0',"Bu bölüm için yetkiniz yoktur !");
			$this->load->view('assets/msg');
		}

		$this->load->view('footer');
		$this->session->set_flashdata('msg1',"");
		$this->session->set_flashdata('msg0',"");
	}

	
    

	public function  insert_page($top_id=0)
	{	
		$this->load->view('header');

		if(array_search('insert',$this->session->userdata('auth')['pages'])!==false){
			
			$data['top_id']=$this->page_model->page_selector($top_id,'<input type="hidden" name="top_id" value="'.$top_id.'" />');

			if(!$this->input->post()){
				$this->load->view('page_insert',$data);
			}else{
				$this->form_validation->set_rules('title', 'Başlık', 'trim|required|xss_clean');
				$this->form_validation->set_rules('seo_url', 'Link', 'trim|required|is_unique[li_pages.seo_url]|xss_clean');
				$this->form_validation->set_rules('content', 'İçerik', 'trim');
				$this->form_validation->set_rules('description', 'Description', 'trim');
				$this->form_validation->set_rules('keywords', 'Keywords', 'trim');
				$this->form_validation->set_rules('priority', 'Öncelik', 'trim');
				
				if ($this->form_validation->run() == FALSE){
					$this->session->set_flashdata('msg0',validation_errors());
					$this->load->view('page_insert',$data);
				}else{

					$result=$this->page_model->insert_page();

					if($result==true){
						$this->log_model->insert_log('Yeni Sayfa Eklendi Eklenen ID: '.$this->db->insert_id().'','insert');
						$this->session->set_flashdata('msg1',"Sayfa Eklendi");
						redirect('admin/pages/page_list');
					}else{
						$this->session->set_flashdata('msg0',"Kullanıcı Eklenemedi");
						$this->load->view('page_insert');
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
	
	public function sablon(){
		sablon();
	}

	public function update_page($id=false)
	{	
		$this->load->view('header');

		if(array_search('update',$this->session->userdata('auth')['pages'])!==false){

			if($id){
				
				if(!$this->input->post()){
					$data['list']=$this->page_model->page_data($id);
					if($data['list']){
						$top_id=$data['list'][0]->top_id;
						$data['top_id']=$this->page_model->page_selector($top_id,'<input type="hidden" name="top_id" value="'.$top_id.'" />');
					}
					$this->load->view('page_update',$data);
				}else{

					$this->form_validation->set_rules('title', 'Başlık', 'trim|required|xss_clean');
					$this->form_validation->set_rules('seo_url', 'Link', 'trim|required|callback_is_unique_declare[seo_url]|xss_clean');
					$this->form_validation->set_rules('content', 'İçerik', 'trim');
					$this->form_validation->set_rules('description', 'Description', 'trim');
					$this->form_validation->set_rules('keywords', 'Keywords', 'trim');
					$this->form_validation->set_rules('priority', 'Öncelik', 'trim');
					
					if ($this->form_validation->run() == FALSE){
						$this->session->set_flashdata('msg0',validation_errors());
					}else{

						$result=$this->page_model->update_page($id);

						$data=array();
						
						if($result==true)
						{
							$this->log_model->insert_log('Sayfa Güncellendi Güncellenen ID: '.$id.'','update');
							$this->session->set_flashdata('msg1',"İçerik Güncellendi");
						}
						else{
							$this->session->set_flashdata('msg0',"Değişiklik Yapılmadı !");
						}

					}

					redirect(base_url().'admin/pages/update_page/'.$id);
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