<div class="container" style="margin-top: 60px;">
  <div class="row">
       <?php foreach($markalar as $marka){ ?>
			<div class="col-lg-4 col-sm-6 col-xs-12">
				<a href="<?php echo base_url("tekne-kiralama/sec/".$marka["seo_url"]);?>" title="">
                                    <img src="<?php echo $marka["fotograf"]; ?>" alt="" class="thumbnail img-responsive"/></a>
				
                                 <div class="carousel-caption">
                                     <a href="<?php echo base_url("tekne-kiralama/sec/".$marka["seo_url"]);?>" title=""><h4><?php echo $marka["title"]; ?></h4></a>
                              </div>
			</div>
			<?php } ?>
    </div>
  </div>  