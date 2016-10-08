<!--Content-->
<div class="content">
	<div class="row">
		<div class="col-sm-7 col-md-8">

		<?php require('slider.php'); ?>

				
			<!-- Content Body -->
			<div class="panel panel-default">
			  <div class="panel-body">
			    <a href="mekan-page.php">
			    	<img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=1000%C3%97667" class="img-responsive">
			    </a>
			  </div>
			  <div class="panel-footer">
			  	<div class="row">
			  		<div class="col-sm-3 col-md- col-xs-4">
			  			<div class="place">
			  				Etkinlik
			  			</div>
			  			<div class="event">
			  				Etkinlik Açıklaması
			  			</div>
			  		</div>
			  		<div class="col-md-9 col-sm-9 col-xs-8">
			  			<div class="etkinlik-populerite">
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
			<!-- End Content Body -->


			<!-- Content Body col-sm-6 -->

				<div class="content-body-event ">
					<?php
					foreach ($etkinlikler as $key => $value)
					{
					 if ($key%2==1) {
					 	echo '<div class="row">';
					 }
				
				 echo '
			
			<div class="col-md-6 col-sm-6 col-xs-6" style="padding-left:0px;">

	
		<div class="panel panel-default">
			<div class="panel-heading">
				<a href="'.base_url() . 'etkinlik/' . $value->link.'"><img src="'.base_url().$value->img.'" class="img-responsive"></a>
			</div>
			<div class="panel-body">
				<div class="place"><p>
					'. mb_strimwidth($value->baslik, 0, 35, "...") .'
					</p>
				</div>
				<div class="event"><p>
					'. mb_strimwidth($value->icerik, 0, 70, "...")  .'
				</p></div>
			</div>
			<div class="panel-footer">
				<div class="feature">
					<span class="views">
	  					<img src="'.base_url().'assets/front/img/ico-eye.png" class="img-responsive">
	  					
	  				</span>
	  				<span class="views-1">
	  					35,208
	  				</span>
	  				<span class="likes">
	  					<img src="'.base_url().'assets/front/img/ico-heart.png" class="img-responsive">
	  				</span>
	  				<span class="likes-1">
	  					25
	  				</span>
	  				<span class="pictures">
	  					<img src="'.base_url().'assets/front/img/ico-pictures.png" class="img-responsive">
	  				</span>
	  				<span class="pictures-1">
	  					53
	  				</span>

	  				<span class="shares">
	  					<img src="'.base_url().'assets/front/img/ico-share.png" class="img-responsive">
	  				</span>
	  				<span class="shares-1">
	  					<a href="#">Paylaş</a>
	  				</span>
				</div>
			</div>
</div>


						</div>';
					
					if ($key%2==1) {
							echo "</div>";
						}
			
						
						
						


						
				}
				?>
				</div>
					
					
					
						
					
				
			<!-- End Content Body col-sm-6 -->
		
			<div class="row">
			<div class="col-sm-12">
				<div class="later-adwords">
				
				<a href="<?php echo $reklam_data['0']->footer_link;  ?>">
					<img src="<?php echo base_url().$reklam_data[0]->footer_fotograf;  ?>" class="img-responsive">
				</a>
			</div>
			</div>

		</div>
		</div>

		<?php require('fixed-sidebar-adword.php'); ?>
	</div>
	
	
</div>
<!-- End Content -->
