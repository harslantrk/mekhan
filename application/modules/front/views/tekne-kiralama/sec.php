<div class="container" style="margin-top: 60px;">
    
  <h2><p class="lead"> </p></h2> 
  <div class="row">
      <?php foreach($modeller as $model){ ?>
			<div class="col-lg-4 col-sm-6 col-xs-12">
				<a href="<?php echo base_url("tekne-kiralama/bilgiler/".seo($model["title"])."/".$model["id"]);?>" title="">
                                    <img src="<?php echo $model["fotograf"];  ?>" alt="" class="thumbnail img-responsive"/></a>
				
                                
                                    
                                    
                                <div class="carousel-caption">
                                    <a href="<?php echo base_url("tekne-kiralama/bilgiler/".seo($model["title"])."/".$model["id"]);?>" title=""> <h4><?php echo $model["title"]; ?></h4> </a>
                              </div>
			</div>
			<?php } ?>
      
    
    </div>
  </div>  
 
