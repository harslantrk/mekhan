

	<div class="container" >
		<div class="row">
			<section class="lazy-load-box trigger effect-slidefromleft " data-delay="400" data-speed="800" style="-webkit-transition: all 800ms ease; -moz-transition: all 800ms ease; -ms-transition: all 800ms ease; -o-transition: all 800ms ease; transition: all 800ms ease;">
				<div class="col-md-12">
					<h3><a href="">Marka Seçin</a></h3>
				</div>		
			</section>

			<?php foreach($markalar as $marka){ ?>
			<div class="col-md-3 margin-top">
				<a href="<?php echo base_url("teknikservis/sec/".$marka["seo_url"]);?>" title="">
				<img src="<?php echo $marka["fotograf"]; ?>" alt="" class="img-responsive urunfoto"/></a>
				<a href="<?php echo base_url("teknikservis/sec/".$marka["seo_url"]);?>" title="" class="btn btn-default markabuton"><?php echo $marka["title"]; ?></a> 
			</div>
			<?php } ?>
		</div>
	</div>

	