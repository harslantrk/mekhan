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
                    <div class="col-sm-11 col-xs-10">
                        <span class="event-day-1">
                        <p class="day"><?php echo $gun; ?></p>
                        <p class="mounth"><?php echo $date["1"]; ?></p>
                        </span>
                        <span class="event-day"><h3><?php echo $gunName; ?></h3></span>
                    </div>
                    <div class="col-sm-1 col-xs-2">
                        <h3><?php echo $tarih->toplam ?></h3>
                    </div>
                </div>
            </div>

            <!-- Content Body col-sm-6 -->
                <div class="content-body-event ">
                    <div class="row" style="padding-left:15px;">
                    <?php
                    foreach ($post_etkinlikler as $key => $value)
                    {
                     if($value->tarih == $tarih->tarih)
                     {

                     if ($key%2==1) {
                     }
                
                 echo '
            
            <div class="col-md-6 col-sm-6 col-xs-6" style="padding-left:0px; min-height:460px;">

    
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="'.base_url() . 'etkinlik/'. $value->id. '/' . $value->link.'"><img src="'.$value->img.'" class="img-responsive"></a>
            </div>
            <div class="panel-body">
                <div class="place"><p>
                    '. mb_strimwidth($value->baslik, 0, 35, "...") .'
                    </p>
                </div>
                <div class="event"><p>
                    '. mb_strimwidth($value->icerik, 0, 70, "...")  .'
                </p></div>
            </div>
            <div class="panel-footer">
                <div class="feature">
                    <span class="views">
                          <img src="'.base_url().'assets/front/img/ico-eye.png" class="img-responsive">
                          
                      </span>
                      <span class="views-1">
                          35,208
                      </span>
                      <span class="likes">
                          <img src="'.base_url().'assets/front/img/ico-heart.png" class="img-responsive">
                      </span>
                      <span class="likes-1">
                          25
                      </span>
                      <span class="pictures">
                          <img src="'.base_url().'assets/front/img/ico-pictures.png" class="img-responsive">
                      </span>
                      <span class="pictures-1">
                          53
                      </span>

                      <span class="shares">
                          <img src="'.base_url().'assets/front/img/ico-share.png" class="img-responsive">
                      </span>
                      <span class="shares-1">
                          <a href="#">Paylaş</a>
                      </span>
                </div>
            </div>
</div>


                        </div>';
                    
                    if ($key%2==1) {

                        }







                     }
                }
                    echo "</div>";
                ?>
                </div>
            <?php } ?>