<div align="center">
            <div id="printLogo">
                <img src="" border="0">
            </div>
            <div id="top_header">
                <div id="topSearch"></div>
            </div>
            <!-- new top section that is 100% width of browser window -->
            <div id="hp_largefeatured-container">
                <div class="hero">
                    <div class="background" style="background-image:url('http://emcbilisim.net/pirireis/assets/front/images/2962495.jpg');"></div>
                    <div class="container">
                        <div id="yachtSearchContainer">
                            <div id="ysc1" class="brown savedSearch">
                                <div class="searchTop"></div>
                                <!-- BEGIN NEW SEARCH PANEL CODE -->
                                <h1></h1>
                                <form method="post" id="araForm" action="<?=base_url("arama")?>">
                                    <fieldset>
                                       
                                        <ul>
                                            <li class="modelManufacturer">
                                                <input id="manEditbox" type="text" name="yatMetni" placeholder="Model veya Marka" />
                                            </li>
                                            <li class="conditionPower">
                                                <ul class="condition" title="Yat Durumu">
                                                    <span class="label">Yat Durumu</span><br/>
                                                    <li><label id="lbl-condition-all" class="label_status active"><input type="radio" name="yatDurumu" value="hepsi" checked="checked" class="typeRadio" />Hepsi</label></li>
                                                    <li><label id="lbl-condition-new" class="label_status"><input type="radio" name="yatDurumu" value="yeni" class="typeRadio" /><span id="select-is-new" >Yeni</span></label></li>
                                                    <li><label id="lbl-condition-used" class="label_status"><input type="radio" name="yatDurumu" value="ikinci_el" class="typeRadio" /><span id="select-is-used">2. El</span></label></li>
                                                </ul>
                                                <ul class="power" title="Yat Tipi">
                                                    <span class="label">Yat Tipi</span><br/>
                                                    <li><label id="lbl-type-all" class="label_type active"><input type="radio" name="yatTipi" value="hepsi" checked="checked" class="typeRadio" />Hepsi</label></li>
                                                    <li><label id="lbl-type-power" class="label_type"><input type="radio" name="yatTipi" value="motorlu" class="typeRadio" id="typePower"/><span id="select-type-power">Motorlu</span></label></li>
                                                    <li><label id="lbl-type-sail" class="label_type"><input type="radio" name="yatTipi" value="yelkenli" class="typeRadio" id="typeSail"/><span id="select-type-sail">Yelkenli</span></label></li>
                                                </ul>
                                            </li>
                                            <li class="length">
                                                <div class="leftSide">
                                                    <span class="label">Uzunluk</span>
                                                </div>
                                                <div class="rightSide">
                                                    <input type="text"  name="fromLength" value="" class="typeShortNum" />
                                                    <span class="to">--</span>
                                                    <input type="text" name="toLength" value="" class="typeShortNum" />

                                                </div>
                                            </li>
                                            <li class="year">
                                                <div class="leftSide">
                                                    <span class="label">Yaş</span>
                                                </div>
                                                <div class="rightSide">
                                                    <input type="text" name="fromYear" value="" class="typeShortNum" />
                                                    <span class="to">--</span>
                                                    <input type="text" name="toYear" value="" class="typeShortNum" />
                                                </div>
                                            </li>
                                            <li class="year">
                                                <div class="leftSide">
                                                    <span class="label">Fiyat</span>
                                                </div>
                                                <div class="rightSide" style="width: 224px">
                                                    <input type="text" name="fromPrice" value="" class="typeShortNum" />
                                                    <span class="to">--</span>
                                                    <input type="text" name="toPrice" value="" class="typeShortNum" />
                                                </div>
                                            </li>
                                            <li class="searchKeyword">
                                                <input id="nttEditbox" type="text" name="Ntt" value="Enter Keyword" onFocus="doClear(this)" />
                                            </li>
                                            <li class="submit">
                                                <button id="araSubmit" type="submit" class="basic">Ara</button>
                                            </li>
                                            <script language="JavaScript" type="text/javascript">
                                                var selectText='Select ...';function onClearForm(){if(populateSavedSearchOptions('savedSearchList')){var options=$('savedSearchList').options;var length=options.length;if(selectText!=options[length-1].text)
                                                addSelectOption(options,selectText);else
                                                options.selectedIndex=length-1;}}
                                            </script>
                                            <li class="clearForm">                                              
                                                <a onclick="document.forms['yachtsearch'].reset(); clearForm(this); onClearForm();" class="resetRight" id="btnClearForm">clear form</a>
                                                <script type="text/javascript">
                                                    if (!populateSavedSearchOptions('savedSearchList')) {   document.getElementById('btnClearForm').style.display='none';}
                                                </script>
                                            </li>
                                        </ul>
                                        <input type="hidden" id="" name="" value="" />
                                        <input type="hidden" name="" value="" />
                                        <input type="hidden" name="" value="" />
                                        <input TYPE="hidden" name="" value="">
                                        <input type="hidden" name="" value="" />
                                        <input type="hidden" name="" value="">
                                    </fieldset>
                                </form>

                                <script type="text/javascript">
                                    $( document ).ready(function() {
                                       $('#araSubmit').click(function(){
                                          $('#araForm').submit();
                                       });

                                       $(".label_status").click(function() {
                                           $(".label_status").attr("class","label_status");
                                           $(this).attr("class","label_status active");
                                       });

                                       $(".label_type").click(function() {
                                           $(".label_type").attr("class","label_type");
                                           $(this).attr("class","label_type active");
                                       });

                                    });
                                </script>
                             
                          
                                <!-- END NEW SEARCH PANEL CODE -->
                                <div class="searchBottom"></div>
                            </div>
                        </div>
                        <a class="feature" style="height: 450px;" href="#" data-reporting-impression-listing-type="premium featured boat ad" data-reporting-click-product-id="5797722" data-reporting-click-listing-type="premium featured boat ad" target="_blank">
                            <div class="image" style="background-image: url('http://emcbilisim.net/pirireis/assets/front/images/2962495.jpg');">
                                <img src="<?php echo base_url(); ?>/assets/front/images/2962495.jpg" alt="">
                            </div>
                            <div class="information">
                                <div class="title">Sunseeker 34 metre yat</div>
                                <div class="broker">Sunseeker tarafından hizmetinizde</div>
                                <button>Detaylar</button>
                            </div>
                        </a>
                    </div>
                    <div class="overlay"></div>
                </div>
            </div>
       
                <!-- id="leftColumn"    <div id="content_main">-->
                <div class="container">
                    <div>
                        <!-- START 1st newRow -->           
                        <div class="row">
                            <div id="featuredBoats">
                                <div id="ysc2" class="container savedSearch">
                                    
                                    <h2 style="margin: 29px 0 0 0;
    font-size: 24px;
    text-transform: uppercase;
    font-weight: 400;">En Çok Kiralananlar</h2>
    
    
    
                                    <ul> 
                                       
                                        
                                   
         <?php foreach($markalar as $marka){ ?> 
        
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
                                     
      <?php } ?>
  
</div>
                                        
                                    
                                            
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- END OF 1st newRow -->
                    </div>
                    <!--    </div>-->
                    <!-- Right Column -->
                    <div class="newRow secondaryBox footer-seo">
                        Boğazda yepyeni bir bakış açısıyla, kurumsal & bireysel ihtyaçlarınızı karşılamak için buradayız
                    </div>
                    <br/>
                    <div class="ad bp1 bottomAd" id="oas_x25"></div>
                </div>
            </div>