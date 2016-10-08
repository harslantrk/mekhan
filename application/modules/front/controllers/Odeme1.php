<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Odeme extends CI_Controller {
	protected $options;
	protected $request;
	
	public function __construct(){
		if (empty($_POST['siparis'])) {
			show_error('Yetkisiz erişim',403);
		}else{
			parent::__construct();
			$this->load->model('boats_model');
			$this->config->load('payment');
			$mode = $this->config->item('paymentMode');
			$apiConfig = $this->config->item('paymentData');
			$this->options = new \Iyzipay\Options();
			$this->options->setApiKey($apiConfig[$mode]['apiId']);
			$this->options->setSecretKey($apiConfig[$mode]['secretKey']);
			$this->options->setBaseUrl($apiConfig[$mode]['url']);
			$this->request = new \Iyzipay\Request\CreatePaymentRequest();
			$this->request->setLocale(\Iyzipay\Model\Locale::TR);
			$this->request->setPaymentChannel(\Iyzipay\Model\PaymentChannel::WEB);
			$this->request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);	
		}
	}
	public function index(){
			$ad = postt("ad");
			$uyeid = postt("uyeid");
			$siparisno = postt("siparisno");
			$telefon = postt("telefon");
			$email = postt("email");
			$aciklama = postt("aciklama");
			$adsoyad = explode(" ", $ad);
			$toplamfiyat = $this->cart->format_number($this->cart->total());

			$iban = isset($_POST["iban"]) ? postt("iban") : "NOT_PROVIDED";
			$banka = isset($_POST["banka"]) ? postt("banka") : "NOT_PROVIDED";
			$odemetipi = isset($_POST["odemetipi"]) ? postt("odemetipi") : "NOT_PROVIDED";
			$teslimatadres = isset($_POST["teslimatadres"]) ? postt("teslimatadres") : "NOT_PROVIDED";
			$faturaadres = isset($_POST["faturaadres"]) ? postt("faturaadres") : "NOT_PROVIDED";
			$postData = $this->input->post();
			
			if(!empty($_POST["kartsahibi"]) && !empty($_POST["kartno"]) && !empty($_POST["ay"]) && !empty($_POST["yil"]) && !empty($_POST["cvc"])){
			$kartno = postt("kartno");
			$kartsahibi = postt("kartsahibi");
			$ay = postt("ay");
			$yil = postt("yil");
			$cvc = postt("cvc");

			$request = new \Iyzipay\Request\CreatePaymentRequest();
			$request->setLocale(\Iyzipay\Model\Locale::TR);
			$request->setConversationId(rand(100000000, 999999999));
			$request->setPrice($toplamfiyat);
			$request->setPaidPrice($toplamfiyat);
			$request->setInstallment(1);
			$request->setPaymentChannel(\Iyzipay\Model\PaymentChannel::WEB);
			$request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);

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
			
			$paymentAuth = \Iyzipay\Model\PaymentAuth::create($request, $this->options);
			if ($paymentAuth->getStatus() != "success") {
				$this->session->set_flashdata("kart-hata", $paymentAuth->getErrorMessage());
				return redirect(base_url("sepetim"));
			}
			
		}
		//$sonuc = null;
		foreach($this->cart->contents() as $s){
			$k = array (
			"id" 			=> rand(0,999999),
			"uyeid" 		=> $uyeid,
			"ozellikler" 	=> json_encode($s),
			"ad" 			=> $ad,
			"iban" 			=> $iban,
			"banka" 		=> $banka,
			"telefon" 		=> $telefon,
			"siparisno" 	=> $siparisno,
			"odemetipi" 	=> $odemetipi,
			"email" 		=> $email,
			"teslimatadres" => $teslimatadres,
			"faturaadres" 	=> $faturaadres,
			"aciklama" 		=> $aciklama,
			"tur" 			=> $s["name"],
			"status" 		=> 0,
			"fiyat" 		=> $s["price"],
			"tarih" 		=> date("Y-m-d")
			);
			$sonuc = $this->boats_model->kaydet("li_siparis", $k);
		}
		if($sonuc == true){
			$this->session->set_flashdata("mesaj", "Siparişiniz başarıyla kaydedilmiştir. Teşekkür ederiz. <br/> Sipariş Kodunuz: <span style='color: #5CA912;font-size: 24px;'>$siparisno</span><br/> 
				<span style='color:red'>Havale türünde ödeme yaparken açıklama olarak sipariş kodunu yazmayı unutmayınız.</span>");
			$this->cart->destroy();
		}else{
			$this->session->set_flashdata("mesaj-hata", "Siparişiniz kaydedilirken bir hata oluştu. Lütfen tekrar deneyiniz.");
		}
		return redirect(base_url("sepetim"));
	}
}
/* End of file Odeme.php */
/* Location: ./application/modules/front/controllers/Odeme.php */