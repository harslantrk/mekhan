<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>admin">Anasayfa</a></li>
            <li>Sayfa Düzenle</li>
        </ol>
    </div>
    <div class="col-lg-2"></div>
</div>

<?php include "assets/msg.php" ?>
<!-- CK -->
<script src="<?=base_url()?>assets/admin/ckeditor/ckeditor.js"></script>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
	    <div class="col-lg-12">
	        <div class="ibox float-e-margins">
	            <div class="ibox-title">
	                <h5>Sayfa Düzenle</h5>
	            </div>
	            <?php foreach($list as  $li):?>
	            <div class="ibox-content">
	                <form  id="validate-edit" method="POST" class="form-horizontal">
	                	<input type="hidden" name="id" value="<?=$li->id?>">
	                	<div class="form-group">
	                    	<label class="col-sm-2 control-label">Üst Sayfa</label>
	                        <div class="col-sm-10" id="page_top_id"><?=$top_id?></div>
	                    </div>
	                    <div class="hr-line-dashed"></div>

	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Başlık <span style="color:red">*</span></label>
	                        <div class="col-sm-10"><input type="text" name="title" value="<?php if($this->input->post()){echo set_value('title');} else{ echo $li->title;} ?>" class="form-control required"></div>
	                    </div>
	                    <div class="hr-line-dashed"></div>

	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Link <span style="color:red">*</span></label>
	                        <div class="col-sm-10"><input type="text" name="seo_url" value="<?php if($this->input->post()){echo set_value('seo_url');} else{ echo $li->seo_url;} ?>" class="form-control required"></div>
	                    </div>
	                    <div class="hr-line-dashed"></div>

	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">İçerik</label>
	                        <div class="col-sm-10"><textarea name="content" id="content" ><?php if($this->input->post()){echo set_value('content');} else{ echo $li->content;} ?></textarea></div>
	                    </div>
	                    <div class="hr-line-dashed"></div>

	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Meta Description</label>
	                        <div class="col-sm-10"><input type="text" name="description" value="<?php if($this->input->post()){echo set_value('description');} else{ echo $li->description;} ?>" class="form-control"></div>
	                    </div>
	                    <div class="hr-line-dashed"></div>

	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Meta Keywords</label>
	                        <div class="col-sm-10"><input type="text" name="keywords" value="<?php if($this->input->post()){echo set_value('keywords');} else{ echo $li->keywords;} ?>" class="form-control"></div>
	                    </div>
	                    <div class="hr-line-dashed"></div>

	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Öncelik</label>
	                        <div class="col-sm-10"><input type="number" name="priority" value="<?php if($this->input->post()){echo set_value('priority');} else{ echo $li->priority;} ?>" class="form-control"></div>
	                    </div>
	                    <div class="hr-line-dashed"></div>

						<div class="form-group">
	                    	<label class="col-sm-2 control-label">Durumu</label>
	                        <div class="col-sm-10"><input name="status" value="1" type="checkbox" class="js-switch" <?php if($this->input->post('status')){echo 'checked';} else if($li->status){echo 'checked'; } ?> /></div>
	                    </div>
	                    <div class="hr-line-dashed"></div>
	                    
	                    <div class="form-group">
	                        <div class="col-sm-4 col-sm-offset-2">
	                            <button class="btn btn-primary " type="submit" id="btn-save">Güncelle</button>
	                        </div>
	                    </div>
	                </form>
	            </div>
	            <?php endforeach; ?>
	        </div>
	    </div>
	</div>
</div>
<script type="text/javascript">
	CKEDITOR.replace( 'content', {
	    filebrowserBrowseUrl 	  : '<?=base_url()?>assets/admin/ckfinder/ckfinder.html',
	    filebrowserImageBrowseUrl : '<?=base_url()?>assets/admin/ckfinder/ckfinder.html?type=Images',
	    filebrowserFlashBrowseUrl : '<?=base_url()?>assets/admin/ckfinder/ckfinder.html?type=Flash',
	    filebrowserUploadUrl 	  : '<?=base_url()?>assets/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	    filebrowserImageUploadUrl : '<?=base_url()?>assets/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	    filebrowserFlashUploadUrl : '<?=base_url()?>assets/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
</script>
