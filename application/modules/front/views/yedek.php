<?php
	/****************************************************************************
		*
						TELEFON SAT SİPARİŞ
		*
		****************************************************************************/
		}else if($seo_url == "telefonsatsiparis"){
			$url = $this->uri->segment(2,0);
				
			if($url == "telefonsaturunsiparis"){
				$data["iller"]		= $this->boats_model->iller();
				$id 				= $this->uri->segment(4,0);
				$data["bilgiler"]	= $this->boats_model->aksesuar($id);
				
				if(isset($_POST["il"])){
					$id = postt("il");
					$ilceler = $this->boats_model->ilceler($id);
					echo "<option value=''>-- İlçe --</option>";
					foreach($ilceler as $ilce){
						
						echo "<option>".$ilce["value"]."</option>";
					}
					
				//sipariş sayfası
				}else{

					$id 				= $this->uri->segment(4,0);
					$data["bilgiler"]	= $this->boats_model->telefonfiyat($id);

					$this->header();
					$this->load->view("telefonsat/siparis", $data);
					$this->load->view('footer');
				}
			
			}else if($url == "telefonsatsiparis"){
				if(isset($_POST["siparis"])){
					$data["id"] 		= rand(0,999999);
					$data["ad"] 		= postt("ad");
					$data["email"] 		= postt("email");
					$data["telefon"] 	= postt("telefon");
					$data["il"] 		= postt("il");
					$data["ilce"] 		= postt("ilce");
					$data["adres"] 		= postt("adres");
					$data["fiyat"] 		= postt("fiyat");
					$data["urunadi"] 	= postt("urunadi");
					$data["bilgiler"]	= json_encode($_SESSION["telefon"]);

					$sonuc = $this->boats_model->kaydet("li_siparis", $data);
					
					if($sonuc == true){
						$this->session->set_flashdata("mesaj", "Siparişiniz Başarıyla Kaydedilmiştir. Teşekkür ederiz.");
						redirect(base_url("telefonsatsiparis/telefonsaturunsiparis/".$this->uri->segment(3,0)."/".$this->uri->segment(4,0)));
					}
				}
			}		


