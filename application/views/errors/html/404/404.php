<!DOCTYPE html>
<html lang="tr">


<!-- Mirrored from squirrellabs.net/theme/tetris404/error404/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Aug 2015 09:20:58 GMT -->
<head>
	<meta charset="UTF-8">
	<title>404</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="author" content="SquirrelLabs"/>
	<meta name="keywords" content="SquirrelLabs"/>
	<meta name="description" content="SquirrelLabs"/>
	
	<!-- Favicon and touch icons -->
	<link rel="shortcut icon" href="404/assets/ico/favicon.html">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon-57-precomposed.png">
	
	<!--stylesheets-->	
	<link rel="stylesheet" href="assets/front/404/css/popup.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="assets/front/404/css/style.css" media="screen" type="text/css" />
</head>

<body>
	<div class="global-border"></div>
    <div class="left">
		<div class="content">
			<div class="logo">
				<a href="/"><?=$_SERVER['SERVER_NAME']?></a>
			</div>
				<h1>404</h1>
				<h2>Böyle bir sayfa yok veya bulunamadı!</h2>
				<h3>Aslında böyle bir sayfa yok ama siz gelmişken bi tetris oynayın :)</h3>
				<a class="btn-orange" href="/">Ana Sayfa</a>
			<!--socials-->
			<div class="social">
			</div><!--end socials-->
		</div>
    </div>
    <div class="right">
	    <div class="content">
			<div id="main">
			  <div id="left" class="border">
				<table id="container"></table>
			  </div>

			  <div id="right">
				<div id="info">
				  <div id="score">Skor: 0</div>
				  <div id="level">Level: 0</div>
				  <div id="lines">Çizgiler: 0</div>
				</div>

				<div class="border-mini">
				  <table id="preview"></table>
				</div>

				<div id="controls">
				  <a href="javascript:;" id="play">Başla</a>

				  <div id="keysinfo">
					<strong>Kontroller:</strong>
					<p>
					  Oklar = [ Sağ, Sol, Aşağı ]<br>
					  Boşluk = [ Döndürme ]<br>
					  ENTER = [ Durdur, Başlat ]
					</p>
					<p class="small">İpucu: Tuşa basılı tutun ve <br>ekstra puan kazanın.</p>
				  </div>
				</div>
			  </div>
			</div>
		</div>
    </div>
	<div class="clear"></div>
	<!-- info pop-up -->
	
	<!-- JavaScript -->
	<script src='assets/front/404/js/mootools.js' type="text/javascript"></script>
	<script src='assets/front/404/js/uTetris-1.0.js' type="text/javascript"></script>
	<script src='assets/front/404/js/jquery.min.js' type="text/javascript"></script>
	<script src="assets/front/404/js/popup.js" type="text/javascript"></script>
	<script src="assets/front/404/js/index.js" type="text/javascript"></script>
</body>


<!-- Mirrored from squirrellabs.net/theme/tetris404/error404/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Aug 2015 09:21:08 GMT -->
</html>