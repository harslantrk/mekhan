<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>admin">Anasayfa</a></li>
            <li><a>Müşteri Bilgileri Düzenle</a></li>
        </ol>
    </div>
    <div class="col-lg-2"></div>
</div>

<?php include "assets/msg.php" ?>

<?php foreach($list as  $li):?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
	    <div class="col-lg-12">
	        <div class="ibox float-e-margins">
	            <div class="ibox-title">
	                <h5>Müşteri Bilgileri Düzenle</h5>
	            </div>
	            <div class="ibox-content">
	                <form  id="validate-edit" method="POST" class="form-horizontal upload_form">
	                	<input type="hidden" name="id" value="<?=$li->id?>">
	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Müşteri <span style="color:red">*</span></label>
	                        <div class="col-sm-10"><input type="text" name="fullname" value="<?=$li->fullname?>" class="form-control required"></div>
	                    </div>
	                    <div class="hr-line-dashed"></div>

	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Email</label>
	                        <div class="col-sm-10"><input type="text" name="email" value="<?=$li->email?>" class="form-control email"></div>
	                    </div>
	                    <div class="hr-line-dashed"></div>
            
	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Şifre</label>
	                        <div class="col-sm-10"><input type="password" name="password" class="form-control " minlength="4"></div>
	                    </div>
	                    <div class="hr-line-dashed"></div>

	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Tekrar Şifre</label>
	                        <div class="col-sm-10"><input type="password" name="passconf" class="form-control " minlength="4" equalTo="[name='password']"></div>
	                    </div>
	                    <div class="hr-line-dashed"></div>

	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Telefon</label>
	                        <div class="col-sm-10"><input type="text" name="tel" value="<?=$li->tel?>" class="form-control" data-mask="0999 999 99 99"></div>
	                    </div>
	                    <div class="hr-line-dashed"></div>

	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Telefon2</label>
	                        <div class="col-sm-10"><input type="text" name="tel2" value="<?=$li->tel2?>" class="form-control" data-mask="0999 999 99 99"></div>
	                    </div>
	                    <div class="hr-line-dashed"></div>
	                    
	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Adres</label>
	                        <div class="col-sm-10"><textarea name="address" class="form-control"><?=$li->address?></textarea></div>
	                    </div>
	                    <div class="hr-line-dashed"></div>

	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Not</label>
	                        <div class="col-sm-10"><textarea name="note" class="form-control"><?=$li->note?></textarea></div>
	                    </div>
	                    <div class="hr-line-dashed"></div>

						<div class="form-group">
	                    	<label class="col-sm-2 control-label">Durumu</label>
	                        <div class="col-sm-10"><input name="status" value="1" type="checkbox" class="js-switch" <?php if($li->status==1){echo "checked";}?> /></div>
	                    </div>
	                    <div class="hr-line-dashed"></div>

	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Eklenme Tarihi</label>
	                        <div class="col-sm-10"><p style="padding-top:7px;"><?=date("d-m-Y H:i:s",strtotime($li->times))?></p></div>
	                    </div>
	                    <div class="hr-line-dashed"></div>

	                    <div class="form-group">
	                        <div class="col-sm-4 col-sm-offset-2">
	                            <button class="btn btn-primary " type="submit" id="btn-save">Bilgileri Kaydet</button>
	                        </div>
	                    </div>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>
</div>
<?php endforeach; ?>
