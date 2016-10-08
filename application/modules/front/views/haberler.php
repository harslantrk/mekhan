

	<div class="container" >
		<div class="row">
			<section class="lazy-load-box trigger effect-slidefromleft " data-delay="400" data-speed="800" style="-webkit-transition: all 800ms ease; -moz-transition: all 800ms ease; -ms-transition: all 800ms ease; -o-transition: all 800ms ease; transition: all 800ms ease;">
				<div class="col-md-12">
					<h2 style="color:black">Haberler</h2>
				</div>	
			</section>

			<?php foreach($haberler as $haber){ ?>
			<div class="col-md-3">
				<a href="<?php echo base_url("haber/".seo($haber["baslik"])."/".$haber["id"]);?>" title="<?php echo $haber["baslik"]; ?>">
				<img src="<?php echo $haber["img"]; ?>" alt="" class="img-responsive" style="height:200px; object-fit:cover"/></a>
				<div class="excerpt well">
				
				<h5 style="text-align:center">
					<a href="<?php echo base_url("haber/".seo($haber["baslik"])."/".$haber["id"]);?>" title="<?php echo $haber["baslik"]; ?>"><?php echo $haber["baslik"]; ?></a></h5>
				
					<?php echo kisalt($haber["icerik"],100); ?>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>

	