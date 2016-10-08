<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Gallery extends CI_Controller {



	function __construct()

	{

		parent::__construct();

		$this->load->model('log_model');

		$this->load->model('login_model');
		$this->load->model('settings_model');

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

		$result = $this->db->query("SELECT * FROM li_boats WHERE ".$field."='".$val."' AND id!='".$this->uri->segment(4)."'");

		if($result->num_rows() > 0){return false;}else{ return true;}

	}



	public function index()

	{


		$this->load->view('header');

		if(array_search('list',$this->session->userdata('auth')['gallery'])!==false){//kullanıcı kontrol



			$data['gallery']=$this->boats_model->gallery_data();
			

			$this->load->view('gallery',$data);



		}else{

			$this->session->set_flashdata('msg0',"Bu bölüm için yetkiniz yoktur !");

			$this->load->view('assets/msg');

		}



		$this->load->view('footer');

		$this->session->set_flashdata('msg1',"");

		$this->session->set_flashdata('msg0',"");

	}







	public function  insert_gallery()

	{	

		$this->load->view('header');



		if(array_search('insert',$this->session->userdata('auth')['gallery'])!==false){

		

			if(!$this->input->post()){

				$data["markalar"] = $result = $this->boats_model->markalar();

				$this->load->view('gallery_insert', $data);

			}else{

				$this->form_validation->set_rules('title', 'Galeri Adı', 'trim|required|xss_clean');



				

				if ($this->form_validation->run() == FALSE){

					$this->session->set_flashdata('msg0',validation_errors());

					$data["markalar"] =  $this->boats_model->markalar();

					$this->load->view('gallery_insert', $data);

				}else{

						

						



						if($this->input->post('status')){$status=1;}else{$status=0;}

						

						$data_ozellik 	= array(

							"Uzunluk" 		=> postt("ozellik1"),

							"Genişlik"				=> postt("ozellik2"),

							"Yemekli Kapasite"	=> postt("ozellik3"),

							"Kokteyl Kapasite"	=> postt("ozellik4"),

							"Kaptan"			=> postt("ozellik5"),

							"Servis Elemanı"	=> postt("ozellik6"), 

							"Müzik Sistemi"	=> postt("ozellik7"),

							"Mutfak"		=> postt("ozellik8"),

							"Klima"		=> postt("ozellik9"),

							"Jeneratör"			=> postt("ozellik10"),

							"WC"		=> postt("ozellik11")

						);

						

						$sfiyat = $renk = array();

						$renk = $_POST["renk"];

						$footer_link = $_POST["footer_link"];

						$sfiyat = $_POST["sfiyat"];



						$kalkis_n = postt("kalkis_noktasi");

						$varis_n = postt("varis_noktasi");





						$data=array(

									'urunkod'	=> substr(uniqid(),0,8),

									'title'		=> $this->input->post('title'),

									'footer_link' => $this->input->post('footer_link'),

									'ozellik'	=> json_encode($data_ozellik),

									'renk'		=> json_encode($renk),

									'sfiyat'	=> json_encode($sfiyat),

									'footer_fotograf' 	=> $this->input->post('footer_fotograf'),

									'marka' 	=> $this->input->post('marka'),

									'markaseo' 	=> seo($this->input->post('marka')),

									'kisi_basi'		=> $this->input->post('kisi_basi'),

									'ozel_k'		=> $this->input->post('ozel_k'),

									'yolcu_k'		=> $this->input->post('yolcu_k'),

									'acenta_f'		=> $this->input->post('acenta_f'),

									'rehber_f'	=> $this->input->post('rehber_f'),

									'toptan_f'	=> $this->input->post('toptan_f'),

									'kalkis_n'	=> $kalkis_n,

									'varis_n'	=> $varis_n,

									'priority'	=> $this->input->post('priority'),

									'status'	=> $status,

									'tarih1'	=> postt('tarih1'),

									'tarih2'	=> postt('tarih2'),

									'tarih3'	=> postt('tarih3')

									);



					$result = $this->boats_model->insert_gallery($data);



					if($result==true){

						$this->log_model->insert_log('Yeni Tekne Eklendi Eklenen ID: '.$this->db->insert_id().'','insert');

						$this->session->set_flashdata('msg1',"Tekne Eklendi");

						redirect('admin/gallery');

					}else{

						$this->session->set_flashdata('msg0',"Tekne Eklenemedi");

						$data["semtler"] = $this->boats_model->semtler();

						$this->load->view("gallery_insert", $data);

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
	public function reklam_update(){
		$this->load->view('header');
		$id=$this->uri->segment(4);
		
		
		$this->load->view('update_gallery',$data);

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

				

				if($this->input->post()){

					$galeri_update = array(
						'id' => $this->input->post("id"),
						'title' => $this->input->post("title"),
						'footer_fotograf' => $this->input->post("footer_fotograf"),
						'footer_link' => $this->input->post("footer_link"),
						'status' => $this->input->post("status")

						);
					$g_update = $this->boats_model->update_gallery($galeri_update);
					
					if ($g_update) {
						$this->session->set_flashdata('msg1',"Bilgiler Güncellendi");
						redirect('admin/gallery');

					}
					else {
						$this->session->set_flashdata('msg0',"Değişiklik Yapılmadı !");
						redirect('admin/gallery');
						
					}

					
					$data["gallery"]=$this->boats_model->gallery_data();
				
					$this->load->view('header');
					$this->load->view('gallery', $data);
					$this->load->view('footer');
	

				}else{



					$this->form_validation->set_rules('title', 'Galeri Adı', 'trim|required|xss_clean');



					if ($this->form_validation->run() == FALSE){

						$this->session->set_flashdata('msg0',validation_errors());

					}else{

						$id = $this->input->post('id');

						

						if($this->input->post('status')){$status=1;}else{$status=0;}

						

						$sfiyat = $renk = array();





						$data=array(

									'title'		=> $this->input->post('title'),

									

									'footer_fotograf' 	=> $this->input->post('footer_fotograf'),

									
									'status'	=> $status,

									

									'footer_link'	=> $this->input->post('footer_link')

									

									);

	

						



						if($result==true)

						{

							$this->log_model->insert_log('Tekne Bilgileri Güncellendi ID: '.$id.'','update');

							$this->session->set_flashdata('msg1',"Bilgiler Güncellendi");

						}

						else{

							$this->session->set_flashdata('msg0',"Değişiklik Yapılmadı !");

						}



					}

					$galeri = $this->boats_model->gallery_data($id);

					

					$data['renk'] = array();



					$data["id"]			= $this->uri->segment(4);

					$data["title"]		= $galeri[0]["title"];

					$data['ozellik']	= json_decode($galeri[0]["ozellik"], true);

					array_push($data['renk'],array("servisler" => json_decode($galeri[0]["renk"], true)));

					array_push($data['renk'],array("servis_fiyati" => json_decode($galeri[0]["sfiyat"], true)));

					$data["footer_fotograf"]	= $galeri[0]["footer_fotograf"];

					$data["marka"]		= $galeri[0]["marka"];

					$data["footer_link"]		= $galeri[0]["footer_link"];

					$data["markaseo"]	= $galeri[0]["markaseo"];

					$data["kisi_basi"]		= $galeri[0]["kisi_basi"];

					$data["ozel_k"]		= $galeri[0]["ozel_k"];

					$data["yolcu_k"]		= $galeri[0]["yolcu_k"];

					$data["acenta_f"]		= $galeri[0]["acenta_f"];

					$data["rehber_f"]		= $galeri[0]["rehber_f"];

					$data["toptan_f"]		= $galeri[0]["toptan_f"];

					$data["kalkis_n"]		= $galeri[0]["kalkis_n"];

					$data["varis_n"]		= $galeri[0]["varis_n"];

					$data['tarih1']			= $galeri[0]['tarih1'];

					$data['tarih2']			= $galeri[0]['tarih2'];

					$data['tarih3']			= $galeri[0]['tarih3'];

					$data["priority"]	= $galeri[0]["priority"];

					$data["status"]		= $galeri[0]["status"];

					

					$data["markalar"] = $this->boats_model->markalar();

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