<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row wrapper border-bottom white-bg category-heading">
    <div class="col-lg-10">
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>admin">Anasayfa</a></li>
            <li>aksesuar Ekle</li>
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
	                <h5>aksesuar Ekle</h5>
	            </div>
	            <div class="ibox-content">
	                <form  id="validate-add" method="POST" class="form-horizontal">
					
	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Aksesuar Adı <span style="color:red">*</span></label>
	                        <div class="col-sm-10"><input type="text" name="title" class="form-control required"></div>
	                    </div>
	                    <div class="hr-line-dashed"></div>

	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Fotoğraf</label>
	                        <div class="col-sm-10" id="blueimp">


                            <div id="img_scheme">
								<div class="file-box">
									<input type="hidden" name="fotograf" value="<?php echo base_url(); ?>/uploads/no-img.jpg" class="form-control">
									<div class="file">
											<span class="corner"></span>
											<div class="image">
												<a href="/uploads/no-img.jpg">
												<img alt="image" class="img-responsive" src="<?php echo base_url(); ?>/uploads/no-img.jpg"></a>
											</div>
											<div class="file-name">
												
												<div class="hr-line-dashed"></div>
												<button style="margin:0" class="btn btn-default" type="button" onclick="openCKFinder('file-box',$(this).parent().parent().parent().index())"><i class="fa fa-upload"></i>&nbsp;&nbsp;<span class="bold">Resim Seç</span></button>
												
											</div>
									</div>
								</div>
							</div>
 
	                        
	                        </div>
	                    </div>
	                    <div class="hr-line-dashed"></div>
						
						 <div class="form-group">
	                    	<label class="col-sm-2 control-label">Açıklama</label>
							<div class="col-sm-10">
								<div class="row">
									<div class="col-sm-12"> 
										<textarea class="form-control" name="aciklama" rows="5" ></textarea>
									</div>
								</div>
							</div>
						</div>


						 <div class="form-group">
	                    	<label class="col-sm-2 control-label">Aksesuar Fiyatı</label>
	                        <div class="col-sm-10"><input type="number" name="fiyat" value="" class="form-control"></div>
	                    </div>
						<div class="hr-line-dashed"></div>
						
						
	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Öncelik</label>
	                        <div class="col-sm-10"><input type="number" name="priority" value="" class="form-control"></div>
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

<div class="modal inmodal" id="delHtml" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content animated flipInY">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">İptal</span></button>
                <h4 class="modal-title">Onayla</h4>
            </div>
            <div class="modal-body">
                <p><strong id="delete-caption"></strong></p>
                <p>Resim alanını kaldırılsın mı?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">İptal</button>
                <button data-id="" type="button" class="btn btn-warning" id="approveHandler" onclick="$('.file-box').eq($(this).attr('data-id')).remove();" data-dismiss="modal"> <i class="fa fa-trash"></i> Kaldır</button>
            </div>
        </div>
    </div>
</div>


