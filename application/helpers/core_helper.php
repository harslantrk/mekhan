<?php



defined('BASEPATH') OR exit('No direct script access allowed');



class Core{

    

    static function header() {

        global $CI;

        $sosyalmedya = $CI->settings_model->get_definitions();

        $data['sosyalmedya'] = array();

        $data['sosyalmedya'] = json_decode($sosyalmedya[0]['definitions'], true);
        $data['categories']=$CI->boats_model->getSliderCategories();
        $data['countries']=$CI->boats_model->getSliderCountries();
        $data["tekneler"] =$CI->boats_model->tekneListesi();

        $CI->load->view("header", $data);

    }



    static function footer() {

        global $CI;

        $sosyalmedya = $CI->settings_model->get_definitions();

        $data['sosyalmedya'] = array();

        $data['sosyalmedya'] = json_decode($sosyalmedya[0]['definitions'], true);

        $CI->load->view("footer", $data);

    }

    static function MonthNameConverter($oldMonth)
    {
        $search  = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
        $replace = array('OCAK', 'ŞUBAT', 'MART', 'NİSAN', 'MAYIS', 'HAZİRAN', 'TEMMUZ', 'AĞUSTOS', 'EYLÜL', 'EKİM', 'KASIM'    , 'ARALIK');
        $newMonth=str_replace($search, $replace, $oldMonth);
        return $newMonth;
    }
    
    static function DayNameConverter($oldDay)
    {
        $searchD  = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
        $replaceD = array( 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi', 'Pazar');
        $gunName=str_replace($searchD, $replaceD, $oldDay);
        return $gunName;
    }

    static function modal() {

        global $CI;

        $data["iller"] = $CI->boats_model->iller();



        if (isset($_POST["email"])) {

            $email = postt("email");

            $sonuc = $CI->boats_model->emailkontrol($email);



            if ($sonuc == null) {

                //echo '<i class="icon-check emailonay"></i>';

            } else {

                //echo '<i class="icon-remove emailremove"></i>';

            }

        } else {

            $CI->load->view("modal", $data);

        }

    }



    static function buyut($metin){

        global $CI;

        $kHarf = array("ç","i","ı","ğ","ö","ş","ü");

        $bHarf = array("Ç","İ","I","Ğ","Ö","Ş","Ü");

        return strtoupper(str_replace($kHarf, $bHarf, $metin));

    }



    static function kucult($metin){

        global $CI;

        $kHarf = array("ç","i","ı","ğ","ö","ş","ü");

        $bHarf = array("Ç","İ","I","Ğ","Ö","Ş","Ü");

        return strtolower(str_replace($bHarf, $kHarf, $metin));

    }

}