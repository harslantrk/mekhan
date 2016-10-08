<!DOCTYPE html>
<html >
<head>
	<title>Mekhan</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta keyword="">
	<meta description="">
	<link rel="stylesheet" href="<?=base_url()?>assets/front/plugins/bootstrap/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700&subset=all" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/front/plugins/datepicker/datepicker3.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/front/plugins/custom/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/front/plugins/font-awesome/css/font-awesome.min.css">

	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script src="<?=base_url()?>assets/front/plugins/bootstrap/js/bootstrap.js"></script>
	<script src="<?=base_url()?>assets/front/js/custom.js"></script>
	<script src="<?=base_url()?>assets/front/plugins/datepicker/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/front/plugins/custom/js/app.js"></script>
</head>
<body>
<div class="container">
	<div class="row">
		<!-- Header -->
		<div class="header">
			<!--Header Bottom-->
			<div class="header-top">
				<div class="row">
					<div class="col-sm-3 col-xs-6">
						<div class="btn-group btn-hamburger">
				            <div class="helper on-open"></div>
				            <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				                <img src="<?=base_url()?>assets/front/img/hamburger.png" class="on-close">
				            </button>
				            <ul class="dropdown-menu" role="menu" style="width:280px">
				            	<?php
				            		foreach ($categories as $key => $val)
				            		{
				            			echo '<li><a href="'.base_url("cat/$val->kategori").'">'.$val->kategori.'</a></li>';
				            		}
				            	 ?>
				            </ul>
						</div>
						<div class="btn-group btn-group-top-panel btn-group-lang">
				            <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				                TR<span class="caret"></span>
				            </button>
				            <ul class="dropdown-menu" role="menu">
				                <li class="active"><a href="#">TR</a>
				                </li>
				                <li><a href="#">ENG</a>
				                </li>
				            </ul>
				        </div>
				        <div class="btn-group btn-group-top-panel btn-group-lang">
				            <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				                İL<span class="caret"></span>
				            </button>
				            <ul class="dropdown-menu" role="menu">
				            	<?php
				            		foreach ($countries as $key => $val)
				            		{
				            			echo '<li class="'; if($key==0) echo "active"; echo '"><a href="'.base_url("/il/$val->il").'">'.$val->il.'</a></li>';
				            		}
				            	 ?>
				            </ul>
				        </div>
					</div>
					<div class="col-sm-7 hidden-xs">
						<div class="header-top-input">
							<form method="post" action="<?php echo base_url("search") ?>" class="search">
								 <div class="pull-left txt">
                                       <input type="search" class="notificationLink" onkeyup="getSearch()" id="notificationLink" name="keyword" placeholder="Plaj, Club, Restaurant, Mekan Ara..">
                                       <div id="notification_li">
                                           <div id="notificationContainer" style="display: none;">
                                               <div id="notificationTitle">Arama Sonuçları</div>
                                               <div id="notificationsBody" class="notifications">
                                                   <div class="notificationsImg">
                                                   </div>
                                                   <div class="notificationsText">
                                                   Arama yapmak için en az 4 harf giriniz.
                                                   </div>
                                               </div>
                                               <div id="notificationFooter" onclick="window.location='/ara/';" style="cursor:pointer;">Tümünü Göster</div>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="clearfix"></div>
							</form>
						</div>
					</div>
					<div class="col-sm-2 col-xs-6">
						<?php
						$authuser = $this->session->userdata('username');
						$login_url = $this->session->userdata('login_url');
						if(empty($authuser)) {
							?>
							<button type="button" class="login-button" data-toggle="modal" data-target=".bs-example-modal-lg">Giriş Yap</button>
							<?php
						}
						else {
							?>
						<div class="btn-group btn-group-top-panel btn-group-lang">
							<button type="button" class="dropdown-toggle login-button" data-toggle="dropdown" aria-expanded="false">
								<?php
								echo "$authuser";
								?>
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li class="active"><a href="#">Profil</a>
								</li>
								<li><a href="/logout">Çıkış</a>
								</li>
							</ul>
						</div>
							<?php
						}
						?>
						<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="modalLogin">
						  <div class="modal-dialog modal-lg" role="document">
						    <div class="modal-content">
						      <div class="panel panel-default">
								  <div class="panel-heading">
								    <h3 class="panel-title">MEKHAN GİRİŞ YAPIN YADA KAYDOLUN</h3>
								  </div>
								  <div class="panel-body">
								    <div class="row">
								    	<div class="col-md-12">
								    		<h3 class="login-head">Giriş Yap</h3>
								    		<form method="post" action="" class="login" id="validate-2">
										    	<input type="text" name="username" class="required" placeholder="Kullanıcı Adı veya E-Posta">
										    	<input type="password" name="password" class="required" placeholder="Parolanız">
										    	<div class="row">
										    	<input class="giris-yap" type="submit" name="login" value="Giriş Yap">
										    	<a href="<?php echo $login_url; ?>"><button type="button" class="facebook-login">Facebook Girişi</button></a>
										    	</div>
										    </form>
											<div class="login">
												<button class="register" onclick="trigRegister();">Kayıt Ol</button>
											</div>
								    	</div>
								    </div>
								  </div>
								</div>
						    </div>
						  </div>
						</div>
						<!-- Modal2 -->
						<div class="modal fade bs-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="modalRegister" id="modalRegister">
						  <div class="modal-dialog modal-lg" role="document">
						    <div class="modal-content">
						      <div class="panel panel-default">
								  <div class="panel-heading">
								    <h3 class="panel-title">MEKHAN KAYDOLUN</h3>
								  </div>
								  <div class="panel-body">
								    <div class="row">
								    	<div class="col-md-12">
								    		<h3 class="login-head">Kayıt Ol</h3>
								    		<form method="post" action="/userRegister" class="login">
										    	<input type="text" name="fullname" placeholder="Adınız">
										    	<input type="text" name="username" placeholder="Kullanıcı Adı">
										    	<input type="text" name="email" placeholder="E-Posta">
										    	<input type="text" name="tel" placeholder="Telefon">
										    	<input type="password" name="password" placeholder="Parolanız">
										    	<div class="row">
										    	<input class="giris-yap" type="submit" name="register" value="Kayıt Ol">
										    	<button class="facebook-login">Facebook Girişi</button>
										    	</div>
										    </form>
								    	</div>
								    </div>
								  </div>
								</div>
						    </div>
						  </div>
						</div>
					</div>
					</div>
			</div>
			<!--End Header Top-->
			<!--Header Bottom-->
				<div class="header-bottom">
					<div class="row">
						<nav class="navbar navbar-default">
						  <div class="container-fluid">
						    <!-- Brand and toggle get grouped for better mobile display -->
						    <div class="navbar-header">
						      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						        <span class="sr-only"></span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						      </button>
						      <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?=base_url()?>assets/front/img/logo.png" class="img-responsive"></a>
						    </div>

						    <!-- Collect the nav links, forms, and other content for toggling -->
						    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						      <ul class="nav navbar-nav">
						        <li><a href="<?php echo base_url('galeri'); ?>">GALERİ</a></li>
						        <li><a href="<?php echo base_url('video'); ?>">VİDEOLAR</a></li>
						        <li><a href="<?php echo base_url('etkinlikler'); ?>">ETKİNLİKLER</a></li>
						        <li><a href="<?php echo base_url('mekanlar'); ?>">MEKANLAR</a></li>
						        <li><a href="<?php echo base_url('blog'); ?>">BLOG</a></li>
						        <li><a href="<?php echo base_url('iletisim'); ?>">İLETİŞİM</a></li>
						      </ul>
						    </div><!-- /.navbar-collapse -->
						  </div><!-- /.container-fluid -->
						</nav>
					</div>
				</div>
			<!--End Header Bottom-->
			<!--<div id="notificationsBody"></div>-->
	<script type="text/javascript">
		function getSearch()
            {
               var query = document.getElementById('notificationLink').value;
               var say=query.length;
               if(say>"3")
               {
               $.ajax({
                 url: '<?php echo base_url("search"); ?>',
                 type: 'POST',
                 cache: false,
                 data: {keyword: query},
                 success: function(data){
                   document.getElementById('notificationsBody').innerHTML=data;
                 },
                 error: function(jqXHR, textStatus, err){}
              });
               }
            }

            $(document).ready(function()
             {
                 $(".notificationLink").click(function()
                 {
                    //okundu işlemi burda yapılabilir.
                     $("#notificationContainer").fadeToggle(300);
                     $("#notification_count").fadeOut("slow");
                     return false;
                 });
                //Document Click
                 $(document).click(function()
                 {
                     $("#notificationContainer").hide();
                 });
                 //Popup Click
                 $("#notificationContainer").click(function()
                 {
                     //return false
                 });
             });

	</script>
		</div>
		<!-- End Header -->
	</div>