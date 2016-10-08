<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Arama extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('boats_model');
    }

    public function index() {
        //var_dump($_POST);
        //exit;
        if (isset($_POST)) {
            $data["botlar"] = $this->boats_model->anasayfa();
            $content["arama"] = array();
            foreach ($data["botlar"] as $key => $value) {
            
                //exit;
                if(postt("yatMetni") != ""){
                    if(strstr(Core::buyut($value["title"]), Core::buyut(postt("yatMetni")))){
                        $arama_data = $this->boats_model->arama($value["id"]);
                        in_array($arama_data, $content["arama"]) ? "" : array_push($content["arama"],$arama_data);
                    }
                    if(strstr(Core::buyut($value["marka"]), Core::buyut(postt("yatMetni")))){
                        $arama_data = $this->boats_model->arama($value["id"]);
                        in_array($arama_data, $content["arama"]) ? "" : array_push($content["arama"],$arama_data);
                    }
                }
                /*
                if(postt("yatDurumu") == "hepsi"){
                    $arama_data = $this->boats_model->arama($value["id"]);
                    in_array($arama_data, $content["arama"]) ? "" : array_push($content["arama"],$arama_data);
                } elseif(postt("yatDurumu") == "yeni"){
                    $arama_data = $this->boats_model->arama($value["id"]);
                    in_array($arama_data, $content["arama"]) ? "" : array_push($content["arama"],$arama_data);
                } elseif(postt("yatDurumu") == "ikinci_el"){
                    $arama_data = $this->boats_model->arama($value["id"]);
                    in_array($arama_data, $content["arama"]) ? "" : array_push($content["arama"],$arama_data);
                } elseif(postt("yatTipi") == "hepsi"){
                    $arama_data = $this->boats_model->arama($value["id"]);
                    in_array($arama_data, $content["arama"]) ? "" : array_push($content["arama"],$arama_data);
                } elseif(postt("yatTipi") == "motorlu"){
                    $arama_data = $this->boats_model->arama($value["id"]);
                    in_array($arama_data, $content["arama"]) ? "" : array_push($content["arama"],$arama_data);
                } elseif(postt("yatTipi") == "yelkenli"){
                    $arama_data = $this->boats_model->arama($value["id"]);
                    in_array($arama_data, $content["arama"]) ? "" : array_push($content["arama"],$arama_data);
                }
                */
                if(postt("fromLength") != "" && postt("toLength") != ""){
                    $data_json = json_decode($value["ozellik"]);
                    foreach ($data_json as $k => $v) {
                        if($k == "Uzunluk")
                            if((intval(str_replace("mt", "", $v)) >= postt("fromLength")) && (intval(str_replace("mt", "", $v)) <= postt("toLength"))){
                                $arama_data = $this->boats_model->arama($value["id"]);
                                in_array($arama_data, $content["arama"]) ? "" : array_push($content["arama"],$arama_data);
                            }
                    }
                }

                if(postt("fromPrice") != "" && postt("toPrice") != ""){
                    if(($value["kisi_basi"] >= postt("fromPrice")) && ($value["kisi_basi"] <= postt("toPrice"))){
                        $arama_data = $this->boats_model->arama($value["id"]);
                        in_array($arama_data, $content["arama"]) ? "" : array_push($content["arama"],$arama_data);
                    }
                }
            }
            /*echo "<br><br>";
            var_dump($content["arama"]);
            exit;*/
            Core::header();
            $this->load->view('arama', $content);
            Core::modal();
            Core::footer();

        } else {
            show_404();
        }
    }
}

//class
