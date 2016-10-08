<div class="mekan-page-bottom">
				<div class="row">
					<div class="col-sm-10 col-xs-8"><h3>YAKLAŞAN ETKİNLİKLER</h3></div>
					<div class="col-sm-2 col-xs-4">
						<span class="etkinlik-adet"><h3>2</h3></span>
					</div>
				</div>
			</div>
			<?php
			foreach($comming_event as $value)
			{
			?>
			<a href="#">
				<div class="coming-event">
					<div class="panel">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3 col-sm-5 col-xs-3">
									<img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=165%C3%97165&w=350&h=350" class="img-responsive">
								</div>
								<div class="col-md-9 col-sm-7 col-xs-9">
									<div class="coming-event-detail">
										<p class="event-clock"><h3 class="event-clock-1">23:00</h3></p>
										<p class="event-category"><?php echo $value->kategori; ?></p>
										<p class="event-date"><?php echo date("d F", strtotime($value->tarih)); ?> <span class="event-day"><?php echo date("l", strtotime($value->tarih)); ?></span></p>
										<p class="event-about"><?php echo substr($value->icerik,0,65); ?></p>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</a>
			<?php
			}
			?>