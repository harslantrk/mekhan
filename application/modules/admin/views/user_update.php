<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>admin">Anasayfa</a></li>
            <li><a>Bilgileri Düzenle</a></li>
        </ol>
    </div>
    <div class="col-lg-2"></div>
</div>

<?php include "assets/msg.php" ?>

<?php foreach($user as  $u):?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
	    <div class="col-lg-12">
	        <div class="ibox float-e-margins">
	            <div class="ibox-title">
	                <h5>Bilgileri Düzenle</h5>
	            </div>
	            <div class="ibox-content">
	                <form  id="validate-edit" method="POST" class="form-horizontal upload_form">
	                	<input type="hidden" name="id" value="<?=$u->id?>">
	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Tam İsim <span style="color:red">*</span></label>
	                        <div class="col-sm-10"><input type="text" name="fullname" value="<?=$u->fullname?>" class="form-control required"></div>
	                    </div>
	                    <div class="hr-line-dashed"></div>
	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Email <span style="color:red">*</span></label>
	                        <div class="col-sm-10"><input type="text" name="email" value="<?=$u->email?>" class="form-control required email"></div>
	                    </div>
	                    <div class="hr-line-dashed"></div>
	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Kullanıcı Adı <span style="color:red">*</span></label>
	                        <div class="col-sm-10"><input type="text" name="username" value="<?=$u->username?>" class="form-control required"></div>
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
	                        <div class="col-sm-10"><input type="text" name="tel" value="<?=$u->tel?>" class="form-control" data-mask="0999 999 99 99"></div>
	                    </div>
	                    <div class="hr-line-dashed"></div>
	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Profil Resmi</label>
	                        <div class="col-sm-4"><input name="file" id="file" type="file" class="filestyle"  data-buttonBefore="true"></div>
	                        <div class="col-sm-6" style="min-height:35px"><button type="button" class="btn btn-primary" onclick="UploadImg('user_add_img');" style="margin-left:-10px;"><i class="fa fa-upload"></i> Resim Güncelle</button></div>
	                        <label class="col-sm-2 control-label">&nbsp;</label>
	                        <div class="col-sm-10 lightBoxGallery" id="img_div"><?=$img_list;?></div>
	                    </div>
	                    <div class="hr-line-dashed"></div>
						<div class="form-group">
	                    	<label class="col-sm-2 control-label">Aktif Pasif</label>
	                        <div class="col-sm-10"><input name="status" value="1" type="checkbox" class="js-switch" <?php if($u->status==1){echo "checked";}?> <?php if($u->id==1 || $u->id==$this->session->userdata('id')){echo "disabled";}?>/></div>
	                    </div>

	                    <div class="hr-line-dashed"></div>
	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label" style="cursor:pointer">Yetkilendirme <br> <input type="checkbox" id="checkAll" style="display:none;" <?php if($u->id==$this->session->userdata('id')){echo "disabled";}?>>Seç</label>
		                    <div class="col-sm-10">

		                    	<div class="col-md-6 col-lg-4"><label>
	                            	<input type="checkbox" value="1" name="gallery_insert" class="i-checks" <?php if(strpos($u->gallery,'insert')!==false) {echo "checked";} ?> <?php if($u->id==$this->session->userdata('id')){echo "disabled";}?> > 
	                            	Galeri Ekleme </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label>
	                        		<input type="checkbox" value="1" name="gallery_list" class="i-checks" <?php if(strpos($u->gallery,'list')!==false) {echo "checked";} ?> <?php if($u->id==$this->session->userdata('id')){echo "disabled";}?> > 
	                        		Galeri Listeleme </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label>
	                        		<input type="checkbox" value="1" name="gallery_status" class="i-checks" <?php if(strpos($u->gallery,'status')!==false) {echo "checked";} ?> <?php if($u->id==$this->session->userdata('id')){echo "disabled";}?> > 
	                        		Galeri Durumu </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label>
	                        		<input type="checkbox" value="1" name="gallery_priority" class="i-checks" <?php if(strpos($u->gallery,'priority')!==false) {echo "checked";} ?> <?php if($u->id==$this->session->userdata('id')){echo "disabled";}?> > 
	                        		Galeri Öncelik </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label>
	                        		<input type="checkbox" value="1" name="gallery_update" class="i-checks" <?php if(strpos($u->gallery,'update')!==false) {echo "checked";} ?> <?php if($u->id==$this->session->userdata('id')){echo "disabled";}?> > 
	                        		Galeri Güncelleme </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label>
	                        		<input type="checkbox" value="1" name="gallery_delete" class="i-checks" <?php if(strpos($u->gallery,'delete')!==false) {echo "checked";} ?> <?php if($u->id==$this->session->userdata('id')){echo "disabled";}?> > 
	                        		Galeri Silme </label> </div>
	                        	<div class="hr-line-dashed" style="clear:both"></div>

	                        	<div class="col-md-6 col-lg-4"><label>
	                            	<input type="checkbox" value="1" name="customers_insert" class="i-checks" <?php if(strpos($u->customers,'insert')!==false) {echo "checked";} ?> <?php if($u->id==$this->session->userdata('id')){echo "disabled";}?> > 
	                            	Müşteri Ekleme </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label>
	                        		<input type="checkbox" value="1" name="customers_list" class="i-checks" <?php if(strpos($u->customers,'list')!==false) {echo "checked";} ?> <?php if($u->id==$this->session->userdata('id')){echo "disabled";}?> > 
	                        		Müşteri Listeleme </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label>
	                        		<input type="checkbox" value="1" name="customers_status" class="i-checks" <?php if(strpos($u->customers,'status')!==false) {echo "checked";} ?> <?php if($u->id==$this->session->userdata('id')){echo "disabled";}?> > 
	                        		Müşteri Durumu </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label>
	                        		<input type="checkbox" value="1" name="customers_priority" class="i-checks" <?php if(strpos($u->customers,'priority')!==false) {echo "checked";} ?> <?php if($u->id==$this->session->userdata('id')){echo "disabled";}?> > 
	                        		Müşteri Öncelik </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label>
	                        		<input type="checkbox" value="1" name="customers_update" class="i-checks" <?php if(strpos($u->customers,'update')!==false) {echo "checked";} ?> <?php if($u->id==$this->session->userdata('id')){echo "disabled";}?> > 
	                        		Müşteri Güncelleme </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label>
	                        		<input type="checkbox" value="1" name="customers_delete" class="i-checks" <?php if(strpos($u->customers,'delete')!==false) {echo "checked";} ?> <?php if($u->id==$this->session->userdata('id')){echo "disabled";}?> > 
	                        		Müşteri Silme </label> </div>
	                        	<div class="hr-line-dashed" style="clear:both"></div>

	                        	<div class="col-md-6 col-lg-4"><label>
	                            	<input type="checkbox" value="1" name="slider_insert" class="i-checks" <?php if(strpos($u->slider,'insert')!==false) {echo "checked";} ?> <?php if($u->id==$this->session->userdata('id')){echo "disabled";}?> > 
	                            	Slider Ekleme </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label>
	                        		<input type="checkbox" value="1" name="slider_list" class="i-checks" <?php if(strpos($u->slider,'list')!==false) {echo "checked";} ?> <?php if($u->id==$this->session->userdata('id')){echo "disabled";}?> > 
	                        		Slider Listeleme </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label>
	                        		<input type="checkbox" value="1" name="slider_status" class="i-checks" <?php if(strpos($u->slider,'status')!==false) {echo "checked";} ?> <?php if($u->id==$this->session->userdata('id')){echo "disabled";}?> > 
	                        		Slider Durumu </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label>
	                        		<input type="checkbox" value="1" name="slider_priority" class="i-checks" <?php if(strpos($u->slider,'priority')!==false) {echo "checked";} ?> <?php if($u->id==$this->session->userdata('id')){echo "disabled";}?> > 
	                        		Slider Öncelik </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label>
	                        		<input type="checkbox" value="1" name="slider_update" class="i-checks" <?php if(strpos($u->slider,'update')!==false) {echo "checked";} ?> <?php if($u->id==$this->session->userdata('id')){echo "disabled";}?> > 
	                        		Slider Güncelleme </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label>
	                        		<input type="checkbox" value="1" name="slider_delete" class="i-checks" <?php if(strpos($u->slider,'delete')!==false) {echo "checked";} ?> <?php if($u->id==$this->session->userdata('id')){echo "disabled";}?> > 
	                        		Slider Silme </label> </div>
	                        	<div class="hr-line-dashed" style="clear:both"></div>

		                    	<div class="col-md-6 col-lg-4"><label>
	                            	<input type="checkbox" value="1" name="pages_insert" class="i-checks" <?php if(strpos($u->pages,'insert')!==false) {echo "checked";} ?> <?php if($u->id==$this->session->userdata('id')){echo "disabled";}?> > 
	                            	Sayfa Ekleme </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label>
	                        		<input type="checkbox" value="1" name="pages_list" class="i-checks" <?php if(strpos($u->pages,'list')!==false) {echo "checked";} ?> <?php if($u->id==$this->session->userdata('id')){echo "disabled";}?> > 
	                        		Sayfa Listeleme </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label>
	                        		<input type="checkbox" value="1" name="pages_status" class="i-checks" <?php if(strpos($u->pages,'status')!==false) {echo "checked";} ?> <?php if($u->id==$this->session->userdata('id')){echo "disabled";}?> > 
	                        		Sayfa Durumu </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label>
	                        		<input type="checkbox" value="1" name="pages_priority" class="i-checks" <?php if(strpos($u->pages,'priority')!==false) {echo "checked";} ?> <?php if($u->id==$this->session->userdata('id')){echo "disabled";}?> > 
	                        		Sayfa Öncelik </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label>
	                        		<input type="checkbox" value="1" name="pages_update" class="i-checks" <?php if(strpos($u->pages,'update')!==false) {echo "checked";} ?> <?php if($u->id==$this->session->userdata('id')){echo "disabled";}?> > 
	                        		Sayfa Güncelleme </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label>
	                        		<input type="checkbox" value="1" name="pages_delete" class="i-checks" <?php if(strpos($u->pages,'delete')!==false) {echo "checked";} ?> <?php if($u->id==$this->session->userdata('id')){echo "disabled";}?> > 
	                        		Sayfa Silme </label> </div>
	                        	<div class="hr-line-dashed" style="clear:both"></div>

	                            <div class="col-md-6 col-lg-4"><label>
	                            	<input type="checkbox" value="1" name="users_insert" class="i-checks" <?php if(strpos($u->users,'insert')!==false) {echo "checked";} ?> <?php if($u->id==$this->session->userdata('id')){echo "disabled";}?> > 
	                            	Kullanıcı Ekleme </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label>
	                        		<input type="checkbox" value="1" name="users_list" class="i-checks" <?php if(strpos($u->users,'list')!==false) {echo "checked";} ?> <?php if($u->id==$this->session->userdata('id')){echo "disabled";}?> > 
	                        		Kullanıcı Listeleme </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label>
	                        		<input type="checkbox" value="1" name="users_status" class="i-checks" <?php if(strpos($u->users,'status')!==false) {echo "checked";} ?> <?php if($u->id==$this->session->userdata('id')){echo "disabled";}?> > 
	                        		Kullanıcı Durumu </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label>
	                        		<input type="checkbox" value="1" name="users_update" class="i-checks" <?php if(strpos($u->users,'update')!==false) {echo "checked";} ?> <?php if($u->id==$this->session->userdata('id')){echo "disabled";}?> > 
	                        		Kullanıcı Güncelleme </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label>
	                        		<input type="checkbox" value="1" name="users_delete" class="i-checks" <?php if(strpos($u->users,'delete')!==false) {echo "checked";} ?> <?php if($u->id==$this->session->userdata('id')){echo "disabled";}?> > 
	                        		Kullanıcı Silme </label> </div>
	                        	<div class="hr-line-dashed" style="clear:both"></div>

	                        	<div class="col-md-6 col-lg-4"><label>
	                        		<input type="checkbox" value="1" name="logs_list" class="i-checks" <?php if(strpos($u->logs,'list')!==false) {echo "checked";} ?> <?php if($u->id==$this->session->userdata('id')){echo "disabled";}?> > 
	                        		Log Listeleme </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label>
	                        		<input type="checkbox" value="1" name="definitions_update" class="i-checks" <?php if(strpos($u->definitions,'update')!==false) {echo "checked";} ?> <?php if($u->id==$this->session->userdata('id')){echo "disabled";}?> > 
	                        		Tanımlamalar </label> </div>
	                        	<div class="col-md-6 col-lg-4"><label>
	                        		<input type="checkbox" value="1" name="settings_update" class="i-checks" <?php if(strpos($u->settings,'update')!==false) {echo "checked";} ?> <?php if($u->id==$this->session->userdata('id')){echo "disabled";}?> > 
	                        		Ayar Güncelleme </label> </div>
			                </div>
			            </div>

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


<div class="modal inmodal" id="delApprove" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content animated flipInY">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">İptal</span></button>
                <h4 class="modal-title">Onayla</h4>
            </div>
            <div class="modal-body">
                <p><strong id="delete-caption">İsa</strong></p>
                <p>Kalıcı olarak silinecektir.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">İptal</button>
                <button type="button" class="btn btn-warning" id="delete-img" delete-function="user_img_delete" delete-id="" data-dismiss="modal"> <i class="fa fa-trash"></i> Sil</button>
            </div>
        </div>
    </div>
</div>