<?php
$gunName = date("D", strtotime($haber_bilgisi[0]['tarih']));
$gun = date("d", strtotime($haber_bilgisi[0]['tarih']));
//$ay = date("m", strtotime($tarih->tarih));

$date=explode('-',$haber_bilgisi[0]['tarih']);
$searchM  = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
$replaceM = array('OCAK', 'ŞUBA', 'MART', 'NİSA', 'MAYI', 'HAZİ', 'TEMM', 'AĞUS', 'EYLÜ', 'EKİM', 'KASI', 'ARAL');
$date["1"]=str_replace($searchM, $replaceM, $date["1"]);

$searchD  = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
$replaceD = array('Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi', 'Pazar');
$gunName=str_replace($searchD, $replaceD, $gunName);
/*$month_name = date('F', mktime(0, 0, 0, strtotime($tarih->tarih)));*/
$yil = date("Y", strtotime($haber_bilgisi[0]['tarih']));
?>
<div class="mekan-page-content">
	<div class="row">
		<div class="col-md-8 col-sm-6">
			<div class="mekan-page-header">
				<div class="row">
					<div class="col-sm-9 col-xs-8">
						<span class="event-day-1">
						<p class="day"><?php echo $gun; ?></p>
						<p class="mounth"><?php echo $date["1"]; ?></p>
						</span>
						<span class="event-day">
						<h3><?php echo $haber_bilgisi[0]['baslik'];  ?></h3></span>
					</div>
					<div class="col-sm-3 col-xs-4">
						<span class="paylas"><i class="fa fa-share-alt"></i><a href="#">Paylaş</a> </span>
						<span class="begen"><i class="fa fa-heart-o"></i></span>
					</div>
				</div>
			</div>
			<div class="mekan-page-body">
				<div class="mekan-image">
				
					
				        
				          <img src="<?php echo  $haber_bilgisi[0]['img']; ?>" class="img-responsive" ?>
							
								
				</div>
				<div class="mekan-about">
					<p class="mekan-about-content"><?php echo  $haber_bilgisi[0]['icerik']; ?></p>
				</div>
			</div>
			<?php include "comming-event.php"; ?>
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
			
			<?php include "fixed-sidebar-mekan-page.php"; ?>
		</div>
		</div>
</div>