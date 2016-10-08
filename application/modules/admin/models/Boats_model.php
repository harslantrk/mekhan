<?php



class Boats_model extends CI_Model

{

	function __construct()

	{

		parent::__construct();

		$this->load->library("pagination");

		$this->load->model('pagination_model');

	}



	public function gallery_data($id='')

	{

		$this->db->select("*");

		$this->db->from('li_boats');

		if($id){

			$this->db->where('id',$id);

		}

		return $this->db->get()->result_array();

	}



	//markalar

	public function markalar()

	{

		return $this->db->select("*")

						->from('li_categories')

						->get()

						->result_array();

	}



	public function insert_gallery(){
		return $this->db->select("fotograf, link")

						->from('li_boats')

						->get()

						->result_array();

	}



	public function update_gallery($data)

	{



		$this->db->where('id',$data["id"])

		->update("li_boats",$data);

		return ($this->db->affected_rows() == 1 || $this->db->affected_rows() == 2 ) ? true:false;

	}

	public function mekanSlider ($mekan_id) {
		return$this->db->select("*")

		->from('mekan_resimler')

		->where('mekan_id',$mekan_id)

		->get()

		->result();
	}



	public function update_gallery_status($data,$id)

	{

		$this->db->where('id',$id);

		$this->db->update("li_boats",$data);

		return ($this->db->affected_rows() == 1 ) ? true:false;

	}



	public function delete_gallery($id)

	{

		$this->db->where("id='".$id."'");

		$this->db->delete('li_boats');

		return ($this->db->affected_rows() == 1 ) ? true:false;

	}



	/***************************************************************************************

	*																					   *

								SİPARİŞ

	*																					   *

	***************************************************************************************/

	public function siparis_data($id='')

	{

		$this->db->select("li_rezervasyon.id as rez_id, li_rezervasyon.*, li_members.*");

		$this->db->from('li_rezervasyon');

		$this->db->join('li_members','li_members.id=li_rezervasyon.uyeid');

		if($id){

			$this->db->where('li_rezervasyon.id',$id);

		}

		return $this->db->get()->result_array();



	}



	public function siparisDetay_data($id=''){

		$this->db->select("li_boats.urunkod, li_boats.title, li_boats.ozellik, li_boats.marka, li_members.ad, li_members.email, li_members.tel, li_members.adres, li_rezervasyon.*");

		$this->db->from("li_rezervasyon");

		$this->db->join("li_members","li_members.id=li_rezervasyon.uyeid");

		$this->db->join("li_boats","li_boats.id=li_rezervasyon.boat_id");

		$this->db->where("li_rezervasyon.id",$id);

		return $this->db->get()->row_array();

	}





	public function update_siparis($id, $data)

	{



		$this->db->where('id',$id);

		$this->db->update("li_rezervasyon",$data);

		return ($this->db->affected_rows() == 1 || $this->db->affected_rows() == 2 ) ? true:false;

	}



	public function update_siparis_status($status,$id)

	{

		/*$this->db->where('id',$id);

		$this->db->update("li_rezervasyon",$data);

		return ($this->db->affected_rows() == 1 ) ? true:false;*/

		$sql = "UPDATE li_rezervasyon SET status = ? WHERE id = ?";

		return ($this->db->query($sql, array($status, $id)) == 1) ? true : false;

	}



	public function delete_siparis($id)

	{

		$this->db->where("id='".$id."'");

		$this->db->delete('li_rezervasyon');

		return ($this->db->affected_rows() == 1 ) ? true:false;

	}



	/***************************************************************************************

	*																					   *

								TELEFON

	*																					   *

	***************************************************************************************/

	public function telefon_data($id='')

	{

		$this->db->select("*");

		$this->db->from('li_boat_cats');

		if($id){

			$this->db->where('id',$id);

		}

		return $this->db->get()->result_array();

	}





	public function insert_telefon($data){



		$this->db->insert('li_boat_cats',$data);

		return ($this->db->affected_rows() != 1 ) ? false:true;

	}



	public function update_telefon($id, $data)

	{



		$this->db->where('id',$id);

		$this->db->update("li_boat_cats",$data);

		return ($this->db->affected_rows() == 1 || $this->db->affected_rows() == 2 ) ? true:false;

	}



	public function update_telefon_status($data,$id)

	{

		$this->db->where('id',$id);

		$this->db->update("li_boat_cats",$data);

		return ($this->db->affected_rows() == 1 ) ? true:false;

	}



	public function delete_telefon($id)

	{

		$this->db->where("id='".$id."'");

		$this->db->delete('li_boat_cats');

		return ($this->db->affected_rows() == 1 ) ? true:false;

	}



	/***************************************************************************************

	*																					   *

								TAMİR

	*																					   *

	***************************************************************************************/

	public function tamir_data($id='')

	{

		$this->db->select("*");

		$this->db->from('li_tamir');

		if($id){

			$this->db->where('id',$id);

		}

		return $this->db->get()->result_array();

	}





	public function insert_tamir($data){





		$this->db->insert('li_tamir',$data);

		return ($this->db->affected_rows() != 1 ) ? false:true;

	}



	public function update_tamir($id, $data)

	{



		$this->db->where('id',$id);

		$this->db->update("li_tamir",$data);

		return ($this->db->affected_rows() == 1 || $this->db->affected_rows() == 2 ) ? true:false;

	}



	public function update_tamir_status($data,$id)

	{

		$this->db->where('id',$id);

		$this->db->update("li_tamir",$data);

		return ($this->db->affected_rows() == 1 ) ? true:false;

	}



	public function delete_tamir($id)

	{

		$this->db->where("id='".$id."'");

		$this->db->delete('li_tamir');

		return ($this->db->affected_rows() == 1 ) ? true:false;

	}





	/***************************************************************************************

	*																					   *

								AKSESUAR

	*																					   *

	***************************************************************************************/

	public function aksesuar_data($id='')

	{

		$this->db->select("*");

		$this->db->from('li_aksesuar');

		if($id){

			$this->db->where('id',$id);

		}

		return $this->db->get()->result_array();

	}





	public function insert_aksesuar($data){





		$this->db->insert('li_aksesuar',$data);

		return ($this->db->affected_rows() != 1 ) ? false:true;

	}



	public function update_aksesuar($id, $data)

	{



		$this->db->where('id',$id);

		$this->db->update("li_aksesuar",$data);

		return ($this->db->affected_rows() == 1 || $this->db->affected_rows() == 2 ) ? true:false;

	}



	public function update_aksesuar_status($data,$id)

	{

		$this->db->where('id',$id);

		$this->db->update("li_aksesuar",$data);

		return ($this->db->affected_rows() == 1 ) ? true:false;

	}



	public function delete_aksesuar($id)

	{

		$this->db->where("id='".$id."'");

		$this->db->delete('li_aksesuar');

		return ($this->db->affected_rows() == 1 ) ? true:false;

	}



	/***************************************************************************************

	*																					   *

								İLETİŞİM

	*																					   *

	***************************************************************************************/

	public function iletisim_data($id='')

	{

		$this->db->select("*");

		$this->db->from('li_iletisim');

		if($id){

			$this->db->where('id',$id);

		}

		return $this->db->get()->result_array();

	}





	public function update_iletisim($id, $data)

	{



		$this->db->where('id',$id);

		$this->db->update("li_iletisim",$data);

		return ($this->db->affected_rows() == 1 || $this->db->affected_rows() == 2 ) ? true:false;

	}



	public function update_iletisim_status($data,$id)

	{

		$this->db->where('id',$id);

		$this->db->update("li_iletisim",$data);

		return ($this->db->affected_rows() == 1 ) ? true:false;

	}



	public function delete_iletisim($id)

	{

		$this->db->where("id='".$id."'");

		$this->db->delete('li_iletisim');

		return ($this->db->affected_rows() == 1 ) ? true:false;

	}



	/***************************************************************************************

	*																					   *

								HABERLER

	*																					   *

	***************************************************************************************/

	public function haberler_data()

	{

		$this->db->select("*");

		$this->db->from('li_haberler');

		return $this->db->get()->result_array();

	}


	public function etkinlik_mekan()

	{

		return$this->db->select("title,id")

		->from('li_slider')

		->get()

		->result();

	}

	public function etkinlik_resimler()

	{

		return$this->db->select("*")

		->from('etkinlik_resimler')

		->get()

		->result();

	}

	public function haber_update($id)

	{

		return$this->db->select("*")

		->from('li_haberler')

		->where("id", $id)

		->get()

		->result_array();

	}





	public function insert_haberler($data){


		$this->db->insert('li_haberler',$data);

		return ($this->db->affected_rows() != 1 ) ? false:true;

	}



	public function update_haberler($id, $data)

	{



		$this->db->where('id',$id);

		$this->db->update("li_haberler",$data);

		return ($this->db->affected_rows() == 1 || $this->db->affected_rows() == 2 ) ? true:false;

	}



	public function update_haberler_status($data,$id)

	{

		$this->db->where('id',$id);

		$this->db->update("li_haberler",$data);

		return ($this->db->affected_rows() == 1 ) ? true:false;

	}



	public function delete_haberler($id)

	{

		$this->db->where("id='".$id."'");

		$this->db->delete('li_haberler');

		return ($this->db->affected_rows() == 1 ) ? true:false;

	}



	/****************************************************************************************

											BLOG
	
	****************************************************************************************/


	

	public function blog_data(){

		$this->db->select("*");


		$this->db->from('li_blog');

		return $this->db->get()->result_array();

	}


	public function blog_insert($data){


		$this->db->insert('li_blog', $data);

		return ($this->db->affected_rows() != 1 ) ? false:true;

	}

	public function blog_update($id)

	{

		return$this->db->select("*")

		->from('li_blog')

		->where("id", $id)

		->get()

		->result_array();

	}


	public function update_blog($id, $data)

	{



		$this->db->where('id',$id);

		$this->db->update("li_blog",$data);

		return ($this->db->affected_rows() == 1 || $this->db->affected_rows() == 2 ) ? true:false;

	}



	public function blog_status($data,$id)

	{

		$this->db->where('id',$id);

		$this->db->update("li_blog",$data);

		return ($this->db->affected_rows() == 1 ) ? true:false;

	}



	public function blog_delete($id)

	{

		$this->db->where("id='".$id."'");

		$this->db->delete('li_blog');

		return ($this->db->affected_rows() == 1 ) ? true:false;

	} 



	/***************************************************************************************

	*																					   *

								BİLDİRİMLER

	*																					   *

	***************************************************************************************/

	function yenisiparis(){

		return $this->db->select("*")

						 ->from("li_rezervasyon")

						 ->where("status", 0)

						 ->get()

						 ->result_array();





	}









}