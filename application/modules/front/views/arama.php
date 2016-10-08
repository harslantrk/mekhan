<div class="container" style="margin-top:80px;">
    <div class="row">
        <?php foreach($arama as $sayac){ 
                foreach ($sayac as $marka) {
        ?> 
        
        <div class="col-md-3">
            <div class="md-broker">   
        
        <a href="<?php echo base_url("tekne-kiralama/bilgiler/".seo($marka["title"])."/".$marka["id"]);?>" title="">
            <img src="<?php echo $marka["fotograf"];  ?>" alt="<?php echo $marka["title"];  ?>" title="<?php echo $marka["title"];  ?>" class="brokerPhoto">
            <div class="boatname">
               <?php echo $marka["title"];  ?>
            </div>
        </a>
        <div class="details">
            <div class="price">
                <?php
                if ($marka["kisi_basi"] != 0) {
                echo $marka["kisi_basi"];
                } else if ($marka["ozel_k"] != 0) {
                echo $marka["ozel_k"];
                } else if ($marka["yolcu_k"] != 0) {
                echo $marka["yolcu_k"];
                } else if ($marka["acenta_f"] != 0) {
                echo $marka["acenta_f"];
                } else if ($marka["rehber_f"] != 0) {
                echo $marka["rehber_f"];
                } else if ($marka["toptan_f"] != 0) {
                echo $marka["toptan_f"];
                }
                ?>
                ₺ 
            </div>
            <div class="location">
                Marmaris
            </div>
        </div>
        <div class="featuredBroker">
            mekhan.com Yachting
        </div>
        </div>
       </div> 
                                     
        <?php 
                }
            }
        ?>
    </div>
</div>