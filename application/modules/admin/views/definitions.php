<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>admin">Anasayfa</a></li>
            <li><a>Tanımlamalar</a></li>
        </ol>
    </div>
    <div class="col-lg-2"></div>
</div>

<?php include "assets/msg.php" ?>

<?php foreach($definitions as  $li):?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
	    <div class="col-lg-12">
	        <div class="ibox float-e-margins">
	            <div class="ibox-title">
	                <h5>Tanımlamalar</h5>
	            </div>
	            <div class="ibox-content">
	                <form  id="validate-edit" method="POST" class="form-horizontal upload_form">

	                    <div class="form-group">
	                        <div class="col-sm-12" id="blueimp">
	                        <?php
	                        	if(!$li->definitions){$def="[]";}else{$def=$li->definitions;}
	                        	$def=json_decode($def, true);
	                        ?>
	                        <?php $i=0; foreach($def as $val){ ?>
	                        <div class="file-box">
                                <div class="file">
                                	<button onclick="$('#approveHandler').attr('data-id',$(this).parent().parent().index());" rel="tooltip" data-title="" title="" data-toggle="modal" data-target="#delHtml" class="delete-img btn btn-default btn-circle" type="button" style="position:absolute; left:100%; margin:-7px 0px 0px -24px;" data-original-title="Kaldır"><i class="fa fa-times"></i></button>
                                        <div class="file-name">
                                            Group:<br/>
                                            <input type="text" name="definitions_group[]" value="<?=$def[$i]['group']?>" class="form-control">
                                            <div class="hr-line-dashed"></div>
                                            ID:<br/>
                                            <input type="text" name="definitions_id[]" value="<?=$def[$i]['id']?>" class="form-control">
                                            <div class="hr-line-dashed"></div>
                                            Name:<br/>
                                            <input type="text" name="definitions_name[]" value="<?=$def[$i]['name']?>" class="form-control">
                                            <div class="hr-line-dashed"></div>
                                            Status:<br/>
                                            <input type="text" name="definitions_status[]" value="<?=$def[$i]['status']?>" class="form-control">
                                            <div class="hr-line-dashed"></div>
                                            Val1:<br/>
                                            <input type="text" name="definitions_val1[]" value="<?=$def[$i]['val1']?>" class="form-control">
                                            <div class="hr-line-dashed"></div>
                                            Val2:<br/>
                                            <input type="text" name="definitions_val2[]" value="<?=$def[$i]['val2']?>" class="form-control">
                                        </div>
                                </div>
                            </div>
                            <?php $i++; } ?>


                            <div class="file-box" id="file-box" onclick="clone_file_box()" style="cursor:pointer">
                                <div class="file">
                                    <div class="image">
                                        <img alt="image" class="img-responsive" src="<?=base_url()?>/assets/admin/img/add_bg.png" >
                                    </div>
                                </div>
                            </div>
 
	                        
	                        </div>
	                    </div>
	                    <div class="hr-line-dashed"></div>

	                    <div class="form-group">
	                        <div class="col-sm-4 col-sm-offset-5">
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

<div class="modal inmodal" id="delHtml" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content animated flipInY">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">İptal</span></button>
                <h4 class="modal-title">Onayla</h4>
            </div>
            <div class="modal-body">
                <p><strong id="delete-caption"></strong></p>
                <p>Tanımlama alanını kaldırılsın mı?</p>
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
	    <div class="file">
	    	<button onclick="$('#approveHandler').attr('data-id',$(this).parent().parent().index());" rel="tooltip" data-title="" title="" data-toggle="modal" data-target="#delHtml" class="delete-img btn btn-default btn-circle" type="button" style="position:absolute; left:100%; margin:-7px 0px 0px -24px;" data-original-title="Kaldır"><i class="fa fa-times"></i></button>
	            <div class="file-name">
	                Group:<br/>
                    <input type="text" name="definitions_group[]" value="" class="form-control">
                    <div class="hr-line-dashed"></div>
                    ID:<br/>
                    <input type="text" name="definitions_id[]" value="" class="form-control">
                    <div class="hr-line-dashed"></div>
                    Name:<br/>
                    <input type="text" name="definitions_name[]" value="" class="form-control">
                    <div class="hr-line-dashed"></div>
                    Status:<br/>
                    <input type="text" name="definitions_status[]" value="" class="form-control">
                    <div class="hr-line-dashed"></div>
                    Val1:<br/>
                    <input type="text" name="definitions_val1[]" value="" class="form-control">
                    <div class="hr-line-dashed"></div>
                    Val2:<br/>
                    <input type="text" name="definitions_val2[]" value="" class="form-control">
	            </div>
	    </div>
	</div>
</div>

<style>
	.file-name{font-size: 10px; padding:7px;}
</style>