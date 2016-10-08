<?php 

function tarih($tarih){
		 
		$ay = "";
		$parca		= explode("-", $tarih);
		$ay_sayi	= $parca[1];

		if($ay_sayi == "01"){
			$ay = "Ocak";
		}else if($ay_sayi == "02"){
			$ay = "Şubat";
		}else if($ay_sayi == "03"){
			$ay = "Mart";
		}else if($ay_sayi == "04"){
			$ay = "Nisan";
		}else if($ay_sayi == "05"){
			$ay = "Mayıs";
		}else if($ay_sayi == "06"){
			$ay = "Haziran";
		}else if($ay_sayi == "07"){
			$ay = "Temmuz";
		}else if($ay_sayi == "08"){
			$ay = "Ağustos";
		}else if($ay_sayi == "09"){
			$ay = "Eylül";
		}else if($ay_sayi == "10"){
			$ay = "Ekim";
		}else if($ay_sayi == "11"){
			$ay = "Kasım";
		}else if($ay_sayi == "12"){
			$ay = "Aralık";
		}

		$gun		= $parca[2];
		$yil		= $parca[0];
		
		$tarih_format = $gun." ".$ay." ".$yil;
		
		return $tarih_format;
		
}

function tarih2($tarih){
	list($yil,$ay,$gun)	= explode("-", $tarih);
	return $gun."/".$ay."/".$yil;
}




?>