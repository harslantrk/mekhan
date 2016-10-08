<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Ajax extends CI_Controller {



	function __construct()

	{

		parent::__construct();

		$this->load->model('log_model');

		$this->load->model('login_model');

		$this->login_model->login_control();



	}



	//////////////////////////////////  VALIDATE  ->

	public function check_field(){ // li_users username ve email kontrol

		$data=$this->input->get();

		$id=$this->uri->segment(4);

		$this->db->select('*');

		$this->db->from('li_users');

		if(!empty($id)){ $this->db->where('id != ',$id); }

		$this->db->where($data);

		$query =$this->db->get();

		if($query->num_rows()>0){ echo 'false'; }else{ echo 'true'; }

	}



	public function check_field_seo_url(){

		$id=$this->uri->segment(4);



		$this->db->from('li_pages AS p, li_categories AS c');

		if(!empty($id)){ // Düzenleme ise kendi seo_url gözardı et

			$this->db->where(" ( p.id != '".$id."' AND p.seo_url='".$this->input->get('seo_url')."' )

							OR ( c.id != '".$id."' AND c.seo_url='".$this->input->get('seo_url')."' ) ");

		}else{

			$this->db->where("p.seo_url='".$this->input->get('seo_url')."' OR c.seo_url='".$this->input->get('seo_url')."'  ");

		}



		$query =$this->db->get();

		if($query->num_rows()>0){ echo 'false'; }else{ echo 'true'; }

	}



	public function county_select(){

		$parent_id=$this->input->post('parent_id');

		$id=$this->input->post('id');

		echo $this->settings_model->county_select_option($parent_id,$id);

	}



	public function county_multiselect(){

		$parent_id=$this->input->post('parent_id');

		$id=$this->input->post('id');

		echo $this->settings_model->county_multiselect_option($parent_id,$id);

	}



	//////////////////////////////////  USER  ->

	public function user_status(){

		if(array_search('status',$this->session->userdata('auth')['users'])!==false){



			$this->load->model('user_model');

			$id=$this->input->post('id');

			$status=$this->input->post('status');

			$data=array('status'=>$status);

			$result=$this->user_model->update_user_status($data,$id);

			if($result==true)

			{

				if($status==1){

					$this->log_model->insert_log('Kullanıcı Aktif Edildi ID: '.$id,'update');

					echo '{"result":"'.$status.'","msg":" Kullanıcı Aktif"}';

				}else{

					$this->log_model->insert_log('Kullanıcı Pasif Edildi ID: '.$id,'update');

					echo '{"result":"'.$status.'","msg":" Kullanıcı Pasif"}';

				}

			}else{

				echo 'Güncelleme Olmadı !';

			}



		}else{

			$this->session->set_flashdata('msg0',"Yetkiniz olmadığı için işlem yapılamadı !");

			echo '{"refresh":"1"}';

		}



	}



	public function user_delete(){

		if(array_search('delete',$this->session->userdata('auth')['users'])!==false){



			$this->load->model('user_model');

			$id=$this->input->post('id');

			$result=$this->user_model->delete_user($id);

			if($result==true)

			{

				$this->log_model->insert_log('Kullanıcı Silindi Silinen ID: '.$id.'','delete');

				$this->session->set_flashdata('msg1',"Silme işlemi Başarılı");

				echo '{"refresh":"1"}';

			}else{

				echo 'Silme Başarısız !';

			}



		}else{

			$this->session->set_flashdata('msg0',"Yetkiniz olmadığı için işlem yapılamadı !");

			echo '{"refresh":"1"}';

		}

	}



	public function user_add_img(){

		$this->load->model('user_model');

		$id=$this->input->post('id');

		$result=$this->user_model->add_img($id);

		echo $result;

	}



	public function user_img_delete(){

		$this->load->model('user_model');

		$id=$this->input->post('id');

		$result=$this->user_model->img_delete($id);

		echo $result;

	}



////////////////////////////////////////////	HABERLER ->

	public function haberler_status(){





			$this->load->model('boats_model');

			$id=$this->input->post('id');

			$status=$this->input->post('status');

			$data=array('status'=>$status);

			$result=$this->boats_model->update_haberler_status($data,$id);

			if($result==true)

			{

				if($status==1){

					$this->log_model->insert_log('Haberler Aktif Edildi ID: '.$id,'update');

					echo '{"result":"'.$status.'","msg":" Haber Aktif"}';

				}else{

					$this->log_model->insert_log('Haber Pasif Edildi ID: '.$id,'update');

					echo '{"result":"'.$status.'","msg":" Haber Pasif"}';

				}

			}else{

				echo 'Güncelleme Olmadı !';

			}





	}



	public function haberler_delete(){



			$this->load->model('boats_model');

			$id=$this->input->post('id');

			$result=$this->boats_model->delete_haberler($id);

			if($result==true)

			{

				$this->log_model->insert_log('Haber Silindi Silinen ID: '.$id.'','delete');

				$this->session->set_flashdata('msg1',"Silme işlemi Başarılı");

				echo '{"refresh":"1"}';

			}else{

				echo 'Silme Başarısız !';

			}



	}



	public function status_blog(){

			$this->load->model('boats_model');

			$id=$this->input->post('id');

			$status=$this->input->post('status');

			$data=array('status'=>$status);

			$result=$this->boats_model->blog_status($data,$id);

			if($result==true)

			{

				if($status==1){

					$this->log_model->insert_log('Yazı Aktif Edildi ID: '.$id,'update');

					echo '{"result":"'.$status.'","msg":" Yazı Aktif"}';

				}else{

					$this->log_model->insert_log('Yazı Pasif Edildi ID: '.$id,'update');

					echo '{"result":"'.$status.'","msg":" Yazı Pasif"}';

				}

			}else{

				echo 'Güncelleme Olmadı !';

			}





	}



	public function delete_blog(){



			$this->load->model('boats_model');

			$id=$this->input->post('id');

			$result=$this->boats_model->blog_delete($id);

			if($result==true)

			{

				$this->log_model->insert_log('Yazı Silindi Silinen ID: '.$id.'','delete');

				$this->session->set_flashdata('msg1',"Silme işlemi Başarılı");

				echo '{"refresh":"1"}';

			}else{

				echo 'Silme Başarısız !';

			}



	}





//////////////////////////////////  PAGE  ->

	public function page_status(){

		if(array_search('status',$this->session->userdata('auth')['pages'])!==false){



			$this->load->model('page_model');

			$id=$this->input->post('id');

			$status=$this->input->post('status');

			$data=array('status'=>$status);

			$result=$this->page_model->update_page_status($data,$id);

			if($result==true)

			{

				if($status==1){

					$this->log_model->insert_log('Sayfa Aktif Edildi ID: '.$id,'update');

					echo '{"result":"'.$status.'","msg":" Sayfa Aktif"}';

				}else{

					$this->log_model->insert_log('Sayfa Pasif Edildi ID: '.$id,'update');

					echo '{"result":"'.$status.'","msg":" Sayfa Pasif"}';

				}

			}else{

				echo 'Güncelleme Olmadı !';

			}



		}else{

			$this->session->set_flashdata('msg0',"Yetkiniz olmadığı için işlem yapılamadı !");

			echo '{"refresh":"1"}';

		}

	}



	public function page_delete(){

		if(array_search('delete',$this->session->userdata('auth')['pages'])!==false){



			$this->load->model('page_model');

			$id=$this->input->post('id');

			$result=$this->page_model->delete_page($id);

			if($result==true)

			{

				$this->log_model->insert_log('Sayfa Silindi Silinen ID: '.$id.'','delete');

				$this->session->set_flashdata('msg1',"Silme işlemi Başarılı");

				echo '{"refresh":"1"}';

			}else{

				echo 'Silme Başarısız !';

			}



		}else{

			$this->session->set_flashdata('msg0',"Yetkiniz olmadığı için işlem yapılamadı !");

			echo '{"refresh":"1"}';

		}

	}



	public function page_priority_update(){

		if(array_search('priority',$this->session->userdata('auth')['pages'])!==false){



			$this->load->model('page_model');

			$id=$this->input->post('id');

			$data=array('priority'=>$this->input->post('val'));

			$result=$this->page_model->update_page_priority($data, $id);



			if($result==true)

			{

				$this->log_model->insert_log('Sayfa Sırası güncellendi ID: '.$id.'','update');

				$this->session->set_flashdata('msg1',"Sayfa Sırası Güncellendi");

				echo '{"refresh":"1"}';

			}else{

				echo 'Güncelleme Başarısız !';

			}



		}else{

			$this->session->set_flashdata('msg0',"Yetkiniz olmadığı için işlem yapılamadı !");

			echo '{"refresh":"1"}';

		}

	}



	public function page_top_id_select(){



			$this->load->model('page_model');

			$top_id=$this->input->post('top_id');

			echo $this->page_model->page_selector($top_id,'<input type="hidden" name="top_id" value="'.$top_id.'" />');



	}





	//////////////////////////////////  category  ->

	public function category_status(){

		if(array_search('status',$this->session->userdata('auth')['categories'])!==false){



			$this->load->model('category_model');

			$id=$this->input->post('id');

			$status=$this->input->post('status');

			$data=array('status'=>$status);

			$result=$this->category_model->update_category_status($data,$id);

			if($result==true)

			{

				if($status==1){

					$this->log_model->insert_log('Kategori Aktif Edildi ID: '.$id,'update');

					echo '{"result":"'.$status.'","msg":" Kategori Aktif"}';

				}else{

					$this->log_model->insert_log('Kategori Pasif Edildi ID: '.$id,'update');

					echo '{"result":"'.$status.'","msg":" Kategori Pasif"}';

				}

			}else{

				echo 'Güncelleme Olmadı !';

			}



		}else{

			$this->session->set_flashdata('msg0',"Yetkiniz olmadığı için işlem yapılamadı !");

			echo '{"refresh":"1"}';

		}

	}



	public function category_delete(){

		if(array_search('delete',$this->session->userdata('auth')['categories'])!==false){



			$this->load->model('category_model');

			$id=$this->input->post('id');

			$result=$this->category_model->delete_category($id);

			if($result==true)

			{

				$this->log_model->insert_log('Kategori Silindi Silinen ID: '.$id.'','delete');

				$this->session->set_flashdata('msg1',"Silme işlemi Başarılı");

				echo '{"refresh":"1"}';

			}else{

				echo 'Silme Başarısız !';

			}



		}else{

			$this->session->set_flashdata('msg0',"Yetkiniz olmadığı için işlem yapılamadı !");

			echo '{"refresh":"1"}';

		}

	}



	public function category_priority_update(){

		if(array_search('priority',$this->session->userdata('auth')['categories'])!==false){



			$this->load->model('category_model');

			$id=$this->input->post('id');

			$data=array('priority'=>$this->input->post('val'));

			$result=$this->category_model->update_category_priority($data, $id);



			if($result==true)

			{

				$this->log_model->insert_log('Kategori Sırası güncellendi ID: '.$id.'','update');

				$this->session->set_flashdata('msg1',"Kategori Sırası Güncellendi");

				echo '{"refresh":"1"}';

			}else{

				echo 'Güncelleme Başarısız !';

			}



		}else{

			$this->session->set_flashdata('msg0',"Yetkiniz olmadığı için işlem yapılamadı !");

			echo '{"refresh":"1"}';

		}

	}



	public function category_top_id_select(){



			$this->load->model('category_model');

			$top_id=$this->input->post('top_id');

			echo $this->category_model->category_selector($top_id,'<input type="hidden" name="top_id" value="'.$top_id.'" />');



	}



	//////////////////////////////////  SLIDER  ->

	public function slider_status(){

		if(array_search('status',$this->session->userdata('auth')['slider'])!==false){



			$this->load->model('slider_model');

			$id=$this->input->post('id');

			$status=$this->input->post('status');

			$data=array('status'=>$status);

			$result=$this->slider_model->update_slider_status($data,$id);

			if($result==true)

			{

				if($status==1){

					$this->log_model->insert_log('Slider Aktif Edildi ID: '.$id,'update');

					echo '{"result":"'.$status.'","msg":" Slider Aktif"}';

				}else{

					$this->log_model->insert_log('Slider Pasif Edildi ID: '.$id,'update');

					echo '{"result":"'.$status.'","msg":" Slider Pasif"}';

				}

			}else{

				echo 'Güncelleme Olmadı !';

			}



		}else{

			$this->session->set_flashdata('msg0',"Yetkiniz olmadığı için işlem yapılamadı !");

			echo '{"refresh":"1"}';

		}



	}



	public function slider_delete(){

		if(array_search('delete',$this->session->userdata('auth')['slider'])!==false){



			$this->load->model('slider_model');

			$id=$this->input->post('id');

			$result=$this->slider_model->delete_slider($id);

			if($result==true)

			{

				$this->log_model->insert_log('Slider Silindi Silinen ID: '.$id.'','delete');

				$this->session->set_flashdata('msg1',"Silme işlemi Başarılı");

				echo '{"refresh":"1"}';

			}else{

				echo 'Silme Başarısız !';

			}



		}else{

			$this->session->set_flashdata('msg0',"Yetkiniz olmadığı için işlem yapılamadı !");

			echo '{"refresh":"1"}';

		}

	}



	public function delete_mekan_img(){

		if(array_search('delete',$this->session->userdata('auth')['slider'])!==false){



			$this->load->model('slider_model');

			$id=$this->input->post('id');

			$result=$this->slider_model->delete_mekan_slider($id);

			if($result==true)

			{

				$this->log_model->insert_log('Resim Silindi Silinen ID: '.$id.'','delete');

				$this->session->set_flashdata('msg1',"Silme işlemi Başarılı");

				echo '{"refresh":"1"}';

			}else{

				echo 'Silme Başarısız !';

			}



		}else{

			$this->session->set_flashdata('msg0',"Yetkiniz olmadığı için işlem yapılamadı !");

			echo '{"refresh":"1"}';

		}

	}


	public function delete_etkinlik_img(){

		if(array_search('delete',$this->session->userdata('auth')['slider'])!==false){



			
			$id=$this->input->post('id');

			$result=$this->slider_model->delete_etkinlik_slider($id);

			if($result==true)

			{

				$this->log_model->insert_log('Resim Silindi Silinen ID: '.$id.'','delete');

				$this->session->set_flashdata('msg1',"Silme işlemi Başarılı");

				echo '{"refresh":"1"}';

			}else{

				echo 'Silme Başarısız !';

			}



		}else{

			$this->session->set_flashdata('msg0',"Yetkiniz olmadığı için işlem yapılamadı !");

			echo '{"refresh":"1"}';

		}

	}




	//////////////////////////////////  Gallery  ->

	public function gallery_status(){

		if(array_search('status',$this->session->userdata('auth')['gallery'])!==false){



			$this->load->model('boats_model');

			$id=$this->input->post('id');

			$status=$this->input->post('status');

			$data=array('status'=>$status);

			$result=$this->boats_model->update_gallery_status($data,$id);

			if($result==true)

			{

				if($status==1){

					$this->log_model->insert_log('Tekne Aktif Edildi ID: '.$id,'update');

					echo '{"result":"'.$status.'","msg":" Tekne Aktif"}';

				}else{

					$this->log_model->insert_log('Tekne Pasif Edildi ID: '.$id,'update');

					echo '{"result":"'.$status.'","msg":" Tekne Pasif"}';

				}

			}else{

				echo 'Güncelleme Olmadı !';

			}



		}else{

			$this->session->set_flashdata('msg0',"Yetkiniz olmadığı için işlem yapılamadı !");

			echo '{"refresh":"1"}';

		}



	}



	public function gallery_delete(){

		if(array_search('delete',$this->session->userdata('auth')['gallery'])!==false){



			$this->load->model('boats_model');

			$id=$this->input->post('id');

			$result=$this->boats_model->delete_gallery($id);

			if($result==true)

			{

				$this->log_model->insert_log('Galeri Silindi Silinen ID: '.$id.'','delete');

				$this->session->set_flashdata('msg1',"Silme işlemi Başarılı");

				echo '{"refresh":"1"}';

			}else{

				echo 'Silme Başarısız !';

			}



		}else{

			$this->session->set_flashdata('msg0',"Yetkiniz olmadığı için işlem yapılamadı !");

			echo '{"refresh":"1"}';

		}

	}



	//////////////////////////////////	telefon ->

	public function telefon_status(){





			$this->load->model('boats_model');

			$id=$this->input->post('id');

			$status=$this->input->post('status');

			$data=array('status'=>$status);

			$result=$this->boats_model->update_telefon_status($data,$id);

			if($result==true)

			{

				if($status==1){

					$this->log_model->insert_log('Tedarikçi Aktif Edildi ID: '.$id,'update');

					echo '{"result":"'.$status.'","msg":" Tedarikçi Aktif"}';

				}else{

					$this->log_model->insert_log('Tedarikçi Pasif Edildi ID: '.$id,'update');

					echo '{"result":"'.$status.'","msg":" Tedarikçi Pasif"}';

				}

			}else{

				echo 'Güncelleme Olmadı !';

			}





	}



	public function telefon_delete(){



			$this->load->model('boats_model');

			$id=$this->input->post('id');

			$result=$this->boats_model->delete_telefon($id);

			if($result==true)

			{

				$this->log_model->insert_log('telefon Silindi Silinen ID: '.$id.'','delete');

				$this->session->set_flashdata('msg1',"Silme işlemi Başarılı");

				echo '{"refresh":"1"}';

			}else{

				echo 'Silme Başarısız !';

			}



	}



//////////////////////////////////	tamir ->

	public function tamir_status(){





			$this->load->model('boats_model');

			$id=$this->input->post('id');

			$status=$this->input->post('status');

			$data=array('status'=>$status);

			$result=$this->boats_model->update_tamir_status($data,$id);

			if($result==true)

			{

				if($status==1){

					$this->log_model->insert_log('tamir Aktif Edildi ID: '.$id,'update');

					echo '{"result":"'.$status.'","msg":" tamir Aktif"}';

				}else{

					$this->log_model->insert_log('tamir Pasif Edildi ID: '.$id,'update');

					echo '{"result":"'.$status.'","msg":" tamir Pasif"}';

				}

			}else{

				echo 'Güncelleme Olmadı !';

			}





	}



	public function tamir_delete(){



			$this->load->model('boats_model');

			$id=$this->input->post('id');

			$result=$this->boats_model->delete_tamir($id);

			if($result==true)

			{

				$this->log_model->insert_log('tamir Silindi Silinen ID: '.$id.'','delete');

				$this->session->set_flashdata('msg1',"Silme işlemi Başarılı");

				echo '{"refresh":"1"}';

			}else{

				echo 'Silme Başarısız !';

			}



	}





//////////////////////////////////	siparis ->

	public function siparis_status(){



			$this->load->model('boats_model');

			$id=$this->input->post('id');

			$status=$this->input->post('status');

			//$data=array('status'=>$status);

			$result=$this->boats_model->update_siparis_status($status,$id);





			if($result==true)

			{

				if($status==1){

					$id=$this->input->post('id');

					$siparis = $this->boats_model->siparis_data($id);

					$ad = $siparis[0]["ad"];

					$email = $siparis[0]["email"];

					$this->siparisonaymail($email, $ad);

					$this->log_model->insert_log('Rezervasyon Onaylandı ID: '.$id,'update');

					echo '{"result":"'.$status.'","msg":" Rezervasyon Onaylandı"}';

				}else{

					$this->log_model->insert_log('Rezervasyon Onayı Kaldırıldı ID: '.$id,'update');

					echo '{"result":"'.$status.'","msg":" Rezervasyon Onayı Kaldırıldı"}';

				}

			}else{

				echo 'Güncelleme Olmadı !';

			}

	}



	public function siparis_delete(){



			$this->load->model('boats_model');

			$id=$this->input->post('id');

			$result=$this->boats_model->delete_siparis($id);

			if($result==true)

			{

				$this->log_model->insert_log('Rezervasyon Silindi Silinen ID: '.$id.'','delete');

				$this->session->set_flashdata('msg1',"Silme işlemi Başarılı");

				echo '{"refresh":"1"}';

			}else{

				echo 'Silme Başarısız !';

			}



	}



//////////////////////////////////	iletisim ->

	public function iletisim_status(){





			$this->load->model('boats_model');

			$id=$this->input->post('id');

			$status=$this->input->post('status');

			$data=array('status'=>$status);

			$result=$this->boats_model->update_iletisim_status($data,$id);

			if($result==true)

			{

				if($status==1){

					$this->log_model->insert_log('iletisim Aktif Edildi ID: '.$id,'update');

					echo '{"result":"'.$status.'","msg":" iletisim Aktif"}';

				}else{

					$this->log_model->insert_log('iletisim Pasif Edildi ID: '.$id,'update');

					echo '{"result":"'.$status.'","msg":" iletisim Pasif"}';

				}

			}else{

				echo 'Güncelleme Olmadı !';

			}





	}



	public function iletisim_delete(){



			$this->load->model('boats_model');

			$id=$this->input->post('id');

			$result=$this->boats_model->delete_iletisim($id);

			if($result==true)

			{

				$this->log_model->insert_log('iletisim Silindi Silinen ID: '.$id.'','delete');

				$this->session->set_flashdata('msg1',"Silme işlemi Başarılı");

				echo '{"refresh":"1"}';

			}else{

				echo 'Silme Başarısız !';

			}



	}



//////////////////////////////////	aksesuar ->

	public function aksesuar_status(){





			$this->load->model('boats_model');

			$id=$this->input->post('id');

			$status=$this->input->post('status');

			$data=array('status'=>$status);

			$result=$this->boats_model->update_aksesuar_status($data,$id);

			if($result==true)

			{

				if($status==1){

					$this->log_model->insert_log('aksesuar Aktif Edildi ID: '.$id,'update');

					echo '{"result":"'.$status.'","msg":" aksesuar Aktif"}';

				}else{

					$this->log_model->insert_log('aksesuar Pasif Edildi ID: '.$id,'update');

					echo '{"result":"'.$status.'","msg":" aksesuar Pasif"}';

				}

			}else{

				echo 'Güncelleme Olmadı !';

			}





	}



	public function aksesuar_delete(){



			$this->load->model('boats_model');

			$id=$this->input->post('id');

			$result=$this->boats_model->delete_aksesuar($id);

			if($result==true)

			{

				$this->log_model->insert_log('aksesuar Silindi Silinen ID: '.$id.'','delete');

				$this->session->set_flashdata('msg1',"Silme işlemi Başarılı");

				echo '{"refresh":"1"}';

			}else{

				echo 'Silme Başarısız !';

			}



	}



//////////////////////////////////	YORUMLAR ->

	public function yorumlar_status(){





			$this->load->model('boats_model');

			$id=$this->input->post('id');

			$status=$this->input->post('status');

			$data=array('status'=>$status);

			$result=$this->boats_model->update_yorumlar_status($data,$id);

			if($result==true)

			{

				if($status==1){

					$this->log_model->insert_log('yorumlar Aktif Edildi ID: '.$id,'update');

					echo '{"result":"'.$status.'","msg":" Yorum Aktif"}';

				}else{

					$this->log_model->insert_log('Yorum Pasif Edildi ID: '.$id,'update');

					echo '{"result":"'.$status.'","msg":" Yorum Pasif"}';

				}

			}else{

				echo 'Güncelleme Olmadı !';

			}





	}



	public function yorumlar_delete(){



			$this->load->model('boats_model');

			$id=$this->input->post('id');

			$result=$this->boats_model->delete_yorumlar($id);

			if($result==true)

			{

				$this->log_model->insert_log('Yorum Silindi Silinen ID: '.$id.'','delete');

				$this->session->set_flashdata('msg1',"Silme işlemi Başarılı");

				echo '{"refresh":"1"}';

			}else{

				echo 'Silme Başarısız !';

			}



	}



	//////////////////////////////////  CUSTOMER  ->

	public function customer_status(){

		if(array_search('status',$this->session->userdata('auth')['customers'])!==false){



			$this->load->model('customers_model');

			$id=$this->input->post('id');

			$status=$this->input->post('status');

			$data=array('status'=>$status);

			$result=$this->customers_model->update_customer_status($data,$id);

			if($result==true)

			{

				if($status==1){

					$this->log_model->insert_log('Müşteri Aktif Edildi ID: '.$id,'update');

					echo '{"result":"'.$status.'","msg":" Müşteri Aktif"}';

				}else{

					$this->log_model->insert_log('Müşteri Pasif Edildi ID: '.$id,'update');

					echo '{"result":"'.$status.'","msg":" Müşteri Pasif"}';

				}

			}else{

				echo 'Güncelleme Olmadı !';

			}



		}else{

			$this->session->set_flashdata('msg0',"Yetkiniz olmadığı için işlem yapılamadı !");

			echo '{"refresh":"1"}';

		}



	}



	public function customer_delete(){

		if(array_search('delete',$this->session->userdata('auth')['customers'])!==false){



			$this->load->model('customers_model');

			$id=$this->input->post('id');

			$result=$this->customers_model->delete_customer($id);

			if($result==true)

			{

				$this->log_model->insert_log('Müşteri Silindi Silinen ID: '.$id.'','delete');

				$this->session->set_flashdata('msg1',"Silme işlemi Başarılı");

				echo '{"refresh":"1"}';

			}else{

				echo 'Silme Başarısız !';

			}



		}else{

			$this->session->set_flashdata('msg0',"Yetkiniz olmadığı için işlem yapılamadı !");

			echo '{"refresh":"1"}';

		}

	}



	//////////////////////////////////  MEMBERS  ->



	public function check_field_member(){ // member email kontrol

		$id=$this->uri->segment(4);

		$this->db->select('*');

		$this->db->from('li_members');

		if(!empty($id)){ $this->db->where('id != ',$id); }

		$this->db->where('email',$this->input->get('member_email'));

		$query =$this->db->get();

		if($query->num_rows()>0){ echo 'false'; }else{ echo 'true'; }

	}



	public function member_status(){

		if(array_search('status',$this->session->userdata('auth')['members'])!==false){



			$this->load->model('member_model');

			$id=$this->input->post('id');

			$status=$this->input->post('status');

			$data=array('status'=>$status);

			$result=$this->member_model->update_member_status($data,$id);

			if($result==true)

			{

				if($status==1){

					$this->log_model->insert_log('Üye Aktif Edildi ID: '.$id,'update');

					echo '{"result":"'.$status.'","msg":" Üye Aktif"}';

				}else{

					$this->log_model->insert_log('Üye Pasif Edildi ID: '.$id,'update');

					echo '{"result":"'.$status.'","msg":" Üye Pasif"}';

				}

			}else{

				echo 'Güncelleme Olmadı !';

			}



		}else{

			$this->session->set_flashdata('msg0',"Yetkiniz olmadığı için işlem yapılamadı !");

			echo '{"refresh":"1"}';

		}



	}



	public function member_delete(){

		if(array_search('delete',$this->session->userdata('auth')['members'])!==false){



			$this->load->model('member_model');

			$id=$this->input->post('id');

			$result=$this->member_model->delete_member($id);

			if($result==true)

			{

				$this->log_model->insert_log('Üye Silindi Silinen ID: '.$id.'','delete');

				$this->session->set_flashdata('msg1',"Silme işlemi Başarılı");

				echo '{"refresh":"1"}';

			}else{

				echo 'Silme Başarısız !';

			}



		}else{

			$this->session->set_flashdata('msg0',"Yetkiniz olmadığı için işlem yapılamadı !");

			echo '{"refresh":"1"}';

		}

	}



	public function member_add_img(){

		$this->load->model('member_model');

		$id=$this->input->post('id');

		$result=$this->member_model->add_img($id);

		echo $result;

	}



	public function member_img_delete(){

		$this->load->model('member_model');

		$id=$this->input->post('id');

		$result=$this->member_model->img_delete($id);

		echo $result;

	}





	//////////////////////////////////  bidS  ->

	public function bid_status(){

		if(array_search('status',$this->session->userdata('auth')['bids'])!==false){



			$this->load->model('bid_model');

			$id=$this->input->post('id');

			$status=$this->input->post('status');

			$data=array('status'=>$status);

			$result=$this->bid_model->update_bid_status($data,$id);

			if($result==true)

			{

				if($status==1){

					$this->log_model->insert_log('Talep Aktif Edildi ID: '.$id,'update');

					echo '{"result":"'.$status.'","msg":" Talep Aktif"}';

				}else{

					$this->log_model->insert_log('Talep Pasif Edildi ID: '.$id,'update');

					echo '{"result":"'.$status.'","msg":" Talep Pasif"}';

				}

			}else{

				echo 'Güncelleme Olmadı !';

			}



		}else{

			$this->session->set_flashdata('msg0',"Yetkiniz olmadığı için işlem yapılamadı !");

			echo '{"refresh":"1"}';

		}



	}



	public function bid_delete(){

		if(array_search('delete',$this->session->userdata('auth')['bids'])!==false){



			$this->load->model('bid_model');

			$id=$this->input->post('id');

			$result=$this->bid_model->delete_bid($id);

			if($result==true)

			{

				$this->log_model->insert_log('Talep Silindi Silinen ID: '.$id.'','delete');

				$this->session->set_flashdata('msg1',"Silme işlemi Başarılı");

				echo '{"refresh":"1"}';

			}else{

				echo 'Silme Başarısız !';

			}



		}else{

			$this->session->set_flashdata('msg0',"Yetkiniz olmadığı için işlem yapılamadı !");

			echo '{"refresh":"1"}';

		}

	}



	//////////////////////////////////  Services  ->

	public function service_status(){

		if(array_search('status',$this->session->userdata('auth')['services'])!==false){



			$this->load->model('service_model');

			$id=$this->input->post('id');

			$status=$this->input->post('status');

			$data=array('status'=>$status);

			$result=$this->service_model->update_service_status($data,$id);

			if($result==true)

			{

				if($status==1){

					$this->log_model->insert_log('Hizmet Aktif Edildi ID: '.$id,'update');

					echo '{"result":"'.$status.'","msg":" Hizmet Aktif"}';

				}else{

					$this->log_model->insert_log('Hizmet Pasif Edildi ID: '.$id,'update');

					echo '{"result":"'.$status.'","msg":" Hizmet Pasif"}';

				}

			}else{

				echo 'Güncelleme Olmadı !';

			}



		}else{

			$this->session->set_flashdata('msg0',"Yetkiniz olmadığı için işlem yapılamadı !");

			echo '{"refresh":"1"}';

		}



	}



	public function service_delete(){

		if(array_search('delete',$this->session->userdata('auth')['services'])!==false){



			$this->load->model('service_model');

			$id=$this->input->post('id');

			$result=$this->service_model->delete_service($id);

			if($result==true)

			{

				$this->log_model->insert_log('Hizmet Silindi Silinen ID: '.$id.'','delete');

				$this->session->set_flashdata('msg1',"Silme işlemi Başarılı");

				echo '{"refresh":"1"}';

			}else{

				echo 'Silme Başarısız !';

			}



		}else{

			$this->session->set_flashdata('msg0',"Yetkiniz olmadığı için işlem yapılamadı !");

			echo '{"refresh":"1"}';

		}

	}



	private function siparisonaymail($email, $ad){

		$mesaj  = "";

		$mesaj .= '<b>Akıllı Panda Sipariş Onayı</b><br /><br />';

		$mesaj .= 'Siparişiniz Onaylanmıştır.<br /><br />';

		$mesaj .= 'Akıllı Panda\'yı Tercih Ettiğiniz İçin Teşekkür Ederiz.<br /><br />';



		require("./assets/mail/mail-class/class.phpmailer.php");

		require("./assets/mail/mail-class/class.smtp.php");



		$SenderName	=$this->session->userdata('front_title');

		$SenderMail	=$this->session->userdata("settings")["smtp_email"];

		$Password	=$this->session->userdata("settings")["smtp_pass"];

		$mail=new PHPMailer();

		$mail->IsSMTP();

		$mail->IsHTML(true);

		$mail->setLanguage('tr');

		$mail->Host 	 = $this->session->userdata("settings")["smtp_host"];

		$mail->SMTPAuth  = true;

		$mail->SMTPSecure= 'tls'; // ssl or tls

		$mail->Port 	 = 587;

		//$mail->SMTPDebug  = 2;

		$mail->Username  = $SenderMail;

		$mail->Password  = $Password;

		$mail->FromName  = $SenderName;

		$mail->From 	 = $SenderMail;

		$mail->Subject 	 = 'akillipanda.com Sipariş';

		$mail->Body    	 = $mesaj;

		$mail->AddAddress($email, $ad);

		$mail->Send();



	}







}?>

