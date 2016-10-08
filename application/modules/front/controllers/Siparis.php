<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Siparis extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('boats_model');
        $this->load->model('siparis_model');
    }

    public function siparis(){
        $url = $this->uri->segment(2, 0);

        if ($url == "tekne-kiralama") {
            $this->tekne_kiralama();
            redirect(base_url("sepetim"));
        } else if ($url == "sadecesatsiparis") {
            $this->siparissadecesat();
            redirect(base_url("sepetim"));
        } else if ($url == "degisimsiparis") {
            $this->siparisdegisim();
            redirect(base_url("sepetim"));
        }
    }

    public function siparissil(){
        $id = $this->uri->segment(2, 0);
        $data = array(
            'rowid' => $id,
            'qty' => 0
        );
        $this->cart->update($data);
        redirect(base_url("sepetim"));
    }

    public function sepetim() {
        $data["iller"] = $this->boats_model->iller();
        Core::header();
        $this->load->view('sepetim', $data);
        Core::modal();
        Core::footer();
    }

    public function rez_tekne_kiralama() {
        if($_POST){
            $bot_bilgileri = $this->siparis_model->getir("li_boats", "id", postt("boat_id"));
            $uye_bilgileri = $this->siparis_model->getir("li_members", "id", postt("uye_id"));
            $rand_id = 'pri_'.rand(0,9999999);
            /*echo "<pre>";
            var_dump($_POST);
            echo "</pre>";
            exit;*/
            (empty($_POST["servis"]) ? $ek_secenek = "" : $ek_secenek = json_encode($_POST["servis"]));
            $data = array(
                'id' => $rand_id,
                'qty' => postt("kisi_s"),
                'price' => postt("fiyati"),
                'name' => $bot_bilgileri[0]['title'],
                'options' => array(
                    'uye_id' => postt("uye_id"),
                    'boat_id' => postt("boat_id"),
                    'tur' => "Yat Turu",
                    'binisadresi' => postt("binis_a"),
                    'inisadresi' => postt("inis_a"),
                    'fiyat' => postt("toplam"),
                    'status' => '1',
                    'aciklama' => postt("notunuz"),
                    'tarih' => postt("musait_d"),
                    'kiralama_s' => postt("kiralama_s"),
                    'kisi_s' => postt("kisi_s"),
                    'ek_secenek' => $ek_secenek
                )
            );

            $this->cart->insert($data);
            redirect(base_url("sepetim"));
        } else {
            show_404();
        }
    }

    public function tekne_yorum(){
        if($_POST){
            /*echo "<pre>";
            var_dump($_POST);
            echo "</pre>";
            exit();*/
            $data = array(
                "boat_id" => postt("boat_id"),
                "yorum"   => postt("yorum"),
                "oy"      => postt("rating")
            );
            $this->siparis_model->yorumKaydet($data);
            $dataLink["bilgiler"] = $this->boats_model->bilgiler(postt("boat_id"));            
            $dataLink["yorumlar"] = $this->siparis_model->yorumlar(postt("boat_id"));
            $toplam = $sayac = 0;
            foreach ($dataLink["yorumlar"] as $key => $value) {
                $sayac++;
                $toplam = $toplam + $value["oy"];
            }
            if($toplam == 0)
                $dataLink["oyOrtalamasi"] = "Oylama Bulunmuyor";
            else
                $dataLink["oyOrtalamasi"] = $toplam / $sayac;
            Core::header();
            $this->load->view('tekne-kiralama/bilgiler', $dataLink);
            Core::modal();
            Core::footer();
        } else {
            show_404();
        }
    }
}

//class
