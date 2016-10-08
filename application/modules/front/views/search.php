<div class="content">
	<div class="row">
		<div class="col-md-8 col-sm-7">
			<div class="content-body-event row">
			<?php
				if (empty($searchedPlaces))
					echo "<h1>İseğinize uygun kayıt bulunamadı</h1>";
				else
				foreach ($searchedPlaces as $key => $value)
				{
				 if ($key%2==1) 
				 {
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
				if ($key%2==1) 
				{
					echo "</div>";		
				}
			}
		?>
		</div>
	</div>
</div>
<!-- End Content -->