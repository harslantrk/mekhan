<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row wrapper border-bottom white-bg category-heading">
    <div class="col-lg-10">
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>admin">Anasayfa</a></li>
            <li>Mekan Düzenle</li>
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
	                <h5>Mekan Düzenle</h5>
	            </div>
	            <?php foreach($list as  $li):?>
	            <div class="ibox-content">
	                <form  id="validate-edit" method="POST" class="form-horizontal" enctype="multipart/form-data">
	                	<input type="hidden" name="id" value="<?=$li->id?>">
	                	
	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Mekan Adı <span style="color:red">*</span></label>
	                        <div class="col-sm-10"><input type="text" name="title" value="<?php if($this->input->post()){echo set_value('title');} else{ echo $li->title;} ?>" class="form-control required"></div>
	                    </div>

	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Mekan Telefonu <span style="color:red">*</span></label>
	                        <div class="col-sm-10"><input type="text" id="phone" name="telefon" value="<?php if($this->input->post()){echo set_value('telefon');} else{ echo $li->telefon;} ?>" class="form-control required"></div>
	                    </div>


	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Mekan Map Kodları <span style="color:red">*</span></label>
	                        <div class="col-sm-10"><input type="text" name="map" value="<?php if($this->input->post()){echo set_value('map');} else{ echo $li->map;}  ?>" class="form-control required"></div>
	                    </div>
	                    

	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Mekan Açıklama</label>
	                        <div class="col-sm-10"><textarea name="content" class="form-control" rows="10"><?php if($this->input->post()){echo set_value('content');} else{ echo $li->content;} ?></textarea></div>
	                    </div>

	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Kategori <span style="color:red">*</span></label>
	                        <div class="col-sm-10">
	                        	<select class="form-control required" name="kategori" style="width:100%;padding:5px;">
	                        		<option value="<?php if($this->input->post()){echo set_value('kategori');} else{ echo $li->kategori;} ?>" class="form-control required"><?php if($this->input->post()){echo set_value('kategori');} else{ echo $li->kategori;} ?></option>
	                        		<option value="Restaurant" class="form-control required">Restaurant</option>
	                        		<option value="Gece Kulübü" class="form-control required">Gece Kulübü</option>
	                        		<option value="Bar" class="form-control required">Bar</option>
	                        	</select>
	                        </div>
	                    </div>

	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">İl <span style="color:red">*</span></label>
	                        <div class="col-sm-4 kategori">
	                        	<select class="form-control required" name="il" style="width:100%;padding:5px;">
	                        	option value="><?php if($this->input->post()){echo set_value('il');} else{ echo $li->il;} ?>" class="form-control required"><?php if($this->input->post()){echo set_value('il');} else{ echo $li->il;} ?></option>
	                        		<option value="İstanbul" class="form-control required">İstanbul</option>
	                        		<option value="İzmir" class="form-control required">İzmir</option>
	                        		<option value="Antalya" class="form-control required">Antalya</option>
	                        	</select>
	                        </div>

	                        <label class="col-sm-2 control-label">İlçe <span style="color:red">*</span></label>
	                        <div class="col-sm-4 kategori">
	                        	<select class="form-control required" name="ilce" style="width:100%;padding:5px;">
	                        	option value="><?php if($this->input->post()){echo set_value('ilce');} else{ echo $li->ilce;} ?>" class="form-control required"><?php if($this->input->post()){echo set_value('ilce');} else{ echo $li->ilce;} ?></option>
	                        		<option value="Kadıköy" class="form-control required">Kadıköy</option>
	                        		<option value="Taksim" class="form-control required">Taksim</option>
	                        		<option value="Beşiktaş" class="form-control required">Beşiktaş</option>
	                        	</select>
	                        </div>
	                    </div>

	                     <div class="form-group">
	                    	<label class="col-sm-2 control-label">Extra <span style="color:red">*</span></label>
	                        <div class="col-sm-10"><input type="text" name="extra" value="<?php if($this->input->post()){echo set_value('extra');} else{ echo $li->extra;} ?>" class="form-control required"></div>
	                    </div>

	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Fiyat <span style="color:red">*</span></label>
	                        <div class="col-sm-10"><input type="text" name="fiyat" value="<?php if($this->input->post()){echo set_value('fiyat');} else{ echo $li->fiyat;} ?>" class="form-control required"></div>
	                    </div>


	                    <div class="hr-line-dashed"></div>

	                    <div class="form-group">
	                    	<label class="col-sm-2 control-label">Fotoğraf</label>
	                        <div class="col-sm-10" id="blueimp">


                            <div id="img_scheme">
								<div class="file-box">
									<input type="hidden" name="img" value="<?php if($this->input->post()){echo set_value('img');} else{ echo $li->img;} ?>" class="form-control">
									<div class="file">
											<span class="corner"></span>
											<div class="image">
												<a href="<?php if($this->input->post()){echo set_value('img');} else{ echo $li->img;} ?>">
												<img alt="image" class="img-responsive" src="<?php if($this->input->post()){echo set_value('img');} else{ echo $li->img;} ?>	"></a>
											</div>
											<div class="file-name">
												
												<div class="hr-line-dashed"></div>
												<button style="margin:0" class="btn btn-default" type="button" onclick="openCKFinder('file-box',$(this).parent().parent().parent().index())"><i class="fa fa-upload"></i>&nbsp;&nbsp;<span class="bold">Resim Seç</span></button>
												<button onclick="$('#approveHandler').attr('data-id',$(this).parent().parent().parent().index());" rel="tooltip" data-title="" title="" data-toggle="modal" data-target="#delHtml" class="delete-img btn btn-default btn-circle" type="button" style="position:absolute; margin:2px 0px 0px 20px;" data-original-title="Kaldır"><i class="fa fa-times"></i></button>
											</div>
									</div>
								</div>
							</div>
 
	                        
	                        </div>
	                    </div>

	                     <div class="hr-line-dashed"></div>

	                      <div class="form-group">
	                    	<label class="col-sm-2 control-label">Mekan Resimleri</label>
	                        <div class="col-sm-10">
	                        	<input type="file" name="mekan_resimler[]" multiple>

	                        </div>
	                    </div>

	                    <div class="hr-line-dashed"></div>


	                 
						
						<div class="col-sm-12"><?php 
						 //echo '<pre>'
							foreach ($resimler as $key => $value) {
							echo '<div style="background:url('.base_url() . 'uplo4ds/files/' . $value->image_path.');height:150px;background-size:cover;" id="kucuk-resim" class="col-sm-3 kucuk-resim">
							
							<button style="float:right;margin-top:10px;" rel="tooltip" title="Sil" data-toggle="modal" data-target="#delApprove" class="delete-item1 btn btn-danger btn-circle btn-outline" type="button" ><i class="fa fa-times"></i></button>
							<span class="data-id" style="display:none;">'.$value->id.'</span></div>';

						} ?>
						<div class="modal inmodal" id="delApprove" tabindex="-1" role="dialog" aria-hidden="true">
						    <div class="modal-dialog modal-sm">
						        <div class="modal-content animated flipInY">
						            <div class="modal-header">
						                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">İptal</span></button>
						                <h4 class="modal-title">Onayla</h4>
						            </div>
						            <div class="modal-body">
						                
						                <p>Kalıcı olarak silinecektir.</p>
						            </div>
						            <div class="modal-footer">
						                <button type="button" class="btn btn-white" data-dismiss="modal">İptal</button>
						                <button type="button" class="btn btn-warning" id="delete-item" delete-handler="delete_mekan_img" delete-id="" data-dismiss="modal"> <i class="fa fa-trash"></i> Sil</button>
						            </div>
						        </div>
						    </div>
						</div>
						</div>
	                    
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

<div id="img_scheme" style="display:none">
	<div class="file-box">
		<input type="hidden" name="img[]" value="/uploads/no-img.jpg" class="form-control">
	    <div class="file">
	            <span class="corner"></span>
	            <div class="image">
	            	<a href="/uploads/no-img.jpg">
	                <img alt="image" class="img-responsive" src="/uploads/no-img.jpg"></a>
	            </div>
	            <div class="file-name">
	                Title:<br/>
	                <input type="text" name="img_title[]" value="" class="form-control">
	                <br>
	                Buton:<br/>
	                <input type="text" name="img_btn[]" value="" class="form-control">
	                <br>
	                Link:<br/>
	                <input type="text" name="img_link[]" value="" class="form-control">
	                <br>
	                <div class="hr-line-dashed"></div>
	                <button style="margin:0" class="btn btn-default" type="button" onclick="openCKFinder('file-box',$(this).parent().parent().parent().index())"><i class="fa fa-upload"></i>&nbsp;&nbsp;<span class="bold">Resim Seç</span></button>
	                <button onclick="$('#approveHandler').attr('data-id',$(this).parent().parent().parent().index());" rel="tooltip" data-title="" title="" data-toggle="modal" data-target="#delHtml" class="delete-img btn btn-default btn-circle" type="button" style="position:absolute; margin:2px 0px 0px 20px;" data-original-title="Kaldır"><i class="fa fa-times"></i></button>
	            </div>
	    </div>
	</div>
</div>