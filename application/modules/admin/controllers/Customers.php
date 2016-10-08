<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('log_model');
		$this->load->model('login_model');
		$this->login_model->login_control();

		$this->load->model('customers_model');

		$this->load->library('form_validation');
		$this->load->helper('security'); // for xss_clean
		$this->form_validation->set_message('required', '%s Alanı Gerekli');
		$this->form_validation->set_message('matches', '%s Eşleşmiyor');
		$this->form_validation->set_message('valid_email', '%s Hatalı');
		$this->form_validation->set_message('is_unique', '%s Kullanımda');
		$this->form_validation->set_message('is_unique_declare','%s Farklı Kullanıcı Tarafından Kullanılıyor');
	}

	public function is_unique_declare($val,$field){ // for special validate
		$result = $this->db->query("SELECT * FROM li_customers WHERE ".$field."='".$val."' AND id!='".$this->uri->segment(4)."'");
		if($result->num_rows() > 0){return false;}else{ return true;}
	}

	public function index()
	{
		$this->load->view('header');
		if(array_search('list',$this->session->userdata('auth')['customers'])!==false){

			$data['customers']=$this->customers_model->customer_data();
			$this->load->view('customers',$data);

		}else{
			$this->session->set_flashdata('msg0',"Bu bölüm için yetkiniz yoktur !");
			$this->load->view('assets/msg');
		}

		$this->load->view('footer');
		$this->session->set_flashdata('msg1',"");
		$this->session->set_flashdata('msg0',"");
	}

	public function customer_list($show=20, $page=1)
	{
		$this->load->view('header');
		
		if(array_search('list',$this->session->userdata('auth')['customers'])!==false){

			if($this->input->post('form_control')==1){
				$this->session->set_userdata('datetime_customers',$this->input->post('datetime_customers'));
				$this->session->set_userdata('query_customers',$this->input->post('query_customers'));
			}
			if($this->input->post('form_control')=="reset"){
				$this->session->set_userdata('datetime_customers','');
				$this->session->set_userdata('query_customers','');
			}
			$data=$this->customers_model->customer_list($show, $page);
			$this->load->view('customers',$data);

		}else{
			$this->session->set_flashdata('msg0',"Bu bölüm için yetkiniz yoktur !");
			$this->load->view('assets/msg');
		}

		$this->load->view('footer');
		$this->session->set_flashdata('msg1',"");
		$this->session->set_flashdata('msg0',"");
	}



	public function  insert_customer()
	{	
		$this->load->view('header');

		if(array_search('insert',$this->session->userdata('auth')['customers'])!==false){
		
			if(!$this->input->post()){
				$this->load->view('customer_insert');
			}else{
				$this->form_validation->set_rules('fullname', 'Müşteri', 'trim|required|xss_clean');

				
				if ($this->form_validation->run() == FALSE){
					$this->session->set_flashdata('msg0',validation_errors());
					$this->load->view('customer_insert');
				}else{

					$result=$this->customers_model->insert_customer();

					if($result==true){
						$this->log_model->insert_log('Yeni Müşteri Eklendi Eklenen ID: '.$this->db->insert_id().'','insert');
						$this->session->set_flashdata('msg1',"Müşteri Eklendi");
						redirect('admin/customers/customer_list');
					}else{
						$this->session->set_flashdata('msg0',"Müşteri Eklenemedi");
						$this->load->view('customer_insert');
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

	public function update_customer()
	{
		$this->load->view('header');
		$id=$this->uri->segment(4);

		if(array_search('update',$this->session->userdata('auth')['customers'])!==false){

			if($id){
				
				if(!$this->input->post()){
					$data['list']=$this->customers_model->customer_data($id);
					$this->load->view('customer_update',$data);
				}else{

					$this->form_validation->set_rules('fullname', 'Müşteri', 'trim|required|xss_clean');

					if ($this->form_validation->run() == FALSE){
						$this->session->set_flashdata('msg0',validation_errors());
					}else{
 
						$result=$this->customers_model->update_customer($id);

						if($result==true)
						{
							$this->log_model->insert_log('Müşteri Bilgileri Güncellendi Güncellenen ID: '.$id.'','update');
							$this->session->set_flashdata('msg1',"Bilgiler Güncellendi");
						}
						else{
							$this->session->set_flashdata('msg0',"Değişiklik Yapılmadı !");
						}

					}
					$data=array();
					$data['list']=$this->customers_model->customer_data($id);
					$this->load->view('customer_update',$data);
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