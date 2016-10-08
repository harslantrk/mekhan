<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row wrapper border-bottom white-bg category-heading">
    <div class="col-lg-10">
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>admin">Anasayfa</a></li>
            <li>Rezervasyon Detay</li>
        </ol>
    </div>
    <div class="col-lg-2"></div>
</div>

<?php include "assets/msg.php" ?>
<!-- CK -->
<script src="<?=base_url()?>assets/admin/ckeditor/ckeditor.js"></script>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="ibox-content">
	<div class="row">
	    <div class="col-lg-12">

			<div class="col-md-6" style="background:white">
				<div class="ibox-title">
					<h5>Üye Bilgileri</h5>
				</div>
				<table class="table table-hover">
					<tr>
						<td> <strong>Ad Soyad</strong></td>
						<td> : <?=$siparis["ad"]?></td>
					</tr>

					<tr>
						<td> <strong>Telefon</strong></td>
						<td> : <?=$siparis["tel"]?></td>
					</tr>

					<tr>
						<td> <strong>Email</strong></td>
						<td> : <?=$siparis["email"]?></td>
					</tr>
				</table>
			</div>

			<div class="col-md-6" style="background:white">
				<div class="ibox-title">
					<h5>Rezervasyon Bilgileri</h5>
				</div>
				<table class="table table-hover">
					<tr>
						<td style="width:30%;">Rezervasyon Tarihi</td>
						<td style="width:70%;"> <?=tarih($siparis["tarih"])?></td>
					</tr>

					<tr>
						<td> <strong>Rezervasyon No</strong></td>
						<td> : <?=$siparis["siparisno"]?></td>
					</tr>
		
					<tr>
						<td> <strong>Sipariş No</strong></td>
						<td> : <?=$siparis["odeme_siparis_no"]?></td>
					</tr>

					<tr>
						<td> <strong>Ek Seçenekler</strong></td>
						<td> : <?php 
						for($i=0;$i<count($secenek);$i++){
							$parcala = explode("|",$secenek[$i]);
							echo $parcala[0]." - ".$parcala[1]." ₺<br>";
						}
						//print_r($secenek);
						?></td>
					</tr>
		
					<tr>
						<td> <strong>Ücret</strong></td>
						<td> : <?=$siparis["fiyat"]?> ₺</td>
					</tr>

					<tr>
						<td> <strong>Ödeme Tipi</strong></td>
						<td> : <?=$siparis["odemetipi"]?> </td>
					</tr>

					<tr>
						<td> <strong>Kiralama Süresi</strong></td>
						<td> : <?=$siparis["kiralama_s"]?></td>
					</tr>

					<tr>
						<td> <strong>Kişi Sayısı</strong></td>
						<td> : <?=$siparis["kisi_s"]?></td>
					</tr>

					<tr>
						<td> <strong>Biniş Adresi</strong></td>
						<td> : <?=$siparis["binisadres"]?></td>
					</tr>

					<tr>
						<td> <strong>İniş Adresi</strong></td>
						<td> : <?=$siparis["inisadres"]?></td>
					</tr>

					<tr>
						<td> <strong>Rezervasyon Notu</strong></td>
						<td> : <?=$siparis["aciklama"]?> </td>
					</tr>
				</table>
			</div>

	    </div>

	</div>
	</div>
</div>
