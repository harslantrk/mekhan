<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rezervasyon extends CI_Controller {

    function __construct() {
        parent::__construct();

          $this->load->model('pages_model', 'pages');

          $this->load->model('boats_model');

    }

    public function index()
    {

        $data["rezervasyon"] = $this->boats_model->rezervasyon();

        $this->header();

        $this->load->view('rezervasyon', $data);

        $this->modal();

        $this->footer();

    }

    function header() {

        $sosyalmedya = $this->settings_model->get_definitions();

        $data['sosyalmedya'] = array();

        $data['sosyalmedya'] = json_decode($sosyalmedya[0]['definitions'], true);

        $this->load->view("header", $data);

    }



    function footer() {

        $sosyalmedya = $this->settings_model->get_definitions();

        $data['sosyalmedya'] = array();

        $data['sosyalmedya'] = json_decode($sosyalmedya[0]['definitions'], true);

        $this->load->view("footer", $data);

    }



    function modal() {

        $data["iller"] = $this->boats_model->iller();



        if (isset($_POST["email"])) {

            $email = postt("email");

            $sonuc = $this->boats_model->emailkontrol($email);



            if ($sonuc == null) {

                //echo '<i class="icon-check emailonay"></i>';

            } else {

                //echo '<i class="icon-remove emailremove"></i>';

            }

        } else {

            $this->load->view("modal", $data);

        }



    }

      public function Add()
        {

              $data = array(
                    "id" 			=> rand(0,999999),
                    'kiralama_s' => $this->input->post('kiralama_s'),
                    'kisi_s' => $this->input->post('kisi_s'),
                    'musait_d' => $this->input->post('musait_d'),
                    'toplam' => $this->input->post('toplam'),
                    'binis_a' => $this->input->post('binis_a'),
                    'inis_a' => $this->input->post('inis_a'),
                    'boat_id' => $this->input->post('boat_id'),
                    'uye_id' => $this->input->post('uye_id'),
                    'uye_ad' => $this->input->post('uye_ad'),
                    'uye_email' => $this->input->post('uye_email'),
                    'uye_tel' => $this->input->post('uye_tel')

              );

             $result = $this->boats_model->insert($data);

            }
}