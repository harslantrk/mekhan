<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>admin">Anasayfa</a></li>
            <li><a>Üye Ekle</a></li>
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
	                <h5>Üye Ekle</h5>
	            </div>
	            <div class="ibox-content">
	                <form id="validate-add" method="POST" class="form-horizontal">
	                	<div class="form-group">
	                    	<label class="col-sm-2 control-label">Firma</label>
	                        <div class="col-sm-10"><input type="text" name="firm" value="<?=set_value('firm')?>" class="form-control"></div>
	                    </div>
	                    <div class="hr-line-dashed"></div>

	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Adı Soyadı<span style="color:red">*</span></label>
	                        <div class="col-sm-10"><input type="text" name="fullname" value="<?=set_value('fullname')?>" class="form-control required"></div>
	                    </div>
	                    <div class="hr-line-dashed"></div>
	                    
	                    <div class="form-group" id="county">
	                    	<?=$county_select?>
	                    </div>
	                    <div class="hr-line-dashed"></div>

	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Email</label>
	                        <div class="col-sm-10"><input type="text" name="member_email" value="<?=set_value('email')?>" class="form-control email"></div>
	                    </div>
	                    <div class="hr-line-dashed"></div>

	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Şifre</label>
	                        <div class="col-sm-10"><input type="password" name="password" value="<?=set_value('password')?>" class="form-control" minlength="4"></div>
	                    </div>
	                    <div class="hr-line-dashed"></div>

	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Tekrar Şifre</label>
	                        <div class="col-sm-10"><input type="password" name="passconf" value="<?=set_value('passconf')?>" class="form-control" minlength="4" equalTo="[name='password']"></div>
	                    </div>
	                    <div class="hr-line-dashed"></div>

	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Telefon</label>
	                        <div class="col-sm-10"><input type="text" name="tel" value="<?=set_value('tel')?>" class="form-control" data-mask="0999 999 99 99"></div>
	                    </div>
	                    <div class="hr-line-dashed"></div>

	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Gsm</label>
	                        <div class="col-sm-10"><input type="text" name="gsm" value="<?=set_value('gsm')?>" class="form-control" data-mask="0999 999 99 99"></div>
	                    </div>
	                    <div class="hr-line-dashed"></div>
	                    
	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Adres</label>
	                        <div class="col-sm-10"><textarea name="address" class="form-control"><?=set_value('address')?></textarea></div>
	                    </div>
	                    <div class="hr-line-dashed"></div>

	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Not</label>
	                        <div class="col-sm-10"><textarea name="note" class="form-control"><?=set_value('note')?></textarea></div>
	                    </div>
	                    <div class="hr-line-dashed"></div>

	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Durumu</label>
	                        <div class="col-sm-10"><input name="status" value="1" type="checkbox" class="js-switch" checked /></div>
	                    </div>
						<div class="hr-line-dashed"></div>


	                    <div class="form-group">
	                        <div class="col-sm-4 col-sm-offset-2">
	                            <button class="btn btn-primary " type="submit" id="btn-save">Kaydet</button>
	                        </div>
	                    </div>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>
</div>
