<!--Content-->
<div class="content">
	<div class="row">
		<div class="col-md-8 col-sm-7">
			<div class="event-date">
				<div class="row">
					<div class="col-sm-11 col-xs-12">
						<span class="event-day-1">
						<p class="day">27</p>
						<p class="mounth">ağu</p>
						</span>
						<span class="event-day"><h3>Etkinlik / Etkinlik Keyfi</h3></span>
					</div>
				</div>
			</div>
			<div class="event-video-top">
				<div class="panel">
					<div class="panel-header">
						<iframe width="560" height="315" src="https://www.youtube.com/embed/NejMwMeZyag" frameborder="0" allowfullscreen></iframe>
					</div>
					<div class="panel-footer">
						<div class="row">
							<div class="col-sm-10">
								<div class="feature">
									<span class="views col-xs-1 col-sm-1 col-md-1">
					  					<img src="<?=base_url()?>assets/front/img/ico-eye.png" class="img-responsive">
					  				</span>
					  				<span class="views-1 col-xs-2 col-sm-2 col-md-1">
					  					35,208
					  				</span>
					  				<span class="likes  col-xs-1 col-sm-1 col-md-1">
					  					<img src="<?=base_url()?>assets/front/img/ico-heart.png" class="img-responsive">
					  				</span>
					  				<span class="likes-1 col-xs-2 col-sm-2 col-md-1">
					  					25
					  				</span>
					  				

					  				<span class="shares col-xs-1 col-sm-1 col-md-1">
					  					<img src="<?=base_url()?>assets/front/img/ico-share.png" class="img-responsive">
					  				</span>
					  				<span class="shares-1 col-xs-2 col-sm-2 col-md-1">
					  					<a href="#">Paylaş</a>
					  				</span>
								</div>
							</div>
							<div class="col-sm-2">
								<a href="#"><i class="fa fa-heart-o"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php 
				if(isset($month))
					$monthName=Core::MonthNameConverter($month);
				else
					$monthName="Ağustos";
			 ?>
			<div class="event-date">
				<div class="row">
					<div class="col-sm-10">
						<span class="event-day"><h3><?php echo $monthName; ?></h3></span>
					</div>
					<div class="col-sm-2">
						<span class="event-date-day"><h3><?php if(isset($etkinlikler)) echo count($etkinlikler); else echo "Ağustos"; ?></h3></span>
					</div>
				</div>
			</div>
			<div class="content-body-event row">
					<?php
					foreach ($etkinlikler as $key => $value)
					{
					 if ($key%2==1) {
					 	echo '<div class="row">';
					 }
				
				 echo '
			
			<div class="col-md-6 col-sm-6 col-xs-6 " >

	
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
		</div>
			<?php require('fixed-sidebar-video.php'); 	?>
		</div>
			
	</div>
</div>
<!-- End Content -->