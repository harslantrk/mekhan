<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>admin">Anasayfa</a></li>
            <li><a>Hizmet Profilleri</a></li>
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
	                <h5>Hizmet Profilleri</h5>
	            </div>
	            <div class="ibox-content">
		            <div class="pull-right">
	                    <form method="post" id="list_form" action="<?=base_url('admin/services/service_list')?>"> 
	                    	<input type="hidden" name="form_control" id="form_control" value="1">     
	                      	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-5"></div>
	                      	<div class="col-xs-12 col-sm-5 col-md-5 col-lg-3">
	                        	<div class="input-group">
	                        		<input type="text" placeholder="Tarih Aralığı" name="datetime_services" id="datetime_services" value="<?=$this->session->userdata('datetime_services')?>" class="input-sm form-control">
	                        	</div>
	                        </div>
	                        
	                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-4">
		                        <div class="input-group"><input type="text" placeholder="Kayıt" name="query_services" id="query_services" value="<?=$this->session->userdata('query_services')?>" class="input-sm form-control"> 
		                        	<span class="input-group-btn"><button type="submit" class="btn btn-sm btn-primary"> Filtrele</button> </span>
		                        	<span class="input-group-btn"><button type="button" class="btn btn-default btn-sm" onclick="$('#form_control').val('reset'); $('#list_form').submit();">Sıfırla</button> </span>
		                    	</div>
	                      	</div>
	                    </form>
                    </div>
		            <table class="table table-striped table-bordered table-hover dataTables-js-sort" data-sort="desc">
			            <thead>
				            <tr>
				            	<th>ID</th>
				            	<th>Başlık</th>
				                <th>Üye</th>
				                <th>Tel</th>
				                <th>Eklenme Tarihi</th>
								<th>İşlemler</th>
				            </tr>
			            </thead>
			            <tbody>
			            	<?php if($list){foreach($list as  $li):?>
					            <tr class="gradeX">
					            	<td class="data-id"><?=$li['id']?></td>
					            	<td class="data-caption"><?=$li['title']?></td>
					                <td><?=$li['member']?></td>
					                <td><?=$li['tel']?></td>
					                <td><?=date("d-m-Y H:i",strtotime($li['times']))?></td>
					                <td>
					                	<?php if(array_search('update',$this->session->userdata('auth')['services'])!==false){?>
					                		<button rel="tooltip" title="Düzenle" onclick="location='<?=base_url()?>admin/services/update_service/<?=$li['id']?>'" class="btn btn-primary btn-circle btn-outline " type="button"><i class="fa fa-pencil"></i></button>
					                	<?php } ?>
					                	<?php if(array_search('status',$this->session->userdata('auth')['services'])!==false){?>
					                		<button rel="tooltip" title="Aktif/Pasif" ajax-handler="service_status" class="toggle-statu btn btn-default btn-circle btn-outline" type="button" ><i class="fa fa-<?php if($li['status']==1){echo "check";}else{echo "uncheck";}?>"></i></button>
					                	<?php } ?>
					                	<?php if(array_search('delete',$this->session->userdata('auth')['services'])!==false){?>
					                		<button rel="tooltip" title="Sil" data-toggle="modal" data-target="#delApprove" class="delete-item btn btn-danger btn-circle btn-outline" type="button" ><i class="fa fa-times"></i></button>
					                	<?php } ?>
					                </td>
					            </tr>
				        	<?php endforeach; } ?>
				        </tbody>
			        </table>

			        <div class="row">
				        <div class="col-sm-6">Toplam: <?=$total?></div>
				        <div class="col-sm-6"><?=$pagination?></div>
				    </div>
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
                <button type="button" class="btn btn-warning" id="delete-item" delete-handler="service_delete" delete-id="" data-dismiss="modal"> <i class="fa fa-trash"></i> Sil</button>
            </div>
        </div>
    </div>
</div>