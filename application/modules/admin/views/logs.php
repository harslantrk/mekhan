<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>admin">Anasayfa</a></li>
            <li><a>Log Kayıtları</a></li>
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
	                <h5>Log Kayıtları</h5>
	            </div>
	            <div class="ibox-content">
	            	
	            	<div class="pull-right">
	                    <form method="post" id="list_form" action="<?=base_url('admin/logs/log_list')?>"> 
	                    	<input type="hidden" name="form_control" id="form_control" value="1">     
	                      	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-5"></div>
	                      	<div class="col-xs-12 col-sm-5 col-md-5 col-lg-3">
	                        	<div class="input-group">
	                        		<input type="text" placeholder="Tarih Aralığı" name="datetime_log" id="datetime_log" value="<?=$this->session->userdata('datetime_log')?>" class="input-sm form-control">
	                        	</div>
	                        </div>
	                        
	                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-4">
		                        <div class="input-group"><input type="text" placeholder="Kayıt" name="query_log" id="query_log" value="<?=$this->session->userdata('query_log')?>" class="input-sm form-control"> 
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
				                <th>Kullanıcı</th>
								<th>Tarih</th>
								<th>Kayıt</th>
								<th>Tipi</th>
				            </tr>
			            </thead>
			            <tbody>
			            	<?php if($list){foreach($list as  $li):?>
					            <tr>
					            	<td><?=$li['id']?></td>
					                <td><?=$li['user']?></td>
					                <td><?=$li['times']?></td>
					                <td><?=$li['log']?></td>
					                <td><?=$li['log_type']?></td>
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
