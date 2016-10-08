
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class yazi_ekle extends CI_Controller {

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
		$result = $this->db->query("SELECT * FROM li_blog WHERE ".$field."='".$val."' AND id!='".$this->uri->segment(4)."'");
		if($result->num_rows() > 0){return false;}else{ return true;}
	}

	public function index()
	{
		
		$this->load->view('header');



		$data['blog']=$this->boats_model->blog_data();
		$this->load->view('blog',$data);


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

	



	public function  blog_insert()
	{	
		$this->load->view('header');
		
			if(!$this->input->post()){
				$this->load->view('blog_insert');
			}else{
				$this->form_validation->set_rules('title', 'Yazı Adı', 'trim|required|xss_clean');

				
				if ($this->form_validation->run() == FALSE){
					$this->session->set_flashdata('msg0',validation_errors());
					$this->load->view('blog_insert');
				}else{


						if($this->input->post('status')){$status=1;}else{$status=0;}

						$data=array(

									'title'	=> $this->input->post('title'),
									'content' 	=> $this->input->post('content'),
									'img'		=> $this->input->post('img'),
									'date'		=> $this->input->post('date'),			
									'link' => $this->seo($this->input->post("title")),
									'status'	=> $status
									);
					
					$result = $this->boats_model->blog_insert($data);

					if($result==true){
						$this->log_model->insert_log('Yeni Yazı Eklendi Eklenen ID: '.$this->db->insert_id().'','insert');
						$this->session->set_flashdata('msg1',"Yazı Eklendi");
						redirect('admin/yazi_ekle');
					}else{
						$this->session->set_flashdata('msg0',"Yazı Eklenemedi");
						$this->load->view("yazi_ekle");
					}
				}
			}

		$this->load->view('footer');
		$this->session->set_flashdata('msg1',"");
		$this->session->set_flashdata('msg0',"");
	}

	public function blog_update()
	{
		$this->load->view('header');
		$id=$this->uri->segment(4);

			if($id){
				
				if(!$this->input->post()){
					$haberler 			= $this->boats_model->blog_update($id);
					
					$data["id"]			= $this->uri->segment(4);
					$data['img']		= $haberler[0]["img"];
					
					$data["status"]		= $haberler[0]["status"];
					$data["title"]		= $haberler[0]["title"];
				
					$data["link"]		= $haberler[0]["link"];
					
					$data["content"]		= $haberler[0]["content"];
					$data["date"]		= $haberler[0]["date"];
					$this->load->view('blog_update',$data);
				}else{

					$this->form_validation->set_rules('title', 'haberler Adı', 'trim|required|xss_clean');

					if ($this->form_validation->run() == FALSE){
						$this->session->set_flashdata('msg0',validation_errors());
					}else{
						$id = $this->input->post('id');


						if($this->input->post('status')){$status=1;}else{$status=0;}

						$data= array(
									'title'	=> $this->input->post('title'),
									'content' 	=> $this->input->post('content'),
									'img'		=> $this->input->post('img'),
									
									'date'		=> $this->input->post('date'),
									
									'link' => $this->seo($this->input->post("title")),
									
									'status'	=> $status
									);
	
						$result=$this->boats_model->update_blog($id, $data);
						if($result==true)
						{
							$this->log_model->insert_log('haberler Bilgiler Güncellendi ID: '.$id.'','update');
							$this->session->set_flashdata('msg1',"Bilgiler Güncellendi");
						redirect('admin/yazi_ekle');
						}
						else{
							$this->session->set_flashdata('msg0',"Değişiklik Yapılmadı !");
						}

					}
					$haberler 			= $this->boats_model->haberler_data($id);
					$data["id"]			= $this->uri->segment(4);
					$data['img']		= $haberler[0]["img"];
					
					$data["status"]		= $haberler[0]["status"];
					
					$data["title"]		= $haberler[0]["title"];
					$data["link"]		= $haberler[0]["link"];
					$data["content"]		= $haberler[0]["content"];
					
					$data["date"]		= $haberler[0]["date"];
					$this->load->view('blog_update',$data);
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