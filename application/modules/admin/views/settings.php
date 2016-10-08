<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>admin">Anasayfa</a></li>
            <li><a>Ayar Güncelle</a></li>
        </ol>
    </div>
    <div class="col-lg-2"></div>
</div>

<?php include "assets/msg.php" ?>

<?php foreach($settings as  $s):?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
	    <div class="col-lg-12">
	        <div class="ibox float-e-margins">
	            <div class="ibox-title">
	                <h5>Ayar Güncelle</h5>
	            </div>
	            <div class="ibox-content">
	                <form  id="validate-edit" method="POST" class="form-horizontal upload_form">
	                	<input type="hidden" name="id" value="<?=$s->id?>">

	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Title</label>
	                        <div class="col-sm-10"><input type="text" name="title" value="<?=$s->title?>" class="form-control "></div>
	                    </div>

	                    <div class="hr-line-dashed"></div>
	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Description</label>
	                        <div class="col-sm-10"><input type="text" name="description" value="<?=$s->description?>" class="form-control "></div>
	                    </div>

	                    <div class="hr-line-dashed"></div>
	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Keywords</label>
	                        <div class="col-sm-10"><input type="text" name="keywords" value="<?=$s->keywords?>" class="form-control "></div>
	                    </div>
						
						<div class="hr-line-dashed"></div>
	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Telefon</label>
	                        <div class="col-sm-10"><input type="text" name="tel" value="<?=$s->tel?>" class="form-control "></div>
	                    </div>

	                    <div class="hr-line-dashed"></div>
	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Telefon2</label>
	                        <div class="col-sm-10"><input type="text" name="tel2" value="<?=$s->tel2?>" class="form-control "></div>
	                    </div>

	                    <div class="hr-line-dashed"></div>
	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Email</label>
	                        <div class="col-sm-10"><input type="text" name="email" value="<?=$s->email?>" class="form-control email"></div>
	                    </div>

	                     <div class="hr-line-dashed"></div>
	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Adres</label>
	                        <div class="col-sm-10"><input type="text" name="address" value="<?=$s->address?>" class="form-control "></div>
	                    </div>

						<div class="hr-line-dashed"></div>
	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">SMTP Host</label>
	                        <div class="col-sm-10"><input type="text" name="smtp_host" value="<?=$s->smtp_host?>" class="form-control "></div>
	                    </div>

	                    <div class="hr-line-dashed"></div>
	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">SMTP Email</label>
	                        <div class="col-sm-10"><input type="text" name="smtp_email" value="<?=$s->smtp_email?>" class="form-control email"></div>
	                    </div>

	                    <div class="hr-line-dashed"></div>
	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">SMTP Şifre</label>
	                        <div class="col-sm-10"><input type="password" name="smtp_pass" value="<?=$s->smtp_pass?>" class="form-control "></div>
	                    </div>

						<div class="hr-line-dashed"></div>
	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Not</label>
	                        <div class="col-sm-10"><textarea name="note" class="form-control"><?=$s->note?></textarea></div>
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
<?php endforeach; ?>
