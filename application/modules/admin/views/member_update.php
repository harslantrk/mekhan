<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>admin">Anasayfa</a></li>
            <li><a>Üye Bilgileri</a></li>
        </ol>
    </div>
    <div class="col-lg-2"></div>
</div>

<?php include "assets/msg.php" ?>

<?php foreach($list as  $li):?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row wrapper border-bottom white-bg page-heading">

	        <div class="ibox float-e-margins">
	            <div class="ibox-title">
	                <h5>Üye Bilgileri</h5>
	            </div>


						<div class="col-sm-2">Adı Soyadı</div>
						<div class="col-sm-10"><?=$li->ad?></div>
						<br/>
						<div class="hr-line-dashed"></div>

						<div class="col-sm-2">Email</div>
						<div class="col-sm-10"><?=$li->email?></div>
						<br/>
						<div class="hr-line-dashed"></div>

						<div class="col-sm-2">Telefon</div>
						<div class="col-sm-10"><?=$li->tel?></div>
						<br/>
						<div class="hr-line-dashed"></div>
						
						<div class="col-sm-2">Adres</div>
						<div class="col-sm-10"><?=$li->adres?></div>
						<br/>
						<div class="hr-line-dashed"></div>

						<div class="col-sm-2">Eklenme Tarihi</div>
						<div class="col-sm-10"><p style="padding-top:7px;"><?=tarih($li->tarih)?></p></div>
						<br/>
						<div class="hr-line-dashed"></div>
	                    
	          
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
                <button type="button" class="btn btn-warning" id="delete-img" delete-function="member_img_delete" delete-id="" data-dismiss="modal"> <i class="fa fa-trash"></i> Sil</button>
            </div>
        </div>
    </div>
</div>