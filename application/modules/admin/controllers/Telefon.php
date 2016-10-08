<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Telefon extends CI_Controller {

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
		$result = $this->db->query("SELECT * FROM li_telefon WHERE ".$field."='".$val."' AND id!='".$this->uri->segment(4)."'");
		if($result->num_rows() > 0){return false;}else{ return true;}
	}

	public function index()
	{
		$this->load->view('header');

			$data['telefon']=$this->boats_model->telefon_data();
			$this->load->view('telefon',$data);

		$this->load->view('footer');
		$this->session->set_flashdata('msg1',"");
		$this->session->set_flashdata('msg0',"");
	}



	public function  insert_telefon(){	
		$this->load->view('header');
		
			if(!$this->input->post()){
				$data["markalar"] = $result = $this->boats_model->markalar();
				$this->load->view('telefon_insert', $data);
			}else{
				$this->form_validation->set_rules('title', 'telefon Adı', 'trim|required|xss_clean');

				
				if ($this->form_validation->run() == FALSE){
					$this->session->set_flashdata('msg0',validation_errors());
					$this->load->view('telefon_insert');
				}else{


						if($this->input->post('status')){$status=1;}else{$status=0;}
	
						$renk = array();
						$renk = $_POST["renk"];
						
						$data=array(
									'title'		=> $this->input->post('title'),
									'marka'		=> $this->input->post('marka'),
									'markaseo'	=> seo($this->input->post('marka')),
									'renk'		=> json_encode($renk),
									'fotograf'	=> $this->input->post('fotograf'),
									'cokiyi'	=> $this->input->post('cokiyi'),
									'sorunlu'	=> $this->input->post('sorunlu'),
									'garanti'	=> $this->input->post('garanti'),
									'sarj'		=> $this->input->post('sarj'),
									'kulaklik'	=> $this->input->post('kulaklik'),
									'gb8'		=> $this->input->post('hafiza8'),
									'gb16'		=> $this->input->post('hafiza16'),
									'gb32'		=> $this->input->post('hafiza32'),
									'gb64'		=> $this->input->post('hafiza64'),
									'gb128'		=> $this->input->post('hafiza128'),
									'fiyat'		=> $this->input->post('fiyat'),
									'priority'	=> $this->input->post('priority'),
									'status'	=> $status
								);
								
					
					$result = $this->boats_model->insert_telefon($data);

					if($result==true){
						$this->log_model->insert_log('Yeni Telefon Eklendi Eklenen ID: '.$this->db->insert_id().'','insert');
						$this->session->set_flashdata('msg1',"Telefon Eklendi");
						redirect('admin/telefon');
					}else{
						$this->session->set_flashdata('msg0',"Telefon Eklenemedi");
						$this->load->view("telefon_insert");
					}
				}
			}

		$this->load->view('footer');
		$this->session->set_flashdata('msg1',"");
		$this->session->set_flashdata('msg0',"");
	}

	public function update_telefon(){
		
		$this->load->view('header');
		$id=$this->uri->segment(4);

			if($id){
				
				if(!$this->input->post()){
					
					$data["id"]			= $this->uri->segment(4);
					$telefon 			= $this->boats_model->telefon_data($id);
					$data["markalar"] 	= $result = $this->boats_model->markalar();
					
					$data['marka']		= $telefon[0]["marka"];
					$data['markaseo']	= $telefon[0]["markaseo"];
					$data['title']		= $telefon[0]["title"];
					$data['renk']		= json_decode($telefon[0]["renk"], true);
					$data["priority"]	= $telefon[0]["priority"];
					$data["status"]		= $telefon[0]["status"];
					$data["fotograf"]	= $telefon[0]["fotograf"];
					$data["cokiyi"]		= $telefon[0]["cokiyi"];
					$data["sorunlu"]	= $telefon[0]["sorunlu"];
					$data["garanti"]	= $telefon[0]["garanti"];
					$data["sarj"]		= $telefon[0]["sarj"];
					$data["kulaklik"]	= $telefon[0]["kulaklik"];
					$data["gb8"]		= $telefon[0]["gb8"];
					$data["gb16"]		= $telefon[0]["gb16"];
					$data["gb32"]		= $telefon[0]["gb32"];
					$data["gb64"]		= $telefon[0]["gb64"];
					$data["gb128"]		= $telefon[0]["gb128"];
					$data["fiyat"]		= $telefon[0]["fiyat"];
					
					$this->load->view('telefon_update',$data);
				}else{

					$this->form_validation->set_rules('title', 'telefon Adı', 'trim|required|xss_clean');

					if ($this->form_validation->run() == FALSE){
						$this->session->set_flashdata('msg0',validation_errors());
					}else{
						$id=$this->uri->segment(4);


						if($this->input->post('status')){$status=1;}else{$status=0;}

						$renk = array();
						$renk = $_POST["renk"];
						
						$data= array(
									'marka'		=> $this->input->post('marka'),
									'markaseo'	=> seo($this->input->post('marka')),
									'title'		=> $this->input->post('title'),
									'renk'		=> json_encode($renk),
									'fotograf'	=> $this->input->post('fotograf'),
									'cokiyi'	=> $this->input->post('cokiyi'),
									'sorunlu'	=> $this->input->post('sorunlu'),
									'garanti'	=> $this->input->post('garanti'),
									'sarj'		=> $this->input->post('sarj'),
									'kulaklik'	=> $this->input->post('kulaklik'),
									'gb8'		=> $this->input->post('hafiza8'),
									'gb16'		=> $this->input->post('hafiza16'),
									'gb32'		=> $this->input->post('hafiza32'),
									'gb64'		=> $this->input->post('hafiza64'),
									'gb128'		=> $this->input->post('hafiza128'),
									'fiyat'		=> $this->input->post('fiyat'),
									'priority'	=> $this->input->post('priority'),
									'status'	=> $status
									);
	
						$result=$this->boats_model->update_telefon($id, $data);
						if($result==true)
						{
							$this->log_model->insert_log('telefon Bilgiler Güncellendi ID: '.$id.'','update');
							$this->session->set_flashdata('msg1',"Bilgiler Güncellendi");
						}
						else{
							$this->session->set_flashdata('msg0',"Değişiklik Yapılmadı !");
						}

					}
					$telefon 			= $this->boats_model->telefon_data($id);
					$data["markalar"] 	= $result = $this->boats_model->markalar();
					
					$data["id"]			= $this->uri->segment(4);
					$data['marka']		= $telefon[0]["marka"];
					$data['markaseo']	= $telefon[0]["markaseo"];
					$data['title']		= $telefon[0]["title"];
					$data['renk']		= json_decode($telefon[0]["renk"], true);
					$data["priority"]	= $telefon[0]["priority"];
					$data["status"]		= $telefon[0]["status"];
					$data["fotograf"]	= $telefon[0]["fotograf"];
					$data["cokiyi"]		= $telefon[0]["cokiyi"];
					$data["sorunlu"]	= $telefon[0]["sorunlu"];
					$data["garanti"]	= $telefon[0]["garanti"];
					$data["sarj"]		= $telefon[0]["sarj"];
					$data["kulaklik"]	= $telefon[0]["kulaklik"];
					$data["gb8"]		= $telefon[0]["gb8"];
					$data["gb16"]		= $telefon[0]["gb16"];
					$data["gb32"]		= $telefon[0]["gb32"];
					$data["gb64"]		= $telefon[0]["gb64"];
					$data["gb128"]		= $telefon[0]["gb128"];
					$data["fiyat"]		= $telefon[0]["fiyat"];
					$this->load->view('telefon_update',$data);
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