<?php 



class Boats_model extends CI_Model

{

	function __construct()

	{

		parent:: __construct();

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

		return $this->db->get()->result();

	}


	public function galleries($sayfa)

	{

		return $this->db->select("*")

				->from("li_boats")

				->where("title = '$sayfa'")

				->get()

				->row_array();



	}



	public function gallery($id='')

	{

		return $this->db->select("*")

						->from('li_boats')

						->where('status',1)

						->where('id', $id)

						->get()

						->row_array();



	}


	/*************************************************************************

	*

							EMAİL KONTROL

	*

	*************************************************************************/



	public function emailkontrol($email)

	{

		return $this->db->select("*")

						->from('li_members')

						->where('email', $email)

						->get()

						->row_array();



	}



	/*************************************************************************

	*

							MARKALAR

	*

	*************************************************************************/



	public function markalar()

	{

		return $this->db->select("*")

						->from('li_categories')

						->where('status',1)

						->get()

						->result_array();



	}



	/*************************************************************************

	*

							MODELLER

	*

	*************************************************************************/



	public function sec($model){

		return $this->db->select("*")

						->from('li_boats')

						->where('status',1)

						->where("markaseo", $model)

						->get()

						->result_array();



	}



    public function anasayfa(){

		return $this->db->select("*")

						->from('li_boats')

						->where('status',1)

						->get()

						->result_array();



	}

	public function tekneListesi(){
		return $this->db->select("*")
						->from("li_categories")
						->where("status",1)
						->get()
						->result_array();
	}

	public function arama($id){
		return $this->db->select("*")
						->from("li_boats")
						->where("id",$id)
						->get()
						->result_array();
	}

	/*************************************************************************

	*

							BİLGİLER

	*

	*************************************************************************/



	public function bilgiler($id){

		return $this->db->select("*")

						->from('li_boats')

						->where('status',1)

						->where("id", $id)

						->get()

						->row_array();



	}


	function telefonfiyat($id){

		return $this->db->select("*")

						->from('li_boat_cats')

						->where('status',1)

						->where("id", $id)

						->get()

						->row_array();

	}



	public function telefonmodel($model){

		return $this->db->select("*")

						->from('li_boat_cats')

						->where('status',1)

						->where("markaseo", $model)

						->get()

						->result_array();



	}


	function iller(){

		return $this->db->select("*")

						->from('li_county')

						->where("constant", "il")

						->get()

						->result_array();



	}



	function ilceler($id){

		return $this->db->select("li_county.value")

						->from('li_county')

						->where("parent_id", $id)

						->get()

						->result_array();



	}







	/*************************************************************************

	*

							üye

	*

	*************************************************************************/

	function uyegiris($email, $sifre){

		return $this->db->select("*")

						->from('li_members')

						->where("email", $email)

						->where("password", $sifre)

						->get()

						->row_array();

	}


	/*************************************************************************

	*

							PROFİL

	*

	*************************************************************************/

	function profil($id){

		return $this->db->select("*")

						->from('li_members')

						->where('id', $id)

						->get()

						->row_array();

	}


	public function haberler_data($conditions)	
	{
		$this->db->select("
			li_haberler.*,
			li_slider.id as sliderId,
			li_slider.kategori as sliderKategori,
			li_slider.il as sliderIl
			");				
		$this->db->from('li_haberler');		
		$this->db->join("li_slider","li_slider.id = li_haberler.etkinlik_mekan "," inner ");
		if($conditions!="")				
			$this->db->where($conditions);
						
		return $this->db->get()->result();	
	}


	public function tum_haberler($date)	
	{
		return $this->db->select("*")		
		->from('li_haberler')	
		->where("status","1")		
		->like("tarih",$date,"both")			
		->get()->result();	
	}

	public function getSliderCategories()	
	{
		return $this->db->select("kategori")		
		->from('li_slider')	
		->where("status","1")
		->group_by("kategori")		
		->get()
		->result();	
	}
	public function getSliderCountries()	
	{
		return $this->db->select("il")		
		->from('li_slider')	
		->where("status","1")
		->group_by("il")		
		->get()
		->result();	
	}

	public function gelecek_haberler($data)
	{
		$bugun = date("Y-m-d");
		$this->db->select("*");
		$this->db->from('li_haberler');
		$this->db->where('status', '1');
		foreach($data as $value)
		{
			$this->db->or_where('tarih', $value->tarih);
		}
		$this->db->order_by('tarih', 'DESC');
		return $this->db->get()->result();
	}

	public function gelecek_haberler_tarihler()
	{
		$bugun = array('kategori' => 'galeri' , 'tarih>=' => date("Y-m-d") );
		return $this->db->select('tarih, COUNT(tarih) as toplam')
						->from('li_haberler')
						->where($bugun)
						->group_by('tarih')
						->order_by('tarih', 'ASC')
						->get()
						->result();
	}

	public function mekan_ekle($filter,$conditions)	
	{
		return $this->db->select("*")		
					->from('li_slider')		
					->where($conditions)
					->order_by($filter,"asc")		
		 			->get()
		 			->result();	
	}

	public function haberler_galeri()
	{
		$bugun = array('kategori' => 'galeri' , 'tarih' => date("Y-m-d") );
		$this->db->select("*");
		$this->db->from('li_haberler');
		$this->db->where($bugun);
		return $this->db->get()->result();
	}

	public function getSearchedPlaces($keyword)	
	{
		return $this->db->select("*")		
					->from('li_haberler')	
					->where("status","1")		
					->like("baslik",$keyword,"both")			
					->get()
					->result();	
	}
	public function haberler_galeri_tarihler($limit)
    {
        $bugun = array('kategori' => 'galeri' , 'tarih<=' => date("Y-m-d") );
        $this->db->select("tarih, COUNT(tarih) as toplam");
        $this->db->from('li_haberler');
        $this->db->where($bugun);
        $this->db->limit("3",$limit);
        $this->db->group_by('tarih');
        $this->db->order_by('tarih', 'DESC');
        return $this->db->get()->result();
    }

    public function haberler_galeri_eski($tarih)
    {
        $this->db->select("*");
       $this->db->from('li_haberler');
       $this->db->where('kategori', 'galeri');
       foreach($tarih as $value)
       {
           $this->db->or_where('tarih', $value->tarih);
       }
       $this->db->order_by('tarih', 'DESC');
       return $this->db->get()->result();
    }


	public function haberler_video($date="")	
	{
		$conditions = array("kategori" => "video" );

		return $this->db->select("*")		
				->from('li_haberler')	
				->where($conditions)
				->like('tarih', $date, 'both')		
				->get()
				->result();
	}

	public function blog_post()
	{

		$this->db->select("*");

		$this->db->from('li_blog');
		$this->db->where("status","1");

		return $this->db->get()->result();

	}

	public function mekan_resimler($mekan_id)
	{

		$this->db->select("*");

		$this->db->from('mekan_resimler');
		$this->db->where('mekan_id', $mekan_id);
		

		return $this->db->get()->result();

	}


	}