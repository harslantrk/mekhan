<div class="slider">
  <!-- Slider-->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <?php foreach ($img as $key => $val): ?>
    <li data-target="#myCarousel" data-slide-to="<?php echo $key; ?>" class="<?php if($key == 0) echo 'active'; ?>"></li>
  <?php endforeach; ?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
  
    
    <?php 
    
    foreach ($img as $key => $value)
    {     
      if ($key==0) {
        echo '<div class="item active">
            <a href="'.base_url() . 'etkinlik/' . $value->link.'"> <img src="'.base_url().$value->img.'" class="img-responsive"> </a>
        <div class="carousel-caption">
             <a href="'.base_url() . 'etkinlik/' . $value->link.'"> <h4>'. mb_strimwidth($value->baslik, 0, 70, "...") .'</h4> </a>
            <p>'. mb_strimwidth($value->icerik, 0, 150, "...").' </p>
        </div>
      </div>';
      }
      else {
        echo '<div class="item">
             <a href="'.base_url() . 'etkinlik/' . $value->link.'"><img src="'.base_url().$value->img.'" class="img-responsive">
        <div class="carousel-caption">
             <a href="'.base_url() . 'etkinlik/' . $value->link.'"><h4>'. mb_strimwidth($value->baslik, 0, 70, "...") .'</h4> </a>
            <p>'. mb_strimwidth($value->icerik, 0, 100, "...").' </p>
        </div>
      </div>';
      }
    }
       ?>
      
      
    
          
    
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Geri</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">İleri</span>
  </a>
</div>
<!-- End Slider-->
</div>