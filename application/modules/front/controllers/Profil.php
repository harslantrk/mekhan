<?php



defined('BASEPATH') OR exit('No direct script access allowed');



class Profil extends CI_Controller {



    function __construct() {

        parent::__construct();

        $this->load->model('pages_model', 'pages');
        $this->load->model('boats_model');
        $this->load->model('siparis_model');

    }

   	public function uyegiris() {

        if ($_POST) {

            $email = postt("email");

            $password = postt("sifre");

            $url = postt("url");



            $sonuc["uye"] = $this->boats_model->uyegiris($email, $password);



            if ($sonuc["uye"] == null) {

                $this->session->set_flashdata("mesaj-hata", "Şifre veya Email yanlış.");

                Core::header();

                $this->load->view('profil/uyehata');

                Core::modal();

                Core::footer();

                redirect(base_url("uyegiris"));

            } else {

                $this->session->set_userdata($sonuc);

                redirect($url);

            }

        } else {



            Core::header();

            $this->load->view('profil/uyehata');

            Core::modal();

            Core::footer();

        }

    }

    public function uyeol() {

        if (isset($_POST["email"])) {

            $email = postt("email");

            $sonuc = $this->boats_model->emailkontrol($email);



            if ($sonuc == null) {

                $url = postt("url");

                $data["id"] = rand(0, 99999999);

                $data["ad"] = postt("ad");

                $data["email"] = postt("email");

                $data["password"] = postt("sifre");

                $data["tel"] = postt("tel");

                $il = postt("il");

                $il1 = explode(" ", $il);

                $data["il"] = $il1[1];

                $data["ilce"] = postt("ilce");

                $data["adres"] = postt("adres");

                $data["tarih"] = date("Y-m-d");

                $data["status"] = 0;

                $sonuc = $this->boats_model->kaydet("li_members", $data);

                $session = array();

                $session["uye"] = $data;

                $this->session->set_userdata($session);

                $this->uyeonaymail($data["email"], $data["id"], $data["ad"]);

                redirect($url);

            } else {

                $data["iller"] = $this->boats_model->iller();

                Core::header();

                $this->load->view('profil/uyeolhata', $data);

                Core::modal();

                Core::footer();

            }

        } else {

            $data["iller"] = $this->boats_model->iller();

            Core::header();

            $this->load->view('profil/uyeolhata', $data);

            Core::modal();

            Core::footer();

        }

    }

    public function uyeonay(){
        $id = $this->uri->segment(2, 0);
        $data["status"] = 1;
        if (isset($_SESSION["uye"])) {
            $this->session->unset_userdata("uye");
        }
        $this->boats_model->update("li_members", $data, $id);
        redirect(base_url("uyegiris"));
    }

    public function uyecikis() {

    	$this->session->unset_userdata("uye");

        redirect(base_url());

    }

    public function sifremi_unuttum(){
        if ($_POST) {
            $email = postt("email");
            $sonuc = $this->boats_model->emailkontrol($email);

            if ($sonuc == null) {
                $this->session->set_flashdata("mesaj-hata", "Sistemimizde böyle bir mail adresi bulunmamaktadır.");
                header("Refresh:0");
            } else {
                $this->session->set_flashdata("mesaj", "Email adresinize bilgi gönderdik. Lütfen kontrol ediniz.");
                $this->sifrehatirlatmail($email, $sonuc["ad"], $sonuc["password"]);
                //redirect(base_url("uyegiris"));
                header("Refresh:0");
            }
        } else {
            Core::header();
            $this->load->view('profil/sifremiunuttum');
            Core::modal();
            Core::footer();
        }
    }

    public function profil(){
        $id = $this->uri->segment(2, 0);
        $profil = $this->boats_model->profil($id);

        Core::header();
        $this->load->view('profil/profil', $profil);
        Core::modal();
        Core::footer();
    }

    public function profil_duzenle(){
        if (isset($_POST["profilduzenle"])) {
            $id = postt("id");
            $data["ad"] = postt("ad");
            $data["email"] = postt("email");
            $data["tel"] = postt("tel");
            $data["il"] = postt("il");
            $data["ilce"] = postt("ilce");
            $data["adres"] = postt("adres");

            $sonuc = $this->boats_model->update("li_members", $data, $id);

            if ($sonuc == true) {
                $this->session->set_flashdata("guncellemesaj", "Profiliniz başarıyla güncellenmiştir.");
                redirect(base_url("profil-duzenle"));
            } else {
                $this->session->set_flashdata("mesaj-hata", "Profiliniz güncellenirken bir hata oluştu. Lütfen tekrar deneyiniz.");
                redirect(base_url("profil-duzenle"));
            }
        } else {
            $id = $_SESSION["uye"]["id"];
            $data["profil"] = $this->boats_model->profil($id);
            $data["iller"] = $this->boats_model->iller();
            Core::header();
            $this->load->view('profil/profil_duzenle', $data);
            Core::modal();
            Core::footer();
        }
    }

/*
MAIL Gönderimi
*/

    private function uyeonaymail($email, $id, $ad) {
        $mesaj = "";
        $mesaj .= '<b>Akıllı Panda Üyeliği</b><br /><br />';
        $mesaj .= 'Akıllı Panda\'ya üye olduğunuz için teşekkür ederiz.<br /><br />';
        $mesaj .= 'Lütfen aşağıdaki linke tıklayarak üyeliğinizi onaylayınız.<br /><br />';
        $mesaj .= base_url("uyeonay/" . $id);

        require("./assets/mail/mail-class/class.phpmailer.php");
        require("./assets/mail/mail-class/class.smtp.php");

        $SenderName = $this->session->userdata('front_title');
        $SMTPHost = $this->session->userdata("settings")["smtp_host"];
        $SenderMail = $this->session->userdata("settings")["smtp_email"];
        $Password = $this->session->userdata("settings")["smtp_pass"];

        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->setLanguage('tr');
        $mail->Host = $SMTPHost;
        $mail->Username = $SenderMail;
        $mail->Password = $Password;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls'; // ssl or tls
        $mail->Port = 587;
        $mail->FromName = $SenderName;
        $mail->From = $SenderMail;
        $mail->Subject = 'akillipanda.com Üyeliği';
        $mail->Body = $mesaj;
        $mail->IsHTML(true);
        $mail->AddAddress($email, $ad);
        if (!$mail->Send()) {
            return $mail->ErrorInfo;
        }

        return true;
    }

    private function sifrehatirlatmail($email, $ad, $sifre) {
        $mesaj = "";
        $mesaj .= '<b>Akıllı Panda Şifre</b><br /><br />';
        $mesaj .= 'Akıllı Panda\'ya üye olduğunuz için teşekkür ederiz.<br /><br />';
        $mesaj .= '<hr/><br /><br />';
        $mesaj .= 'Şifreniz = ' . $sifre;

        require("./assets/mail/mail-class/class.phpmailer.php");
        require("./assets/mail/mail-class/class.smtp.php");

        $SenderName = $this->session->userdata('front_title');
        $SMTPHost = $this->session->userdata("settings")["smtp_host"];
        $SenderMail = $this->session->userdata("settings")["smtp_email"];
        $Password = $this->session->userdata("settings")["smtp_pass"];
        /*
        echo $SenderName." - ".$SMTPHost." - ".$SenderMail." - ".$Password;
        exit;
        */
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->setLanguage('tr');
        $mail->Host = $SMTPHost;
        $mail->Username = $SenderMail;
        $mail->Password = $Password;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls'; // ssl or tls
        $mail->Port = 587;
        $mail->FromName = $SenderName;
        $mail->From = $SenderMail;
        $mail->Subject = 'akillipanda.com Şifre';
        $mail->Body = $mesaj;
        $mail->IsHTML(true);
        $mail->AddAddress($email, $ad);
        if (!$mail->Send()) {
            return $mail->ErrorInfo;
        }

        return true;
    }
}