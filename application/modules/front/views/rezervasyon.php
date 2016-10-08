<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="http://proje12.emcbilisim.net/daycleaning2/assets/front/css/bootstrap.min.css" rel="stylesheet">
<link href="http://proje12.emcbilisim.net/daycleaning2/assets/front/js/plugins/camera/css/camera.css" rel="stylesheet">
<link href="http://proje12.emcbilisim.net/daycleaning2/assets/front/js/plugins/magnific-popup/magnific-popup.css" rel="stylesheet">
<link href="http://proje12.emcbilisim.net/daycleaning2/assets/front/css/style.css" rel="stylesheet">
<link href="http://proje12.emcbilisim.net/daycleaning2/assets/front/css/responsive.css" rel="stylesheet">
<link href="http://proje12.emcbilisim.net/daycleaning2/assets/front/css/component.css" rel="stylesheet">
<link href="http://proje12.emcbilisim.net/daycleaning2/assets/front/css/datepicker3.css" rel="stylesheet">
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    <section class="popular-services main-container" style="background: url(<?php echo base_url(); ?>assets/front/images/marmaris.jpg) center top no-repeat; margin-bottom: -23%; margin-top:3%;">
    <?php include "assets/msg.php" ?>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h1 style="text-align:center; padding:0px 0px 30px; color: #fff !important;">mekhan.com ile deniz keyfi!</h1>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="padding: 0px;">
                    	<div class="panel panel-default col-lg-12" style="padding: 0px; border: none; box-shadow: none; background: none;">
                            <div class="panel-heading" style="background-color: rgba(245,245,245, 0.3); color: #fff !important;"><h3>Rezervasyon Yap</h3></div>
                            <div class="panel-body" style="margin-bottom: 60px; background: #fff;">
                            <style type="text/css">form fieldset label { font-size: 14px; }</style>
                                <form method="post" id="booking_online">
                                    <fieldset class="form-group">
                                        <label for="how_often_type" class="text-primary">Kiralama Sıklığı</label>
                                        <div class="clearfix"></div>
                                        <div class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-default active">
                                                <input type="radio" id="q156" name="how_often_type" value="1" checked="checked" /> Sadece Bir Kere
                                            </label>
                                            <label class="btn btn-default">
                                                <input type="radio" id="q157" name="how_often_type" value="2" /> Her Hafta
                                            </label>
                                            <label class="btn btn-default">
                                                <input type="radio" id="q158" name="how_often_type" value="3" /> 2 Haftada Bir
                                            </label>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="how_long" class="text-primary">Kiralama Süresi</label>
                                        <div class="clearfix"></div>
                                        <div class="input-group col-lg-3 col-md-6 col-xs-6">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="how_long">
                                                    <span class="glyphicon glyphicon-minus"></span>
                                                </button>
                                            </span>
                                            <input type="text" name="how_long" class="form-control input-number" value="4" min="4" max="10" style="text-align: center;">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="how_long">
                                                    <span class="glyphicon glyphicon-plus"></span>
                                                </button>
                                            </span>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="number_of_cleaners" class="text-primary">Servis Elemanı</label>
                                        <div class="clearfix"></div>
                                        <div class="input-group col-lg-3 col-md-6 col-xs-6">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="number_of_cleaners">
                                                    <span class="glyphicon glyphicon-minus"></span>
                                                </button>
                                            </span>
                                            <input type="text" name="number_of_cleaners" class="form-control input-number" value="1" min="1" max="10" style="text-align: center;">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="number_of_cleaners">
                                                    <span class="glyphicon glyphicon-plus"></span>
                                                </button>
                                            </span>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="need_kit" class="text-primary">İhtiyac olan temizlik malzemeleri nelerdir ?</label>
                                        <div class="clearfix"></div>
                                        <div class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-default active">
                                                <input type="radio" id="q156" name="need_kit" value="1" /> Evet
                                            </label>
                                            <label class="btn btn-default">
                                                <input type="radio" id="q157" name="need_kit" value="2" checked /> Hayır
                                            </label>
                                        </div>
                                    </fieldset>

                                    <fieldset class="form-group">
                                        <label for="date_start_day" class="text-primary">Tarih</label>
                                        <div class="clearfix"></div>
                                        <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        	<input type="text" class="form-control datetimepicker_input" name="date_start" />
                                            <!--<br />
                                            <select name="date_start_day" class="selectpicker" data-style="btn-default" style="display: none;">
                                                <?php
                                                for($i=1; $i<32; $i++)
                                                {
                                                ?><option value="<?php echo $i; ?>" <?php if(date('j')==$i){echo 'selected="selected"';} ?>><?php echo $i; ?></option><?php
                                                }
                                                ?>
                                            </select>-->
                                        </div>
                                        <!--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <select name="date_start_month" class="selectpicker" data-style="btn-default" style="display: none;">
                                                <?php
                                                for($j=1; $j<13; $j++)
                                                {
                                                ?><option value="<?php echo $j; ?>" <?php if(date('m')==$j){echo 'selected="selected"';} ?>><?php echo $j; ?></option><?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <select name="date_start_year" class="selectpicker" data-style="btn-default" style="display: none;">
                                                <option value="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></option>
                                            </select>
                                        </div>--></div>
                                    </fieldset>

                                    <fieldset class="form-group">
                                        <label for="hour_start" class="text-primary">Saat ?</label>
                                        <div class="clearfix"></div>
                                        <div class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-default active">
                                                <input type="radio" name="hour_start" value="08:00" checked="checked" /> 08:00
                                            </label>
                                            <label class="btn btn-default">
                                                <input type="radio" name="hour_start" value="09:00" /> 09:00
                                            </label>
                                            <label class="btn btn-default">
                                                <input type="radio" name="hour_start" value="13:00" /> 13:00
                                            </label>
                                            <label class="btn btn-default">
                                                <input type="radio" name="hour_start" value="14:00" /> 14:00
                                            </label>
                                            <label class="btn btn-default">
                                                <input type="radio" name="hour_start" value="15:00" /> 15:00
                                            </label>
                                        </div>
                                    </fieldset>

                                    <fieldset class="form-group">
                                        <label for="note" class="text-primary">Temizlikçi için herhangi bir not ?</label>
                                        <div class="clearfix"></div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <a href="javascript: void(0);" class="btn btn-default" id="note_yes">Evet</a>
                                                <a href="javascript: void(0);" class="btn btn-default" id="note_no">Hayır</a>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-lg-6" id="note_frame" style="display: none; margin-top: 10px;">
                                            <div class="row" style="margin-right: 0px;">
                                                <textarea class="form-control col-lg-11" id="note_textbox" placeholder="Add Your Note Here" name="note" style="resize: none;"></textarea>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="form-group">
                                        <label for="formGroupExampleInput2" class="text-primary">Telefon numaranız</label>
                                        <div class="clearfix"></div>
                                        <div class="col-lg-5">
                                            <div class="row">
                                                <input type="text" id="telephone" name="telephone" class="form-control col-lg-5 required" placeholder="Rezervasyon için aranacaksınız" />
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="row">

                                            </div>
                                        </div>
                                        <div class="col-lg-4" style="display: none; color: #f00; font-size: 10px; line-height: 34px;" id="warning_telephone_number"></div>
                                    </fieldset>
                                    <fieldset class="form-group" style="display: none;" id="customer_info_frame">
                                        <label for="formGroupExampleInput2" class="text-primary">Müşteri Bilgileri</label>
                                        <div class="clearfix"></div>
                                        <div class="col-lg-6">
                                            <div class="row" style="margin-right: 0px;">
                                                <input type="text" class="form-control col-lg-11 required" placeholder="Name" name="name" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <input type="text" class="form-control required" placeholder="Surname" name="surname" />
                                            </div>
                                        </div>
                                        <div class="clearfix"></div><br />
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <input type="text" class="form-control col-lg-11 required" placeholder="E-Mail" name="email" />
                                            </div>
                                        </div>
                                        <div class="clearfix"></div><br />
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="row" style="margin-right: 0px;">
                                                        <select name="country_id" id="country_id" class="form-control">
                                                        <?php
                                                        foreach($loc_countries as $loc_countries_one)
                                                        {
                                                        ?><option value="<?php echo $loc_countries_one['id']; ?>"><?php echo $loc_countries_one['en_us']; ?></option><?php
                                                        }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="row">
                                                        <select name="city_id" id="city_id" class="form-control">
                                                        <?php
                                                        foreach($loc_cities as $loc_cities_one)
                                                        {
                                                        ?><option value="<?php echo $loc_cities_one['id']; ?>"><?php echo $loc_cities_one['name']; ?></option><?php
                                                        }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div><br />
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <textarea class="form-control required" placeholder="Address (Please indicate the nearest landmark)" name="address" id="address" style="resize: none;"></textarea>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="form-group">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <button type="submit" class="btn btn-primary">Rezervasyonu Tamamla</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="padding: 0px;">
                        <div class="panel panel-default col-lg-11 col-lg-offset-1" style="padding: 0px; background: #fff; border: none; border-radius: 2px; box-shadow: none; margin-bottom: 50px; background: none;">
                            <div class="panel-heading" style="background-color: rgba(245,245,245, 0.3); text-align: right; color: #fff !important;"><h3>Rotalarımız</h3></div>
                            <div class="panel-body" style="text-align: justify; text-indent: 20px; background: #fff;">
                              <h4>Fethiye & Ölüdeniz</h4>
                                <p>Antik dönemde “Işık Yurdunun İnsanları” anlamına gelen Likyalılar bu kente sahip olmuş ve Telmessos adıyla anılmıştır. İlçe hudutlarında birbirinden güzel çoğunluğu denize dik olarak inen 180 koy-körfez bulunmaktadır. Kıyı uzunluğu 167 Km. olan ilçede 18 adet ada mevcut olup, bu adaların önemlileri Şövalye, Kızılada, Katrancı, Tersane, Domuz, Yassıca, Gemile, Ayanikola, Karacaören adalarıdır.

Ölüdeniz iki bölümden oluşur: Birinci bölüm koydan lagüne uzanan Belcekız ya da Belceğiz bölümüdür. Bu bölüm Ölüdeniz’in dalgalı bölümüdür. İkinci bölüm içerisinde lagünün bulunduğu gerçek Ölüdeniz bölümüdür. Bu bölüm sakin ve sığ olan bölümdür.</p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-11 col-lg-offset-1" style="padding: 0px; background: #fff;">
                            <section class="testimonials main-container">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 0px;">
                                    <h4 class="side-heading1 text-center header"> Müşterilerimizin Yorumları</h4>
                                    <!--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                                        <i class="fa fa-quote-left fa-2x"></i>
                                    </div>-->
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div id="testimonials-sldier" class="carousel slide" data-ride="carousel">
                                                <!--<ol class="carousel-indicators">
                                                    <li data-target="#testimonials-sldier" data-slide-to="0" class="active"></li>
                                                    <li data-target="#testimonials-sldier" data-slide-to="1" class=""></li>
                                                    <li data-target="#testimonials-sldier" data-slide-to="2" class=""></li>
                                                </ol>-->
                                                <div class="carousel-inner">
                                                    <div class="item text-center active">
                                                        <!--<div class="client-img">
                                                            <img class="img-circle" src="<?php echo base_url(); ?>assets/front/images/customers/1.png">
                                                        </div>
                                                        --><div class="caption">
                                                            <p>Hizmetinizi beğendim.</p>
                                                        </div>
                                                        <div class="client">Kemal / Dişçi</div>
                                                    </div>
                                                    <div class="item text-center">
                                                        <!--<div class="client-img">
                                                            <img class="img-circle" src="<?php echo base_url(); ?>assets/front/images/customers/2.png">
                                                        </div>-->
                                                        <div class="caption">
                                                            <p>Çalışanların iş disiplini çok iyiydi</p>
                                                        </div>
                                                        <div class="client">Selin / Mühendis</div>
                                                    </div>
                                                </div>
                                                <a class="left carousel-control" href="#testimonials-sldier" data-slide="prev"><span class="fa fa-chevron-left"></span></a>
                                                <a class="right carousel-control" href="#testimonials-sldier" data-slide="next"><span class="fa fa-chevron-right"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Content Ends -->
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
