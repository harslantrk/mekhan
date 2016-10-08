<!--Content-->

<div class="content">
	<div class="row">
		<div class="col-md-8 col-sm-7">
			<div class="event-date">
				<div class="row">
					<div class="col-sm-6 col-xs-7">
						<span class="event-day"><h3>MEKANLAR (<?php echo count($img); ?>)</h3></span>
					</div>
					<div class="col-sm-6 col-xs-5">
						<div class="btn-group btn-group-top-panel btn-group-lang">
				            <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				                Alfabetik Sıralama                <span class="caret"></span>
				            </button>
				            <ul class="dropdown-menu" role="menu">
				                <li class="active"><a href="<?php echo base_url('mekanlar/title'); ?>">Alfabetik Sıralama</a>
				                </li>
				                <li><a href="<?php echo base_url('mekanlar/fiyat'); ?>">Puana Göre Sıralama</a>
				                </li>
				                <li><a href="#">Favorilere Göre Sıralama</a>
				                </li>
				            </ul>
				        </div>
					</div>
				</div>
			</div>
			<div class="content-body-event">
			<div class="row">
			<?php foreach ($img as $key => $value) {
			if ($img%2==0) {
				echo '<div class="row">';
			}
			echo '<div class="col-md-6 col-sm-12 col-xs-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<a href="'.base_url() . 'mekan/' . $value->id.'/' . $value->link.'"><img src="'.base_url().$value->img.'" class="img-responsive"></a>
					</div>
					<div class="panel-body">
						<div class="rezervasyon">
							<a href="#"> REZERVASYON</a>
						</div>
						<div class="mekan-category">
							'.$value->kategori.'
						</div>
						<div class="place">
							'.$value->title.'
						</div>
						<div class="mekan-spawn">
							<i class="fa fa-map-marker"></i> <span class="ilce">'.$value->ilce.',</span> <span class="il">'.$value->il.'</span>
						</div>
						<div class="mekan-ayricalik">
							<i class="fa fa-cutlery"></i> '.$value->extra.'
						</div>
					</div>
					<div class="panel-footer">
						<div class="feature">
							<span class="views col-xs-1 col-sm-2 col-md-1">
			  					<img src="'.base_url().'assets/front/img/ico-eye.png" class="img-responsive">
			  					
			  				</span>
			  				<span class="views-1 col-xs-2 col-sm-2 col-md-2">
			  					35,208
			  				</span>
			  				<span class="likes col-xs-1 col-sm-2 col-md-1">
			  					<img src="'.base_url().'assets/front/img/ico-heart.png" class="img-responsive">
			  				</span>
			  				<span class="likes-1 col-xs-2 col-sm-2 col-md-2">
			  					25
			  				</span>
			  				<span class="point col-xs-6 col-sm-4 col-md-6">'.$value->fiyat.' TL</span>
						</div>
					</div>
				</div>
			</div>';

			if ($img%2==0) {
				echo '</div>';
			}
			}

			?>
			</div>

			</div>
		</div>
		<?php require('fixed-sidebar-mekanlar.php'); ?>
	</div>
</div>
