<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

    public $user = "";
    function __construct() {

        parent::__construct();

        $this->load->model('pages_model', 'pages');

        $this->load->model('boats_model');
        $this->load->model('settings_model');

        $this->load->model('siparis_model');

        $this->load->model('slider_model');
        $this->load->model('login_model');

        // Load facebook library and pass associative array which contains appId and secret key
        $this->load->library('Facebook', array('appId' => '203427750078427', 'secret' => '647628b1b757d588c006ca06162cc8dc'));

        // Get user's login information
        $this->user = $this->facebook->getUser();
    }




    public function index($filter="",$keyword="")
    {

        if ($this->user) {
            $data['user_profile'] = $this->facebook->api('/me/');

        // Get logout url of facebook
            //$data['logout_url'] = $this->facebook->getLogoutUrl(array('next' => base_url() . '/oauth_login/logout'));

        // Send data to profile page
            $social_login = $this->login_model->facebook_login_up($this->user);
            //$this->load->view('profile', $data);
        } else {

        // Store users facebook login url
            $login_url = $this->facebook->getLoginUrl();
            $this->session->set_userdata('login_url', $login_url);

        }
        /*************************************/
        if($this->input->post()) {
            $login = $this->login_model->login_up();
            /*echo "<pre>";
            print_r($login);
            die();*/
            if ($login) {
                $this->session->set_flashdata('msg0',"Başarılı");
            }
        }
        else
        {
            $this->session->set_flashdata('msg0',"Kullanıcı adı veya Şifre Hatalı");
        }

        $this->load->model('boats_model');
        $data['baslik'] = $this->settings_model->event();
        $data['img'] = $this->settings_model->event();
        $data['link'] = $this->settings_model->event();
        $data['icerik'] = $this->settings_model->event();
        $data['kategori'] = $this->settings_model->event();
        $data['fotograf'] = $this->settings_model->sidebar_reklam();

        if ($filter=="cat")
        {

            $conditions = array('li_slider.kategori' =>"Bar");
        }
        else if ($filter=="il")
        {
            if($keyword=="%C4%B0zmir")
                $keyword="İzmir";
            if($keyword=="%C4%B0stanbul")
                $keyword="İstanbul";
            $conditions = array('li_slider.il' =>$keyword);
        }
        else
            $conditions="";
        $data['etkinlikler']=$this->boats_model->haberler_data($conditions);
        $data['link'] = $this->settings_model->sidebar_reklam();
        $data['etkinlikler'] = $this->settings_model->event();
        /*echo "<pre>";
        print_r($data['etkinlikler']);
        die();*/
        $data['reklam_data'] = $this->boats_model->gallery_data();
        Core::header();
        $this->load->view('homepage', $data);
        /*Core::modal();
        Core::footer();*/
    }

    public function userRegister(){
        $login=$this->login_model->register();
        if($login)
        {
            redirect('/');
        }
    }

    public function logout(){
        //$this->log_model->insert_log('Çıkış Yapıldı ','login');
        $this->session->sess_destroy();
        delete_cookie("id");
        delete_cookie("ckf_role");
        redirect('/');
    }


    public function create_reklam() {

    }

    public function etkinlikler($d="",$m="",$y="")
    {
       if($d=="")
            $date=date("y-m-d");
        else
        {
            if($m<10)
                $m='0'.$m;
            $date=$y.'-'.$m.'-'.$d;
        }
        /*$data['baslik'] = $this->settings_model->tum_haberler();
        $data['img'] = $this->settings_model->tum_haberler();
        $data['icerik'] = $this->settings_model->tum_haberler();
        $data['kategori'] = $this->settings_model->tum_haberler();
        $data['reklam_data'] = $this->boats_model->tum_haberler();*/

            $data['currentDate']=$date;
            $data['etkinlikler']=$this->boats_model->tum_haberler($date);
            /*echo "<pre>";
            print_r($data['etkinlikler']);
            die();*/

        Core::header();
        $this->load->view('etkinlikler', $data);
    }



    public function mekanlar($filter="")
    {

        if ($this->input->post())
        {
            $conditions = array
            (
                'fiyat >=' =>$this->input->post("price-min"),
                'fiyat <=' =>$this->input->post("price-max"),
                'kategori' =>$this->input->post("category"),
                'status' =>1,
            );
        }
        else
            $conditions = array('status' => 1);
        $data['img'] = $this->boats_model->mekan_ekle($filter,$conditions);
        $data['categories'] = $this->boats_model->getSliderCategories();

        Core::header();
        $this->load->view('mekanlar', $data);
    }


    public function blog() {
        $data['link'] = $this->settings_model->sidebar_reklam();
        $data['etkinlikler']=$this->boats_model->blog_post();

        Core::header();

        $this->load->view('blog', $data);

    }

    public function etkinlik($id, $tittle="") {
        
        Core::header();
        $this->db->select("*");
        $this->db->from("li_haberler");
        $this->db->where("id", $id);
        $haber_bilgisi = $this->db->get();
        $haber_bilgisi = $haber_bilgisi->result_array();
        $basla = date("Y-m-d");
        $bitis = strtotime("+3 day", strtotime($basla));
        $bitis = date("Y-m-d", $bitis);
        
        $data['comming_event'] = $this->slider_model->comming_data($basla, $bitis);
        $data['fotograf'] = $this->settings_model->sidebar_reklam();
        $data['link'] = $this->settings_model->sidebar_reklam();
        $data["haber_bilgisi"] = $haber_bilgisi;

        /*echo "<pre>";
            print_r($data["haber_bilgisi"]);
            die();*/
        
        $this->load->view('event_page', $data);

    }

    public function etkinlikLike($id, $likeCount) {
        
        Core::header();
        $this->db->select("*");
        $this->db->from("li_haberler");
        $this->db->where("id", $id);
        $haber_bilgisi = $this->db->get();
        $haber_bilgisi = $haber_bilgisi->result_array();
        $basla = date("Y-m-d");
        $bitis = strtotime("+3 day", strtotime($basla));
        $bitis = date("Y-m-d", $bitis);
        
        $data['comming_event'] = $this->slider_model->comming_data($basla, $bitis);
        $data['fotograf'] = $this->settings_model->sidebar_reklam();
        $data['link'] = $this->settings_model->sidebar_reklam();
        $data["haber_bilgisi"] = $haber_bilgisi;

        /*echo "<pre>";
            print_r($data["haber_bilgisi"]);
            die();*/
        
        $this->load->view('event_page', $data);

    }
    public function etkinlikMekan($id, $tittle="") {

        Core::header();
        $this->db->select("*");
        $this->db->from("li_slider");
        $this->db->where("id", $id);
        $haber_bilgisi = $this->db->get();
        $haber_bilgisi = $haber_bilgisi->result_array();
        $basla = date("Y-m-d");
        $bitis = strtotime("+3 day", strtotime($basla));
        $bitis = date("Y-m-d", $bitis);
        
        $data['comming_event'] = $this->slider_model->comming_data($basla, $bitis);

        $data["haber_bilgisi"] = $haber_bilgisi;

        $this->load->view('mekan_page', $data);
    }

    public function etkinlikBlog($id, $tittle="") {

        Core::header();
        $this->db->select("*");
        $this->db->from("li_blog");
        $this->db->where("id", $id);
        $haber_bilgisi = $this->db->get();
        $haber_bilgisi = $haber_bilgisi->result_array();
        $data['link'] = $this->settings_model->sidebar_reklam();
        $data['fotograf'] = $this->settings_model->sidebar_reklam();
        $basla = date("Y-m-d");
        $bitis = strtotime("+3 day", strtotime($basla));
        $bitis = date("Y-m-d", $bitis);
        $data['comming_event'] = $this->slider_model->comming_data($basla, $bitis);
        $data["haber_bilgisi"] = $haber_bilgisi;

        $this->load->view('blog_page', $data);

    }




    /*public function mekan($æ, $tittle="") {
        Core::header();
        $this->db->select("*");
        $this->db->from("li_slider");
        $this->db->where("link", $tittle);
        $haber_bilgisi = $this->db->get();
        $haber_bilgisi = $haber_bilgisi->result_array();

        $data["haber_bilgisi"] = $haber_bilgisi;

        $this->load->view('mekan_page', $data);

    }*/



    public function galeri() {
        $data['baslik'] = $this->settings_model->galeri_slider();
        $data['img'] = $this->settings_model->galeri_slider();
        $data['icerik'] = $this->settings_model->galeri_slider();
        $data['kategori'] = $this->settings_model->galeri_slider();
        
        /*$data['post_etkinlikler']=$this->boats_model->haberler_galeri();*/
        $tarihler = $this->boats_model->haberler_galeri_tarihler($limit="");
        $data['tarihler']=$tarihler;        
        //$data['post_etkinlikler']=$this->boats_model->haberler_galeri_eski($tarihler);
        $data['reklam_data'] = $this->boats_model->gallery_data();
        $data['link'] = $this->settings_model->sidebar_reklam();
      
        $tarih_format = tarih(date("d-m-Y"));
        list($data['yil'],$data['ay'],$data['gun']) = explode(" ", $tarih_format);
        $data['tarihf'] = $tarih_format;

        Core::header();

        $this->load->view('galeri', $data);

    }

    public function infiniteGallery() {
        if($this->input->post('group_no'))
        {
            //die("calis");
            $group_no = $this->input->post('group_no');
            $limit=$group_no*3;      
        }
        else
        {
            $group_no=0;
            $limit=0;
        }
        
        /*$data['post_etkinlikler']=$this->boats_model->haberler_galeri();*/
        $tarihler = $this->boats_model->haberler_galeri_tarihler($limit);
        /*$selectedTarih=$tarihler[$group_no]->tarih;*/  
        $data['tarihler']=$tarihler;      
        $data['post_etkinlikler']=$this->boats_model->haberler_galeri_eski($tarihler);
        
        $this->load->view('getSelectedData', $data);

    }

    public function iletisim() {

        $data['baslik'] = $this->settings_model->event();
        $data['img'] = $this->settings_model->event();
        $data['icerik'] = $this->settings_model->event();
        $data['etkinlikler']=$this->boats_model->haberler_data($conditions="");

        Core::header();

        $this->load->view('iletisim', $data);

    }
    public function searchAllPlace()
    {
        $keyword=$this->input->post("keyword");
        $data['searchedPlaces']=$this->boats_model->getSearchedPlaces($keyword);
        Core::header();
        $this->load->view('search', $data);
    }

    public function searchPlace()
    {
        $keyword=$this->input->post("keyword");
        echo $keyword;
        $data['searchedPlaces']=$this->boats_model->getSearchedPlaces($keyword);
        /*echo "<pre>";
        print_r($data['searchedPlaces']);
        die("asd");*/
        $this->load->view('littleSearch', $data);
    }

     public function sendMessage()
    {
        if($this->input->post())
        {
            $data["ad"]     = $this->input->post("ad");
            $data["email"]  = $this->input->post("email");
            $data["tel"]    = $this->input->post("tel");
            $data["mesaj"]  = $this->input->post("mesaj");
            $data["tarih"]  = date("Y-m-d");
            $sendMail= mail("mriza1815@gmail.com",$data["email"],$data["mesaj"]);
            if ($sendMail)
            {
                redirect(base_url(""));
            }
        }
        redirect(base_url(""));
    }

    public function video($year="", $month="")
    {

        /*$data['baslik'] = $this->settings_model->video_page();
        $data['img'] = $this->settings_model->video_page();
        $data['icerik'] = $this->settings_model->video_page();
        $data['kategori'] = $this->settings_model->video_page();
        $data['reklam_data'] = $this->boats_model->gallery_data();*/
        if($month !="" && $year !="")
        {
            $date=$year.'-'.$month;
            $data['etkinlikler']=$this->boats_model->haberler_video($date);
            $data['month'] =$month;

        }
        else
            $data['etkinlikler']=$this->boats_model->haberler_video();

        Core::header();

        $this->load->view('video', $data);
    }


     public function event_page() {
        $this->load->model('boats_model');
        $data['baslik'] = $this->settings_model->event();
        $data['img'] = $this->settings_model->event();
        $data['icerik'] = $this->settings_model->event();
        Core::header();
        $this->load->view('event_page', $data);

    }

    public function mekan_page() {
        $data['title'] = $this->boats_model->mekan_ekle();
        $data['img'] = $this->boats_model->mekan_ekle();
        $data['kategori'] = $this->boats_model->mekan_ekle();
        $data['il'] = $this->boats_model->mekan_ekle();
        $data['ilce'] = $this->boats_model->mekan_ekle();
        $data['extra'] = $this->boats_model->mekan_ekle();
        $data['fiyat'] = $this->boats_model->mekan_ekle();
        $data['content'] = $this->boats_model->mekan_ekle();
        $data['telefon'] = $this->boats_model->mekan_ekle();
        $data['map'] = $this->boats_model->mekan_ekle();
        Core::header();
        $this->load->view('mekan_page', $data);

    }



    public function page($url){

        $data = $this->pages->get_data($url);

        if ($data == !NULL) {

            Core::header();

            $this->load->view("sayfalar", $data);

            Core::modal();

            Core::footer();

        }else {

            show_404();

        }

    }



    public function tekne_kiralama() {

        $url = $this->uri->segment(2, 0);



        if ($url == "filomuz") {

            $data["markalar"] = $this->boats_model->markalar();

            Core::header();

            $this->load->view('tekne-kiralama/filomuz', $data);

            Core::modal();

            Core::footer();

        } else if ($url == "sec") {

            $url2 = $this->uri->segment(3, 0);

            $data["modeller"] = $this->boats_model->sec($url2);



            Core::header();

            $this->load->view('tekne-kiralama/sec', $data);

            Core::modal();

            Core::footer();

        } else if ($url == "bilgiler") {

            $id = $this->uri->segment(4, 0);



            $data["bilgiler"] = $this->boats_model->bilgiler($id);

            $data["renk"]     = json_decode($data["bilgiler"]["renk"], true);

            $data["sfiyat"]   = json_decode($data["bilgiler"]["sfiyat"], true);

            $data["yorumlar"] = $this->siparis_model->yorumlar($id);

            $toplam = $sayac = 0;

            foreach ($data["yorumlar"] as $key => $value) {

                $sayac++;

                $toplam = $toplam + $value["oy"];

            }

            if($toplam == 0)

                $data["oyOrtalamasi"] = "Oylama Bulunmuyor";

            else

                $data["oyOrtalamasi"] = $toplam / $sayac;

            Core::header();

            $this->load->view('tekne-kiralama/bilgiler', $data);

            Core::modal();

            Core::footer();

        }

    }



    public function rezervasyon(){

        $url = segment(2, 0);

        $id = $_SESSION["uye"]["id"];

        if($url == $id){

            $data["rezervasyon"] = $this->siparis_model->siparislerim($id);

            Core::header();

            $this->load->view('profil/rezervasyon', $data);

            Core::modal();

            Core::footer();

        } else {

            show_404();

        }

    }



    public function ilceler(){

        if (isset($_POST["il"])) {

            $id = postt("il");

            $ilceler = $this->boats_model->ilceler($id);

            echo "<option value=''>-- İlçe --</option>";

            foreach ($ilceler as $ilce) {

                echo "<option>" . $ilce["value"] . "</option>";

            }

        }

    }

}



//class

