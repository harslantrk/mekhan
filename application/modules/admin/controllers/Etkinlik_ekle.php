<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Etkinlik_ekle extends CI_Controller {

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
		$result = $this->db->query("SELECT * FROM li_haberler WHERE ".$field."='".$val."' AND id!='".$this->uri->segment(4)."'");
		if($result->num_rows() > 0){return false;}else{ return true;}
	}

	public function index()
	{
		$this->load->view('header');

			$data['etkinlik_ekle']=$this->boats_model->haberler_data();
			$this->load->view('etkinlik_ekle',$data);


		$this->load->view('footer');
		$this->session->set_flashdata('msg1',"");
		$this->session->set_flashdata('msg0',"");
	}

	function seo($s) {
	 $tr = array('ş','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',':',',');
	 $eng = array('s','s','i','i','i','g','g','u','u','o','o','c','c','','','-','-','');
	 $s = str_replace($tr,$eng,$s);
	 $s = strtolower($s);
	 $s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
	 $s = preg_replace('/\s+/', '-', $s);
	 $s = preg_replace('|-+|', '-', $s);
	 $s = preg_replace('/#/', '', $s);
	 $s = str_replace('.', '', $s);
	 $s = trim($s, '-');
	 return $s;
	}





	public function  insert_haberler()
	{

		$this->load->view('header');

			if(!$this->input->post()){
				$data['etkinlik_mekan']	 = $this->boats_model->etkinlik_mekan();

				$this->load->view('haberler_insert', $data);
			}else{
				$this->form_validation->set_rules('baslik', 'Haberler Adı', 'trim|required|xss_clean');


				if ($this->form_validation->run() == FALSE){
					$this->session->set_flashdata('msg0',validation_errors());
					$data['etkinlik_mekan']	 = $this->boats_model->etkinlik_mekan();
					$this->load->view('haberler_insert', $data);
				}else{


						if($this->input->post('status')){$status=1;}else{$status=0;}

						$data=array(

									'baslik'	=> $this->input->post('baslik'),
									'icerik' 	=> $this->input->post('icerik'),
									'img'		=> $this->input->post('img'),
									'tarih'		=> $this->input->post('tarih'),
									'priority'	=> $this->input->post('priority'),
									'kategori'	=> $this->input->post('kategori'),

									'link' => $this->seo($this->input->post("baslik")),
									'status'	=> $status
									);

					$result = $this->boats_model->insert_haberler($data);
					$kosul2 = $this->db->affected_rows();
					$etkinlik_id = $this->db->insert_id();
					if (isset($_FILES['etkinlik_resimler'])) {
						$files = $_FILES['etkinlik_resimler']['name'];
						$SITE_ROOT = "uplo4ds/files/";
						$move_upload = move_uploaded_file($_FILES['etkinlik_resimler']['tmp_name'][0], $SITE_ROOT.$_FILES['etkinlik_resimler']['name'][0]);


						$img = array();
						$files = $_FILES['etkinlik_resimler']['name'];

						foreach ($files as $key => $value) {
								$data2=array(
								'event_image'  	 =>$value,
								'etkinlik_id'		 =>$etkinlik_id
								);


						$this->db->insert("etkinlik_resimler",$data2);
						$kosul1 = $this->db->affected_rows();
						}
					}

					if($kosul1 != 0 || $kosul2 != 0){
						$this->log_model->insert_log('Yeni Haber Eklendi Eklenen ID: '.$this->db->insert_id().'','insert');
						$this->session->set_flashdata('msg1',"Haber Eklendi");
						redirect('admin/etkinlik_ekle');
					}else{
						$this->session->set_flashdata('msg0',"Haber Eklenemedi");
						$this->load->view("etkinlik_ekle");
					}
				}
			}

		$this->load->view('footer');
		$this->session->set_flashdata('msg1',"");
		$this->session->set_flashdata('msg0',"");
	}

	public function update_haberler($id)
	{
		$this->load->view('header');
		$id=$this->uri->segment(4);

			if($id){

				if($this->input->post()){
					if (isset($_FILES['etkinlik_resimler'])) {
						$files = $_FILES['etkinlik_resimler']['name'];
						$SITE_ROOT = "uplo4ds/files/";
						$move_upload = move_uploaded_file($_FILES['etkinlik_resimler']['tmp_name'][0], $SITE_ROOT.$_FILES['etkinlik_resimler']['name'][0]);


						$img = array();
						$files = $_FILES['etkinlik_resimler']['name'];

						foreach ($files as $key => $value) {
								$data2=array(
								'event_image'  	 =>$value,
								'etkinlik_id'		 =>$etkinlik_id
								);


					$this->db->insert("etkinlik_resimler",$data2);
						$kosul1 = $this->db->affected_rows();

					}
		}



					$haberler 			= $this->boats_model->haber_update($id);
					$data['etkinlik_resimler']	=	$this->boats_model->etkinlik_resimler($id);
					$data["id"]			= $this->uri->segment(4);
					$data['img']		= $haberler[0]["img"];
					$data['etkinlik_mekan']	 = $this->boats_model->etkinlik_mekan();
					$data["priority"]	= $haberler[0]["priority"];
					$data["status"]		= $haberler[0]["status"];
					$data["baslik"]		= $haberler[0]["baslik"];
					$data["kategori"]		= $haberler[0]["kategori"];
					$data["link"]		= $haberler[0]["link"];
					$data["icerik"]		= $haberler[0]["icerik"];
					$data["tarih"]		= $haberler[0]["tarih"];
					$this->load->view('haberler_update',$data);
				}else{

					$this->form_validation->set_rules('baslik', 'haberler Adı', 'trim|required|xss_clean');

					if ($this->form_validation->run() == FALSE){
						$this->session->set_flashdata('msg0',validation_errors());
					}else{
						$id = $this->input->post('id');


						if($this->input->post('status')){$status=1;}else{$status=0;}

						$data= array(
									'baslik'	=> $this->input->post('baslik'),
									'icerik' 	=> $this->input->post('icerik'),
									'img'		=> $this->input->post('img'),
									'etkinlik_mekan'		=> $this->input->post('etkinlik_mekan'),
									'tarih'		=> $this->input->post('tarih'),
									'kategori'		=> $this->input->post('kategori'),
									'link' => $this->seo($this->input->post("baslik")),
									'priority'	=> $this->input->post('priority'),

									'status'	=> $status
									);

						$result=$this->boats_model->update_haberler($id, $data);
						if($result==true)
						{
							$this->log_model->insert_log('haberler Bilgiler Güncellendi ID: '.$id.'','update');
							$this->session->set_flashdata('msg1',"Bilgiler Güncellendi");
						redirect('admin/etkinlik_ekle');
						}
						else{
							$this->session->set_flashdata('msg0',"Değişiklik Yapılmadı !");
						}

					}
					$haberler 			= $this->boats_model->haberler_data($id);
					$data["id"]			= $this->uri->segment(4);
					$data['img']		= $haberler[0]["img"];
					$data["priority"]	= $haberler[0]["priority"];
					$data["status"]		= $haberler[0]["status"];
					$data['etkinlik_mekan']	 = $this->boats_model->etkinlik_mekan();
					$data["baslik"]		= $haberler[0]["baslik"];
					$data["link"]		= $haberler[0]["link"];
					$data["icerik"]		= $haberler[0]["icerik"];
					$data["kategori"]		= $haberler[0]["kategori"];
					$data["tarih"]		= $haberler[0]["tarih"];
					$data['etkinlik_resimler']	=	$this->boats_model->etkinlik_resimler($id);

					$this->load->view('haberler_update',$data);
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