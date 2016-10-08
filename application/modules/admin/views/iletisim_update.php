<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row wrapper border-bottom white-bg category-heading">
    <div class="col-lg-10">
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>admin">Anasayfa</a></li>
            <li>İletişim</li>
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
	                <h5>Mesaj</h5>
	            </div>
	            <div class="ibox-content">
					<table class="table table-hover">
					<tr>
						<td style="width:30%;"></td>
						<td style="width:70%;"></td>
					</tr>
					<?php foreach($iletisim as $iletisim){ ?>
						<tr>
							<td> Ad Soyad</td>
							<td> : <?=$iletisim["ad"]?></td>
						</tr>
						
						<tr>
							<td> Telefon</td>
							<td> : <?=$iletisim["tel"]?></td>
						</tr>
						
						<tr>
							<td> Email</td>
							<td> : <?=$iletisim["email"]?></td>
						</tr>
						
						<tr>
							<td> Mesaj</td>
							<td> : <?=$iletisim["mesaj"]?></td>
						</tr>

						
						<tr>
							<td> Tarih</td>
							<td> : <?=$iletisim["tarih"]?></td>
						</tr>
					<?php } ?>
					</table>
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


