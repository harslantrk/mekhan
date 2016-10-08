<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Aksesuar extends CI_Controller {

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
		$result = $this->db->query("SELECT * FROM li_aksesuar WHERE ".$field."='".$val."' AND id!='".$this->uri->segment(4)."'");
		if($result->num_rows() > 0){return false;}else{ return true;}
	}

	public function index()
	{
		$this->load->view('header');

			$data['aksesuar']=$this->boats_model->aksesuar_data();
			$this->load->view('aksesuar',$data);

		$this->load->view('footer');
		$this->session->set_flashdata('msg1',"");
		$this->session->set_flashdata('msg0',"");
	}



	public function  insert_aksesuar(){	
		$this->load->view('header');
		
			if(!$this->input->post()){
				$this->load->view('aksesuar_insert');
			}else{
				$this->form_validation->set_rules('title', 'aksesuar Adı', 'trim|required|xss_clean');

				
				if ($this->form_validation->run() == FALSE){
					$this->session->set_flashdata('msg0',validation_errors());
					$this->load->view('aksesuar_insert');
				}else{


						if($this->input->post('status')){$status=1;}else{$status=0;}

						$data=array(
									'title'		=> $this->input->post('title'),
									'fotograf'	=> $this->input->post('fotograf'),
									'aciklama'	=> $this->input->post('aciklama'),
									'fiyat'		=> $this->input->post('fiyat'),
									'priority'	=> $this->input->post('priority'),
									'status'	=> $status
								);
								
					
					$result = $this->boats_model->insert_aksesuar($data);

					if($result==true){
						$this->log_model->insert_log('Yeni aksesuar Eklendi Eklenen ID: '.$this->db->insert_id().'','insert');
						$this->session->set_flashdata('msg1',"aksesuar Eklendi");
						redirect('admin/aksesuar');
					}else{
						$this->session->set_flashdata('msg0',"aksesuar Eklenemedi");
						$this->load->view("aksesuar_insert");
					}
				}
			}

		$this->load->view('footer');
		$this->session->set_flashdata('msg1',"");
		$this->session->set_flashdata('msg0',"");
	}

	public function update_aksesuar(){
		
		$this->load->view('header');
		$id=$this->uri->segment(4);

			if($id){
				
				if(!$this->input->post()){
					
					$data["id"]			= $this->uri->segment(4);
					$aksesuar 			= $this->boats_model->aksesuar_data($id);
					
					$data['title']		= $aksesuar[0]["title"];
					$data['title']		= $aksesuar[0]["title"];
					$data["priority"]	= $aksesuar[0]["priority"];
					$data["status"]		= $aksesuar[0]["status"];
					$data["fotograf"]	= $aksesuar[0]["fotograf"];
					$data["aciklama"]	= $aksesuar[0]["aciklama"];
					$data["fiyat"]		= $aksesuar[0]["fiyat"];
					
					$this->load->view('aksesuar_update',$data);
				}else{

					$this->form_validation->set_rules('title', 'aksesuar Adı', 'trim|required|xss_clean');

					if ($this->form_validation->run() == FALSE){
						$this->session->set_flashdata('msg0',validation_errors());
					}else{
						$id=$this->uri->segment(4);


						if($this->input->post('status')){$status=1;}else{$status=0;}

						$data= array(
									'title'		=> $this->input->post('title'),
									'fotograf'	=> $this->input->post('fotograf'),
									'aciklama'	=> $this->input->post('aciklama'),
									'fiyat'		=> $this->input->post('fiyat'),
									'priority'	=> $this->input->post('priority'),
									'status'	=> $status
									);
	
						$result=$this->boats_model->update_aksesuar($id, $data);
						if($result==true)
						{
							$this->log_model->insert_log('aksesuar Bilgiler Güncellendi ID: '.$id.'','update');
							$this->session->set_flashdata('msg1',"Bilgiler Güncellendi");
						}
						else{
							$this->session->set_flashdata('msg0',"Değişiklik Yapılmadı !");
						}

					}
					$aksesuar 			= $this->boats_model->aksesuar_data($id);
					
					$data["id"]			= $this->uri->segment(4);

					$data['title']		= $aksesuar[0]["title"];
					$data['title']		= $aksesuar[0]["title"];
					$data["priority"]	= $aksesuar[0]["priority"];
					$data["status"]		= $aksesuar[0]["status"];
					$data["fotograf"]	= $aksesuar[0]["fotograf"];
					$data["aciklama"]	= $aksesuar[0]["aciklama"];
					$data["fiyat"]		= $aksesuar[0]["fiyat"];
					
					$this->load->view('aksesuar_update',$data);
				}
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