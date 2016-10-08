<div class="content-body-event">
	<div class="col-md-6 col-xs-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<a href="event_page"><img src="<?php echo $img[0]->img; ?>" class="img-responsive"></a>
			</div>
			<div class="panel-body">
				<div class="place">
					<?php echo $baslik["0"]->baslik ?>
				</div>
				<div class="event">
					<?php
					
					echo mb_strimwidth($icerik["0"]->icerik, 0, 100, "...")  ?>
				</div>
			</div>
			<div class="panel-footer">
				<div class="feature">
					<span class="views">
	  					<img src="<?=base_url()?>assets/front/img/ico-eye.png" class="img-responsive">
	  					
	  				</span>
	  				<span class="views-1">
	  					35,208
	  				</span>
	  				<span class="likes">
	  					<img src="<?=base_url()?>assets/front/img/ico-heart.png" class="img-responsive">
	  				</span>
	  				<span class="likes-1">
	  					25
	  				</span>
	  				<span class="pictures">
	  					<img src="<?=base_url()?>assets/front/img/ico-pictures.png" class="img-responsive">
	  				</span>
	  				<span class="pictures-1">
	  					53
	  				</span>

	  				<span class="shares">
	  					<img src="<?=base_url()?>assets/front/img/ico-share.png" class="img-responsive">
	  				</span>
	  				<span class="shares-1">
	  					<a href="#">Paylaş</a>
	  				</span>
				</div>
			</div>
		</div>
	</div>
</div>