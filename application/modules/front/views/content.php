<!--Content-->

<div class="content">
	<div class="row">
		<div class="col-sm-6 col-md-8">
				<?php require('slider.php') ?>
			<!-- Content Body -->
			<div class="panel panel-default">
			  <div class="panel-body">
			    <a href="mekan-page.php">
			    	<img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=1000%C3%97667" class="img-responsive">
			    </a>
			  </div>
			  <div class="panel-footer">
			  	<div class="row">
			  		<div class="col-sm-3 col-xs-4">
			  			<div class="place">
			  				Etkinlik
			  			</div>
			  			<div class="event">
			  				Etkinlik Açıklaması
			  			</div>
			  		</div>
			  		<div class="col-sm-9 col-xs-8">
			  			<div class="etkinlik-populerite">
			  				<span class="views">
			  					<img src="assets/img/ico-eye.png" class="img-responsive">
			  					
			  				</span>
			  				<span class="views-1">
			  					35,208
			  				</span>
			  				<span class="likes">
			  					<img src="assets/img/ico-heart.png" class="img-responsive">
			  				</span>
			  				<span class="likes-1">
			  					25
			  				</span>
			  				<span class="shares">
			  					<img src="assets/img/ico-share.png" class="img-responsive">
			  				</span>
			  				<span class="shares-1">
			  					<a href="#">Paylaş</a>
			  				</span>
			  			</div>
			  		</div>
			  	</div>
			  </div>
			</div>
			<!-- End Content Body -->


			<!-- Content Body col-sm-6 -->
				<div class="row">
					<?php for ($i=0; $i < 20; $i++) { 
					include "event.php";
				} ?>
				</div>
			<!-- End Content Body col-sm-6 -->
		<div class="later-adwords">
			<img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=1000%C3%97667&w=724&h=165" class="img-responsive">
		</div>
		</div>

		<?php require('fixed-sidebar-adword.php'); ?>
	</div>
	
</div>
<!-- End Content -->
