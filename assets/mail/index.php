<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SMTP Mail Deneme</title>
</head>
<body>
<?php
	require("mail-class/class.phpmailer.php");
	require("mail-class/class.smtp.php");
	foreach ($_REQUEST as $key => $value) {$$key=$value;}
	if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])&&$_SERVER['HTTP_X_FORWARTDED_FOR']!=''){$ip_address=$_SERVER['HTTP_X_FORWARDED_FOR'];}else{$ip_address=$_SERVER['REMOTE_ADDR'];}

	$SenderName	="SMTP Deneme";
	$SenderMail	="limitlessisa@gmail.com";
	$Password	="";

	$Rmail		= "isa_limitless@hotmail.com";
	$Msubject	= "Deneme";
	$MailMessage= ($Msubject. '<br/><br/><style>.label{width:150px; font-weight:100; color:#333;}</style>
		<table style="font-family:Tahoma, Geneva, sans-serif;  width:605px; border:0;">
		<tr><td class="label">Gönderen</td><td width="5">:</td><td width="500">'.$SenderName.'</td></tr>
		<tr><td class="label">içerik</td><td width="5">:</td><td width="500">'.'</td></tr>
		</table><br/><p>'.$_SERVER['SERVER_NAME'].'</p><p>IP: '.$ip_address.'</p><p>Browser: '.$_SERVER['HTTP_USER_AGENT'].'</p>');
	
	$mail=new PHPMailer();
	$mail->IsSMTP();
	$mail->IsHTML(true);
	$mail->setLanguage('tr');
	$mail->Host 	 = "tls://smtp.gmail.com";
	$mail->SMTPAuth  = true;
	$mail->SMTPSecure= 'tls'; // ssl or tls
	$mail->Port 	 = 587;
	$mail->SMTPDebug  = 2;   
	$mail->Username  = $SenderMail;
	$mail->Password  = $Password;
	$mail->FromName  = $SenderName;
	$mail->From 	 = $SenderMail;
	$mail->Subject 	 = $Msubject;					
	$mail->Body    	 = $MailMessage;
	$mail->AddAddress($Rmail);
	//$mail->addBCC("isa_limitless@hotmail.com", "Yönetim");
	if($mail->Send()){echo '<p style="color:green; font-size:14px; font-weight:bold;">Mesaj '.$Rmail.' Adresine gönderildi.<br/><br/></p>';}
	else{echo '<p style="color:red; font-size:14px; font-weight:bold;">Hata! Mesaj Gönderilemedi '.$Rmail.' <br/>'.$mail->ErrorInfo;}
	$mail->ClearAddresses();
	$mail->ClearAttachments();
?>
</body>
</html>
