<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Odeme extends CI_Controller{

    protected $options;
    protected $request;
    protected $siparisData;

    public function __construct(){
        parent::__construct();
        if (!$this->input->post()) {
        	return show_404();
        }
        $this->load->model('boats_model');
        $this->load->model('siparis_model');

        $this->config->load('payment');
        $mode = $this->config->item('paymentMode');
        $apiConfig = $this->config->item('paymentData');
        
        $this->options = new \Iyzipay\Options();
        $this->options->setApiKey($apiConfig[$mode]['apiId']);
        $this->options->setSecretKey($apiConfig[$mode]['secretKey']);
        $this->options->setBaseUrl($apiConfig[$mode]['url']);
        $this->siparisData = $this->session->userdata('siparisData') ?: null;
    }

    function index(){
    	$odeme		= $this->input->post('odemetipi');
    	$data 		= array(
    		"siparisData"		=> array(
				"uyeid" 		=> postt("uyeid"),
				"siparisno" 	=> postt("siparisno"),
				"aciklama" 		=> postt("aciklama"),					
		        "toplamfiyat" 	=> $this->cart->total(),
		        "teslimatadres" => isset($_POST["teslimatadres"]) 	? postt("teslimatadres") 	: "NOT_PROVIDED",
				"faturaadres" 	=> isset($_POST["faturaadres"]) 	? postt("faturaadres") 		: "NOT_PROVIDED",
		        "odeme" 		=> isset($_POST["odeme"]) 			? postt("odemetipi") 		: "geriodeme",
		        "kartno"		=> isset($_POST["kartno"]) 			? postt("kartno") 			: "NOT_PROVIDED", 
				"kartsahibi" 	=> isset($_POST["kartsahibi"]) 		? postt("kartsahibi") 		: "NOT_PROVIDED",
				"ay" 			=> isset($_POST["ay"]) 				? postt("ay") 				: "NOT_PROVIDED",
				"yil" 			=> isset($_POST["yil"]) 			? postt("yil") 				: "NOT_PROVIDED",
				"cvc" 			=> isset($_POST["cvc"]) 			? postt("cvc") 				: "NOT_PROVIDED",
				)
			);
    	
		$this->session->set_userdata($data);
		$this->siparisData = $data['siparisData'];

        if($odeme == PaymentMethod::HAVALE || $odeme == PaymentMethod::BANKA_HAVALE){
            $this->havale();
        }else if($odeme == PaymentMethod::KREDI_KARTI){
        	$this->odeme();
        }
        else{
            $this->geriodeme();
        }
    }

    private function geriodeme(){
    	$sonuc = null;
    	foreach($this->cart->contents() as $s){
			$k = array (
			"id" 			=> rand(0,999999),
			"uyeid" 		=> $this->siparisData["uyeid"],
			"ozellikler" 	=> json_encode($s),
			"ad" 			=> $this->siparisData["ad"],
			"iban" 			=> $this->siparisData["iban"],
			"banka" 		=> $this->siparisData["banka"],
			"telefon" 		=> $this->siparisData["telefon"],
			"siparisno" 	=> $this->siparisData["siparisno"],
			"odemetipi" 	=> $this->siparisData["odeme"],
			"email" 		=> $this->siparisData["email"],
			"teslimatadres" => $this->siparisData["teslimatadres"],
			"faturaadres" 	=> $this->siparisData["faturaadres"],
			"aciklama" 		=> $this->siparisData["aciklama"],
			"tur" 			=> $s["name"],
			"status" 		=> 0,
			"fiyat" 		=> $s["price"],
			"tarih" 		=> date("Y-m-d")
			);
			$sonuc = $this->boats_model->kaydet("li_siparis", $k);
		}

        if($sonuc == true){
            $this->session->set_flashdata("kart", "Siparişiniz başarıyla kaydedilmiştir. Teşekkür ederiz. <br/> Sipariş Kodunuz: <span style='color: #5CA912;font-size: 24px;'>".$this->siparisData["siparisno"]."</span><br/> <span style='color:red'>Havale türünde ödeme yaparken açıklama olarak sipariş kodunu yazmayı unutmayınız.</span>");
            $this->cart->destroy(); //sepeti boşalt
            $this->session->unset_userdata('sepetData');//sessionu boşalt
            redirect(base_url("sepetim"));
        }else{
            $this->session->set_flashdata("kart-hata", "Siparişiniz kaydedilirken bir hata oluştu. Lütfen tekrar deneyiniz.");
            redirect(base_url("sepetim"));
        }
    	
    }

    private function havale(){//ödeme havaleyle yapılmışsa
		/*
    	echo "<pre>";
    	var_dump($this->cart->contents());
    	echo "</pre>";
		exit();

    	*/
		foreach($this->cart->contents() as $s){
			$k = array (
			"uyeid" 		=> $this->siparisData["uyeid"],
			"boat_id"		=> $s["options"]["boat_id"],
			"tur" 			=> $s["name"],
			"siparisno" 	=> $s["id"],
			"odemetipi" 	=> $this->siparisData["odeme"],
			"binisadres"	=> $s["options"]["binisadresi"],
			"inisadres"		=> $s["options"]["inisadresi"],
			"fiyat" 		=> $s["options"]["fiyat"],
			"status" 		=> 0,
			"aciklama" 		=> $this->siparisData["aciklama"],
			"tarih"			=> $s["options"]["tarih"],
			"kiralama_s"	=> $s["options"]["kiralama_s"],
			"kisi_s"		=> $s["options"]["kisi_s"],
			"teslimatadres" => $this->siparisData["teslimatadres"],
			"faturaadres" 	=> $this->siparisData["faturaadres"],
			"k_tarih" 		=> date("Y-m-d"),
			"odeme_siparis_no"	=> $this->siparisData["siparisno"],
			"ek_secenek"	=> $s["options"]["ek_secenek"]
			);
			$sonuc = $this->siparis_model->kaydet("li_rezervasyon", $k);
		}

        if($sonuc == true){
            $this->session->set_flashdata("kart", "Siparişiniz başarıyla kaydedilmiştir. Teşekkür ederiz. <br/> Sipariş Kodunuz: <span style='color: #5CA912;font-size: 24px;'>".$this->siparisData["siparisno"]."</span><br/> <span style='color:red'>Havale türünde ödeme yaparken açıklama olarak sipariş kodunu yazmayı unutmayınız.</span>");
          	$this->cart->destroy(); //sepeti boşalt
            $this->session->unset_userdata('sepetData');//sessionu boşalt
            redirect(base_url("sepetim"));
        }else{
          	$this->session->unset_userdata('sepetData');//sessionu boşalt
            $this->session->set_flashdata("kart-hata", "Siparişiniz kaydedilirken bir hata oluştu. Lütfen tekrar deneyiniz.");
            redirect(base_url("sepetim"));
        }

    }

    private function odeme(){//ödeme kredi kartıyla yapılmışsa	
    	$uyeid 			= $this->siparisData["uyeid"];
		$ad 			= $this->siparisData["ad"];
		$adsoyad 		= explode(" ", $ad);
		$telefon 		= $this->siparisData["telefon"];
		$siparisno 		= $this->siparisData["siparisno"];
		$email 			= $this->siparisData["email"];
		$teslimatadres 	= $this->siparisData["teslimatadres"];
		$faturaadres 	= $this->siparisData["faturaadres"];
		$toplamfiyat    = $this->siparisData['toplamfiyat'];
		$kartno    = $this->siparisData['kartno'];
		$ay    = $this->siparisData['ay'];
		$yil    = $this->siparisData['yil'];
		$cvc    = $this->siparisData['cvc'];

		$conversationId = generateRandomString(8);
		$request = new \Iyzipay\Request\CreateThreeDSInitializeRequest();
		$request->setLocale(\Iyzipay\Model\Locale::TR);
		$request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
		$request->setPaymentChannel(\Iyzipay\Model\PaymentChannel::WEB);
		$request->setConversationId($conversationId);
		$request->setPrice($toplamfiyat);
		$request->setPaidPrice($toplamfiyat);
		$request->setBasketId($siparisno);
		$request->setCallbackUrl(site_url(['odeme','ThreeDSResponse']));

		$paymentCard = new \Iyzipay\Model\PaymentCard();
		$paymentCard->setCardHolderName($ad);
		$paymentCard->setCardNumber($kartno);
		$paymentCard->setExpireMonth($ay);
		$paymentCard->setExpireYear($yil);
		$paymentCard->setCvc($cvc);
		$paymentCard->setRegisterCard(0);
		$request->setPaymentCard($paymentCard);

		$buyer = new \Iyzipay\Model\Buyer();
		$buyer->setId($uyeid);
		$buyer->setName($adsoyad[0]);
		$buyer->setSurname($adsoyad[1]);
		$buyer->setGsmNumber($telefon);
		$buyer->setEmail($email);
		$buyer->setIdentityNumber(rand(10000000000, 99999999999));
		$buyer->setLastLoginDate(date("Y-m-d H:i:s"));
		$buyer->setRegistrationDate(date("Y-m-d H:i:s"));
		$buyer->setRegistrationAddress($teslimatadres);
		$buyer->setIp($this->input->ip_address());
		$buyer->setCity("Istanbul");
		$buyer->setCountry("Turkey");
		$buyer->setZipCode("34732");
		$request->setBuyer($buyer);

		$shippingAddress = new \Iyzipay\Model\Address();
		$shippingAddress->setContactName($ad);
		$shippingAddress->setCity("Istanbul");
		$shippingAddress->setCountry("Turkey");
		$shippingAddress->setAddress($teslimatadres);
		$shippingAddress->setZipCode("34742");
		$request->setShippingAddress($shippingAddress);

		$billingAddress = new \Iyzipay\Model\Address();
		$billingAddress->setContactName($ad);
		$billingAddress->setCity("Istanbul");
		$billingAddress->setCountry("Turkey");
		$billingAddress->setAddress($faturaadres);
		$billingAddress->setZipCode("34742");
		$request->setbillingAddress($billingAddress);

		$basketItems = array();
		foreach ($this->cart->contents() as $key => $value) {
			$Item = new \Iyzipay\Model\BasketItem();
			$Item->setId($key);
			$Item->setName($value['options']['Ad']);
			$Item->setCategory1($value['name']);
			$Item->setCategory2(" ");
			$Item->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
			$Item->setPrice($value['price']);
			$basketItems[] = $Item;
		}
		$request->setBasketItems($basketItems);

		$threeDSInitialize = \Iyzipay\Model\ThreeDSInitialize::create($request, $this->options);

		if($threeDSInitialize->getStatus() == "failure"){
		    $this->session->set_flashdata("kart-hata", $threeDSInitialize->getErrorMessage());
		    redirect(base_url("sepetim"));
		}else{
		    print_r ($threeDSInitialize);
		}
    }

    public function ThreeDSResponse(){
    	$request = new \Iyzipay\Request\CreateThreeDSAuthRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId($this->input->post('conversationId'));
        $request->setPaymentId($this->input->post('paymentId'));
        $request->setConversationData($this->input->post('conversationData'));

        $threeDSAuth = \Iyzipay\Model\ThreeDSAuth::create($request, $this->options);
        if ($threeDSAuth->getStatus() === "success") { //ödeme başarılıysa
            //sepet bilgilerini ve sessiona kaydettiğimiz bilgileri çekerek siparişi veritabanına kaydetmek için hazırlıyoruz.
            foreach($this->cart->contents() as $s){
				$k = array (
				"id" 			=> rand(0,999999),
				"uyeid" 		=> $this->siparisData["uyeid"],
				"ozellikler" 	=> json_encode($s),
				"ad" 			=> $this->siparisData["ad"],
				"iban" 			=> $this->siparisData["iban"],
				"banka" 		=> $this->siparisData["banka"],
				"telefon" 		=> $this->siparisData["telefon"],
				"siparisno" 	=> $this->siparisData["siparisno"],
				"odemetipi" 	=> $this->siparisData["odeme"],
				"email" 		=> $this->siparisData["email"],
				"teslimatadres" => $this->siparisData["teslimatadres"],
				"faturaadres" 	=> $this->siparisData["faturaadres"],
				"aciklama" 		=> $this->siparisData["aciklama"],
				"tur" 			=> $s["name"],
				"status" 		=> 0,
				"fiyat" 		=> $s["price"],
				"tarih" 		=> date("Y-m-d")
				);
				$sonuc = $this->boats_model->kaydet("li_siparis", $k);
			}


            $this->cart->destroy(); //sepeti boşalt
            $this->session->unset_userdata('sepetData');
            $this->session->set_flashdata("kart", "Ödeme İşleminiz Başarıyla Gerçekleştirilmiştir.<br/> Sipariş numaranız :<span style='color:red'>".$this->session->userdata("siparis")["siparisno"]."</span>");
            redirect(base_url('sepetim')); 
        }else{
        	$this->session->unset_userdata('sepetData');//sessionu boşalt
            $this->session->set_flashdata("kart-hata", $threeDSAuth->getErrorMessage());
            redirect(base_url('sepetim'));
        }
    }
}
