<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>admin">Anasayfa</a></li>
            <li><a>Yorumlar</a></li>
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
	                <h5>Yorumlar</h5>
	            </div>
	            <div class="ibox-content">
		            <table class="table table-striped table-bordered table-hover dataTables-js" >
			            <thead>
				            <tr>
				            	<th style="width:5% !important">ID</th>
				                <th style="width:15% !important">Ad</th>
								<th style="width:70% !important">Yorum</th>
								<th>İşlemler</th>
				            </tr>
			            </thead>
			            <tbody>
			            	<?php foreach($yorumlar as  $s):?>
					            <tr class="gradeX">
					            	<td class="data-id"><?=$s["id"]?></td>
					                <td class="data-caption"><?=$s["ad"]?></td>
									<td class="data-caption"><?=$s["yorum"]?></td>
					                <td>
					                	<button rel="tooltip" title="Aktif/Pasif" ajax-handler="yorumlar_status" class="toggle-statu btn btn-default btn-circle btn-outline" type="button" ><i class="fa fa-<?php if($s["status"]==1){echo "check";}else{echo "uncheck";}?>"></i></button>
					                	
										<button rel="tooltip" title="Sil" data-toggle="modal" data-target="#delApprove" class="delete-item btn btn-danger btn-circle btn-outline" type="button" ><i class="fa fa-times"></i></button>
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
                <button type="button" class="btn btn-warning" id="delete-item" delete-handler="yorumlar_delete" delete-id="" data-dismiss="modal"> <i class="fa fa-trash"></i> Sil</button>
            </div>
        </div>
    </div>
</div>