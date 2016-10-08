<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        $this->load->model('pages_model', 'pages');
        $this->load->model('boats_model');
        //$this->load->model('video_model');
    }

    public function index($seo_url=null){


            $this->header();
            $this->load->view('video');
            $this->footer();


    }

    function header(){
        $sosyalmedya  = $this->settings_model->get_definitions();
        $data['sosyalmedya']=array();
        $data['sosyalmedya']=json_decode($sosyalmedya[0]['definitions'], true);
        $this->load->view("header", $data);
    }

    function footer(){
        $sosyalmedya  = $this->settings_model->get_definitions();
        $data['sosyalmedya']=array();
        $data['sosyalmedya']=json_decode($sosyalmedya[0]['definitions'], true);
        $this->load->view("footer", $data);
    }



}
