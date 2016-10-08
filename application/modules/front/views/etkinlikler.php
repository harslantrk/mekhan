
<!--Content-->
<script>
	function deneme(day,month,year)
    {
    	month+=1;
        window.location.href = '<?php echo base_url("etkinlikler"); ?>/'+day+'/'+month+'/'+year;
    }
</script>
<div class="content">
	<div class="row">
		<div class="col-md-8 col-sm-7">
			<?php
			foreach($tarihler as $tarih)
			{
			$gunName = date("D", strtotime($tarih->tarih));
			$gun = date("d", strtotime($tarih->tarih));
			//$ay = date("m", strtotime($tarih->tarih));

			$date=explode('-',$tarih->tarih);
			$searchM  = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
			$replaceM = array('OCAK', 'ŞUBAT', 'MART', 'NİSAN', 'MAYIS', 'HAZİRAN', 'TEMMUZ', 'AĞUSTOS', 'EYLÜL', 'EKİM', 'KASIM', 'ARALIK');
			$date["1"]=str_replace($searchM, $replaceM, $date["1"]);

			$searchD  = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
			$replaceD = array('Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi', 'Pazar');
			$gunName=str_replace($searchD, $replaceD, $gunName);
			/*$month_name = date('F', mktime(0, 0, 0, strtotime($tarih->tarih)));*/
			$yil = date("Y", strtotime($tarih->tarih));
			?>
			<div class="event-date">
				<div class="row">
					<div class="col-sm-11">
						<?php
							$dateArray=explode("-",$currentDate);
							$gun = date("D", strtotime($currentDate));
							$newDay = Core::DayNameConverter($gun);
							$newMonth = Core::MonthNameConverter($dateArray[1]);
						?>
						<span class="event-day-1">
						<p class="day"><?php echo $dateArray[2]; ?></p>
						<p class="mounth"><?php echo $newMonth; ?></p>
						</span>
						<span class="event-day"><h3><?php echo $newDay; ?></h3></span>
					</div>
				</div>
			</div>

			<div class="row">
			<div class="col-sm-12">
			<?php
				if(empty($etkinlikler))
					echo "<h1>Bugüne ait etkinlik bulunamadı!</h1>";
				else
				{
					foreach ($etkinlikler as $key => $value)
					{
				 		echo '
						<div class="etkinlikler-content">
							<a href="'.base_url() . 'etkinlik/' . $value->link.'">
								<div class="panel col-xs-12 col-md-12 col-sm-12">
									<div class="panel-body">
										<div class="col-sm-3 col-md-3 col-xs-3">
											<img src="'.$value->img.'" class="img-responsive">
										</div>
										<div class="col-sm-9 col-md-9 col-xs-9">
											<p class="etkinlik-category">Parti</p>
											<h3 class="etkinlik-name-1">'.$value->baslik.'</h3>
											<p class="etkinlik-spawn">'.mb_strimwidth($value->icerik, 0, 100, "...").'</p>
										</div>
									</div>
								</div>
							</a>
						</div>';
					}
				}
			?>
				</div>
				</div>
			<?php } ?>




			<div class="row" style="padding:0px 15px;">
				<div class="later-adwords">
			<img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=1000%C3%97667&w=724&h=165" class="img-responsive">
			</div>
			</div>
		</div>
		<div class="col-md-4 col-sm-5">
			<?php include "calender.php"; ?>
		</div>
		<?php require('fixed-sidebar-adword-etkinlikler.php'); ?>
	</div>

</div>

<!-- End Content -->



