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
					<img src="<?php echo $haber_bilgisi[0]['img']; ?>" class="img-responsive">
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
		<?php require('fixed-sidebar-adword.php') ?>
		</div>
</div>
