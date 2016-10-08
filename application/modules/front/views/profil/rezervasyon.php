	<div class="container" style="min-height:420px; margin-top:50px;">
		<div class="row">

			<div class="col-md-12">
				<div class="excerpt well">
				<h4 style="margin-bottom:20px;">
					<a href="">Rezervasyonlarım</a>
				</h4>
				<table class="table table-responsive table-striped">
					<tr style="background:white; color:black; font-size:20px;">
						<th>No</th>
						<th>Tür</th>
						<th>Tutar</th>
						<th>Tarih</th>
						<th>Kalkış</th>
						<th>Varış</th>
						<th>Durum</th>
					</tr>
					<?php foreach($rezervasyon  as  $rez){ ?>
					<tr>
						<td><?=$rez["odeme_siparis_no"]?></td>
						<td><?=$rez["tur"]?></td>
						<td><?=$rez["fiyat"]?> ₺</td>
						<td><?=tarih($rez["tarih"])?></td>
						<td><?=$rez["binisadres"]?></td>
						<td><?=$rez["inisadres"]?></td>
						<td>
							<?php
								if($rez["status"] == 0){
									echo '<i class="icon-time text-danger"> Beklemede</i>';
								}else{
									echo '<i class="icon-check text-info"> Onaylandı</i>';
								}
							?>
						</td>
					</tr>
					<?php } ?>

				</table>
				</div>
			</div>
		</div>
	</div>
