<div class="mekan-page-content">
	<div class="row">
		<div class="col-md-8 col-sm-6">
			<div class="mekan-page-header">
				<div class="row">
					<div class="col-sm-7 col-xs-8"><h3><?php echo  $haber_bilgisi[0]['title']; ?></h3></div>
					<div class="col-sm-5 col-xs-4">
						<span class="paylas"><i class="fa fa-share-alt"></i><a href="#">Paylaş</a> </span>
						<span class="begen"><i class="fa fa-heart-o"></i></span>
					</div>
				</div>
			</div>
			<div class="mekan-page-body">
				<div class="mekan-image">
					<!--<img src="<?php echo $haber_bilgisi[0]['img']; ?>" class="img-responsive">-->
					<div id="myCarousel" class="carousel slide" data-ride="carousel">
						  <!-- Indicators -->
						  
						  <?php 
						   foreach ($resimler as $key => $value) {
						 
						   if ($key==0) {
						   	 echo '<div class="carousel-inner" role="listbox">
						    <div class="item active">
						      <img id="buyuk-resim" src="'.base_url() . 'uplo4ds/files/' .  $value->image_path .'" alt="Chania">
						    </div>
						  </div>';
						   }
						  }

						 ?>


						  
					</div>

					<div class="row">
						<?php 
						//$images= explode("$",$haber_bilgisi[0]['mekan_resimler']);
						
						foreach ($resimler as $key => $value) {
							echo '<div id="kucuk-resim" class="col-sm-3 kucuk-resim">
							<img class="img-responsive" src="'.base_url() . 'uplo4ds/files/' . $value->image_path.'">
							</div>';
						}

						 
						 ?>
					</div>
					<script type="text/javascript">
						$(".kucuk-resim img").on('click', function() {


							document.getElementById('buyuk-resim').src = $(this).attr("src");
						});
						
					</script>
				</div>
				
				<div class="mekan-about">
					<p><?php echo $haber_bilgisi[0]['content']; ?>
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
						<img src="<?php echo $haber_bilgisi[0]['img']; ?>" class="img-responsive">
					</div>
					<div class="panel-body">
						<p class="mekan-category"><?php echo $haber_bilgisi[0]['kategori']; ?></p>
						<p class="mekan-name"><?php echo $haber_bilgisi[0]['title']; ?></p>
						<p class="mekan-phone"><i class="fa fa-phone"></i><?php echo $haber_bilgisi[0]['telefon']; ?></p>
						<p class="mekan-eating"><i class="fa fa-cutlery"></i><?php echo $haber_bilgisi[0]['extra']; ?></p>
						<p class="mekan-konum"><i class="fa fa-map-marker"></i><span class="ilce"><?php echo $haber_bilgisi[0]['ilce']; ?> , </span><?php echo $haber_bilgisi[0]['il']; ?></p>
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
						<span class="point"><?php echo $haber_bilgisi[0]['fiyat']; ?> TL</span>
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
					
					<?php echo $haber_bilgisi[0]['map']; ?>
				</div>
			</div>
			<?php include "fixed-sidebar-mekan-page.php"; ?>
		</div>
		</div>
</div>
