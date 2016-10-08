<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>admin">Anasayfa</a></li>
            <li><a>Kullanıcı Ekle</a></li>
        </ol>
    </div>
    <div class="col-lg-2"></div>
</div>

<?php include "assets/msg.php" ?>

<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
	    <div class="col-lg-12">
	        <div class="ibox float-e-margins">
	            <div class="ibox-title">
	                <h5>Kullanıcı Ekle</h5>
	            </div>
	            <div class="ibox-content">
	                <form  id="validate-add" method="POST" class="form-horizontal">
	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Tam İsim <span style="color:red">*</span></label>
	                        <div class="col-sm-10"><input type="text" name="fullname" value="<?=set_value('fullname')?>" class="form-control required"></div>
	                    </div>
	                    <div class="hr-line-dashed"></div>
	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Email <span style="color:red">*</span></label>
	                        <div class="col-sm-10"><input type="text" name="email" value="<?=set_value('email')?>" class="form-control required email"></div>
	                    </div>
	                    <div class="hr-line-dashed"></div>
	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Kullanıcı Adı <span style="color:red">*</span></label>
	                        <div class="col-sm-10"><input type="text" name="username" value="<?=set_value('username')?>" class="form-control required"></div>
	                    </div>
	                    <div class="hr-line-dashed"></div>
	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Şifre <span style="color:red">*</span></label>
	                        <div class="col-sm-10"><input type="password" name="password" value="<?=set_value('password')?>" class="form-control required" minlength="4"></div>
	                    </div>
	                    <div class="hr-line-dashed"></div>
	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Tekrar Şifre<span style="color:red">*</span></label>
	                        <div class="col-sm-10"><input type="password" name="passconf" value="<?=set_value('passconf')?>" class="form-control required" minlength="4" equalTo="[name='password']"></div>
	                    </div>
	                    
	                    <div class="hr-line-dashed"></div>
	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Telefon</label>
	                        <div class="col-sm-10"><input type="text" name="tel" value="<?=set_value('tel')?>" class="form-control" data-mask="0999 999 99 99"></div>
	                    </div>

	                    <div class="hr-line-dashed"></div>
	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label" style="cursor:pointer">Yetkilendirme <br> <input type="checkbox" id="checkAll" style="display:none;">Seç</label>
		                    <div class="col-sm-10">

		                    	

	                        	<div class="col-md-6 col-lg-4"><label><input type="checkbox" value="1" name="customers_insert" class="i-checks" > Müşteri Ekleme </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label><input type="checkbox" value="1" name="customers_list" class="i-checks" > Müşteri Listeleme </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label><input type="checkbox" value="1" name="customers_status" class="i-checks" > Müşteri Durumu </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label><input type="checkbox" value="1" name="customers_priority" class="i-checks" > Müşteri Öncelik </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label><input type="checkbox" value="1" name="customers_update" class="i-checks" > Müşteri Güncelleme </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label><input type="checkbox" value="1" name="customers_delete" class="i-checks" > Müşteri Silme </label> </div>
	                        	<div class="hr-line-dashed" style="clear:both"></div>

	                        	<div class="col-md-6 col-lg-4"><label><input type="checkbox" value="1" name="gallery_insert" class="i-checks" > Galeri Ekleme </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label><input type="checkbox" value="1" name="gallery_list" class="i-checks" > Galeri Listeleme </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label><input type="checkbox" value="1" name="gallery_status" class="i-checks" > Galeri Durumu </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label><input type="checkbox" value="1" name="gallery_priority" class="i-checks" > Galeri Öncelik </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label><input type="checkbox" value="1" name="gallery_update" class="i-checks" > Galeri Güncelleme </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label><input type="checkbox" value="1" name="gallery_delete" class="i-checks" > Galeri Silme </label> </div>
	                        	<div class="hr-line-dashed" style="clear:both"></div>

	                        	<div class="col-md-6 col-lg-4"><label><input type="checkbox" value="1" name="slider_insert" class="i-checks" > Slider Ekleme </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label><input type="checkbox" value="1" name="slider_list" class="i-checks" > Slider Listeleme </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label><input type="checkbox" value="1" name="slider_status" class="i-checks" > Slider Durumu </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label><input type="checkbox" value="1" name="slider_priority" class="i-checks" > Slider Öncelik </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label><input type="checkbox" value="1" name="slider_update" class="i-checks" > Slider Güncelleme </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label><input type="checkbox" value="1" name="slider_delete" class="i-checks" > Slider Silme </label> </div>
	                        	<div class="hr-line-dashed" style="clear:both"></div>

	                        	<div class="col-md-6 col-lg-4"><label><input type="checkbox" value="1" name="pages_insert" class="i-checks" > Sayfa Ekleme </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label><input type="checkbox" value="1" name="pages_list" class="i-checks" > Sayfa Listeleme </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label><input type="checkbox" value="1" name="pages_status" class="i-checks" > Sayfa Durumu </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label><input type="checkbox" value="1" name="pages_priority" class="i-checks" > Sayfa Öncelik </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label><input type="checkbox" value="1" name="pages_update" class="i-checks" > Sayfa Güncelleme </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label><input type="checkbox" value="1" name="pages_delete" class="i-checks" > Sayfa Silme </label> </div>
	                        	<div class="hr-line-dashed" style="clear:both"></div>

	                            <div class="col-md-6 col-lg-4"><label><input type="checkbox" value="1" name="users_insert" class="i-checks" > Kullanıcı Ekleme </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label><input type="checkbox" value="1" name="users_list" class="i-checks" > Kullanıcı Listeleme </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label><input type="checkbox" value="1" name="users_status" class="i-checks" > Kullanıcı Durumu </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label><input type="checkbox" value="1" name="users_update" class="i-checks" > Kullanıcı Güncelleme </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label><input type="checkbox" value="1" name="users_delete" class="i-checks" > Kullanıcı Silme </label> </div>
	                        	<div class="hr-line-dashed" style="clear:both"></div>

	                        	<div class="col-md-6 col-lg-4"><label><input type="checkbox" value="1" name="logs_list" class="i-checks" > Log Listeleme </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label><input type="checkbox" value="1" name="definitions_update" class="i-checks" > Tanımlamalar </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label><input type="checkbox" value="1" name="settings_update" class="i-checks" > Ayar Güncelleme </label> </div>
			                </div>
			            </div>

	                    <div class="form-group">
	                        <div class="col-sm-4 col-sm-offset-2">
	                            <button class="btn btn-primary " type="submit" id="btn-save">Kullanıcı Kaydet</button>
	                        </div>
	                    </div>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>
</div>
