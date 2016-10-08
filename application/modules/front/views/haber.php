	<div class="container" >
		<div class="row">
			<div class="col-md-7">
				<div class="col-md-12" style="padding-bottom:20px;">
					<img src="<?php echo $h["img"]; ?>" alt="" class="img-responsive" style="object-fit:cover; height: 50%; width:100%;margin: 0 auto;"/></a>
				</div>
				
				<div class="col-md-12">
					<div class="excerpt well">
					<h4 style="text-align:center">
						<a href="" title="<?php echo $h["baslik"]; ?>"><?php echo $h["baslik"]; ?></a>
					</h4>
						<?php echo $h["icerik"]; ?>
					</div>
				</div>
			</div>
			
			<div class="col-md-5">
			<div class="col-md-12"><h3 style="line-height: 31px;"><a href="">Diğer Haberler</a></h3></div>
			<?php foreach($haberler as $haber){ ?>
				<div class="col-md-12">
					<a href="<?php echo base_url("haber/".seo($haber["baslik"])."/".$haber["id"]);?>" title="<?php echo $haber["baslik"]; ?>">
					<img src="<?php echo $haber["img"]; ?>" alt="" class="img-responsive" style="height:25%; width:100%; object-fit:cover"/></a>
					<div class="excerpt well">
					
					<h5 style="text-align:center">
						<a href="<?php echo base_url("haber/".seo($haber["baslik"])."/".$haber["id"]);?>" title="<?php echo $haber["baslik"]; ?>"><?php echo $haber["baslik"]; ?></a></h5>
					
						<?php echo kisalt($haber["icerik"],100); ?>
					</div>
				</div>
			<?php } ?>
			</div>
		</div>
	</div>
	