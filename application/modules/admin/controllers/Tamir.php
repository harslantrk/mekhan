<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tamir extends CI_Controller {

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
		$result = $this->db->query("SELECT * FROM li_tamir WHERE ".$field."='".$val."' AND id!='".$this->uri->segment(4)."'");
		if($result->num_rows() > 0){return false;}else{ return true;}
	}

	public function index()
	{
		$this->load->view('header');

			$data['tamir']=$this->boats_model->tamir_data();
			$this->load->view('tamir',$data);

		$this->load->view('footer');
		$this->session->set_flashdata('msg1',"");
		$this->session->set_flashdata('msg0',"");
	}



	public function  insert_tamir(){	
		$this->load->view('header');
		
			if(!$this->input->post()){
				$data["markalar"] = $result = $this->boats_model->markalar();
				$this->load->view('tamir_insert', $data);
			}else{
				$this->form_validation->set_rules('title', 'tamir Adı', 'trim|required|xss_clean');

				
				if ($this->form_validation->run() == FALSE){
					$this->session->set_flashdata('msg0',validation_errors());
					$this->load->view('tamir_insert');
				}else{


						if($this->input->post('status')){$status=1;}else{$status=0;}

						$data=array(
									'title'			=> postt('title'),
									'marka'			=> postt('marka'),
									'markaseo'		=> seo(postt('marka')),
									'fotograf'		=> postt('fotograf'),
									"kirikekran"	=> postt("kirikekran"),
									"sivitemasi"  	=> postt("sivitemasi"),
									"sarjsorunu"  	=> postt("sarjsorunu"),
									"sessorunu"  	=> postt("sessorunu"),
									"pilsorunu"  	=> postt("pilsorunu"),
									"tussorunu"  	=> postt("tussorunu"),
									"kamerasorunu"  => postt("kamerasorunu"),
									"tamirsure"  	=> postt("tamirsure"),
									"yedektelefon"  => postt("yedektelefon"),
									'priority'		=> $this->input->post('priority'),
									'status'		=> $status
								);
								
					
					$result = $this->boats_model->insert_tamir($data);

					if($result==true){
						$this->log_model->insert_log('Yeni tamir Eklendi Eklenen ID: '.$this->db->insert_id().'','insert');
						$this->session->set_flashdata('msg1',"tamir Eklendi");
						redirect('admin/tamir');
					}else{
						$this->session->set_flashdata('msg0',"tamir Eklenemedi");
						$this->load->view("tamir_insert");
					}
				}
			}

		$this->load->view('footer');
		$this->session->set_flashdata('msg1',"");
		$this->session->set_flashdata('msg0',"");
	}

	public function update_tamir(){
		
		$this->load->view('header');
		$id=$this->uri->segment(4);

			if($id){
				
				if(!$this->input->post()){
					
					$data["id"]			= $this->uri->segment(4);
					$tamir 				= $this->boats_model->tamir_data($id);
					$data["markalar"] 	= $result = $this->boats_model->markalar();
					
					$data['marka']		= $tamir[0]["marka"];
					$data['markaseo']	= $tamir[0]["markaseo"];
					$data['title']		= $tamir[0]["title"];
					$data["priority"]	= $tamir[0]["priority"];
					$data["status"]		= $tamir[0]["status"];
					$data["fotograf"]	= $tamir[0]["fotograf"];
					$data["kirikekran"]	= $tamir[0]["kirikekran"];
					$data["sivitemasi"]  	= $tamir[0]["sivitemasi"];
					$data["sarjsorunu"]  	= $tamir[0]["sarjsorunu"];
					$data["sessorunu"]  	= $tamir[0]["sessorunu"];
					$data["pilsorunu"]  	= $tamir[0]["pilsorunu"];
					$data["tussorunu"] 	= $tamir[0]["tussorunu"];
					$data["kamerasorunu"]  = $tamir[0]["kamerasorunu"];
					$data["tamirsure"]  	= $tamir[0]["tamirsure"];
					$data["yedektelefon"]  = $tamir[0]["yedektelefon"];
					
					
					$this->load->view('tamir_update',$data);
				}else{

					$this->form_validation->set_rules('title', 'tamir Adı', 'trim|required|xss_clean');

					if ($this->form_validation->run() == FALSE){
						$this->session->set_flashdata('msg0',validation_errors());
					}else{
						$id=$this->uri->segment(4);


						if($this->input->post('status')){$status=1;}else{$status=0;}

						$data= array(
									'title'			=> postt('title'),
									'marka'			=> postt('marka'),
									'markaseo'		=> seo(postt('marka')),
									'fotograf'		=> postt('fotograf'),
									"kirikekran"	=> postt("kirikekran"),
									"sivitemasi"  	=> postt("sivitemasi"),
									"sarjsorunu"  	=> postt("sarjsorunu"),
									"sessorunu"  	=> postt("sessorunu"),
									"pilsorunu"  	=> postt("pilsorunu"),
									"tussorunu"  	=> postt("tussorunu"),
									"kamerasorunu"  => postt("kamerasorunu"),
									"tamirsure"  	=> postt("tamirsure"),
									"yedektelefon"  => postt("yedektelefon"),
									'priority'		=> $this->input->post('priority'),
									'status'		=> $status
									);
	
						$result=$this->boats_model->update_tamir($id, $data);
						if($result==true)
						{
							$this->log_model->insert_log('tamir Bilgiler Güncellendi ID: '.$id.'','update');
							$this->session->set_flashdata('msg1',"Bilgiler Güncellendi");
						}
						else{
							$this->session->set_flashdata('msg0',"Değişiklik Yapılmadı !");
						}

					}
					$tamir 			= $this->boats_model->tamir_data($id);
					$data["markalar"] 	= $result = $this->boats_model->markalar();
					
					$data["id"]			= $this->uri->segment(4);
					$data['marka']		= $tamir[0]["marka"];
					$data['markaseo']	= $tamir[0]["markaseo"];
					$data['title']		= $tamir[0]["title"];
					$data["priority"]	= $tamir[0]["priority"];
					$data["status"]		= $tamir[0]["status"];
					$data["fotograf"]	= $tamir[0]["fotograf"];
					$data["kirikekran"]	= $tamir[0]["kirikekran"];
					$data["sivitemasi"]  	= $tamir[0]["sivitemasi"];
					$data["sarjsorunu"]  	= $tamir[0]["sarjsorunu"];
					$data["sessorunu"]  	= $tamir[0]["sessorunu"];
					$data["pilsorunu"]  	= $tamir[0]["pilsorunu"];
					$data["tussorunu"] 	= $tamir[0]["tussorunu"];
					$data["kamerasorunu"]  = $tamir[0]["kamerasorunu"];
					$data["tamirsure"]  	= $tamir[0]["tamirsure"];
					$data["yedektelefon"]  = $tamir[0]["yedektelefon"];
					$this->load->view('tamir_update',$data);
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