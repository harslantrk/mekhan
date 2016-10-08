
<div class="mekan-page-content">
	<div class="row">
		<div class="col-md-8 col-sm-6">
			<div class="mekan-page-header">
				<div class="row">
					<div class="col-sm-7 col-xs-8"><h3><?php echo $haber_bilgisi[0]['baslik']; ?></h3></div>
					<div class="col-sm-5 col-xs-4">
						<span class="paylas"><i class="fa fa-share-alt"></i><a href="#">Paylaş</a> </span>
						<span class="begen"><i class="fa fa-heart-o"></i></span>
					</div>
				</div>
			</div>
			<div class="mekan-page-body">
				<div class="mekan-image">
					<img src="<?php echo $haber_bilgisi[0]['img']; ?>" class="img-responsive">
				</div>
				
				<div class="mekan-about">
					<p><?php echo $haber_bilgisi[0]['icerik']; ?>
					</p>
				</div>	
			</div>

			
			<?php include "comming-event.php" ?>
			<div class="benzer-etkinlik-title">
				<div class="row">
					<div class="col-sm-9 col-xs-8"><h3>BENZER ETKİNLİKLER</h3></div>
					<div class="col-sm-3 col-xs-4">
						<span class="etkinlik-adet"><h3>231</h3></span>
					</div>
				</div>
			</div>
			<?php include "benzer-etkinlikler.php"; ?>
		</div>
		<div class="col-md-4 col-sm-6">
			<div class="mekan-feature">
				<div class="panel">
					<div class="panel-heading">
						<img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=310%C3%97167&w=310&h=167" class="img-responsive">
					</div>
					<div class="panel-body">
						<p class="mekan-category">Club</p>
						<p class="mekan-name">Mekan İsmi</p>
						<p class="mekan-phone"><i class="fa fa-phone"></i>0212 123 45 67</p>
						<p class="mekan-eating"><i class="fa fa-cutlery"></i>Amerikan Mutfak</p>
						<p class="mekan-konum"><i class="fa fa-map-marker"></i><span class="ilce">Kadıköy , </span>İstanbul</p>
					</div>
					<div class="panel-footer">
						<span class="views">
							<img src="<?=base_url()?>assets/front/img/ico-eye.png" class="img-responsive">
						</span>
						<span class="views-1">7500</span>
						<span class="likes">
							<img src="<?=base_url()?>assets/front/img/ico-heart.png" class="img-responsive">
						</span>
						<span class="likes-1">2</span>
						<span class="point">2000 TL</span>
					</div>	
				</div>
				<div class="feature-bottom">
					<div class="col-sm-3 border-right">
						<div class="row">
						<a href="#">
							<h3>1</h3>
							<p>etkinlik</p>
						</a>
						</div>
					</div>
					<div class="col-sm-3 border-right">
						<div class="row">
						<a href="#">
							<h3>0</h3>
							<p>video</p>
						</a>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="row">
						<a href="#">
							<h3>9</h3>
							<p>resim</p>
						</a>
						</div>
					</div>
				</div>
				<div class="mekan-map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3012.3939803808667!2d29.09755731489746!3d40.972853029553775!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cab87390c21ddd%3A0x93593aa313b8b985!2semcbilisim.com!5e0!3m2!1str!2str!4v1473488143956" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</div>
			<?php include "fixed-sidebar-mekan-page.php"; ?>
		</div>
		</div>
</div>
