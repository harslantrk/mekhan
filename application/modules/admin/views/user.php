<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>admin">Anasayfa</a></li>
            <li><a>Kullanıcılar</a></li>
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
	                <h5>Kullanıcılar</h5>
	                <div class="ibox-tools">
	                    <a href="<?=base_url()?>admin/user/insert_user" class="btn btn-primary" style="margin: -10px -10px 0px 0px;"> <i class="fa fa-plus"></i> Kullanıcı Ekle</a>
	                </div>
	            </div>
	            <div class="ibox-content">
		            <table class="table table-striped table-bordered table-hover dataTables-js" >
			            <thead>
				            <tr>
				            	<th>ID</th>
				                <th>Tam isim</th>
								<th>Kullanıcı Adı</th>
								<th>E-mail</th>
								<th>İşlemler</th>
				            </tr>
			            </thead>
			            <tbody>
			            	<?php foreach($user as  $u):?>
					            <tr class="gradeX">
					            	<td class="data-id"><?=$u->id?></td>
					                <td class="data-caption"><?=$u->fullname?></td>
					                <td><?=$u->username?></td>
					                <td><?=$u->email?></td>
					                <td>
					                	<?php if(array_search('update',$this->session->userdata('auth')['users'])!==false){?>
					                		<button rel="tooltip" title="Düzenle" onclick="location='<?=base_url()?>admin/user/update_user/<?=$u->id?>'" class="btn btn-primary btn-circle btn-outline " type="button"><i class="fa fa-pencil"></i></button>
					                	<?php } ?>
					                	<?php if(array_search('status',$this->session->userdata('auth')['users'])!==false){?>
					                		<button rel="tooltip" title="Aktif/Pasif" ajax-handler="user_status" class="toggle-statu btn btn-default btn-circle btn-outline" type="button" <?php if($u->id==1){echo "disabled";}?>><i class="fa fa-<?php if($u->status==1){echo "check";}else{echo "uncheck";}?>"></i></button>
					                	<?php } ?>
					                	<?php if(array_search('delete',$this->session->userdata('auth')['users'])!==false){?>
					                		<button rel="tooltip" title="Sil" data-toggle="modal" data-target="#delApprove" class="delete-item btn btn-danger btn-circle btn-outline" type="button" <?php if($u->id==1){echo "disabled";}?>><i class="fa fa-times"></i></button>
					                	<?php } ?>
					                </td>
					            </tr>
				        	<?php endforeach; ?>
				        </tbody>
			        </table>
		        </div>
	        </div>
	    </div>
	</div>
</div>
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
                <button type="button" class="btn btn-warning" id="delete-item" delete-handler="user_delete" delete-id="" data-dismiss="modal"> <i class="fa fa-trash"></i> Sil</button>
            </div>
        </div>
    </div>
</div>