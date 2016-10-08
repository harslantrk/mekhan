

	<div class="container" style="min-height:700px" >
		<div class="row">
			<div class="col-md-7">
				<div class="row">
					<div class="col-md-12">
						<img src="<?php echo $bilgiler["fotograf"]; ?>" alt="" class="img-responsive" style="height:405px; margin:0 auto; object-fit:cover"/>
						<a style="margin-top:20px;" href="" title="" class="btn btn-default urunbuton" disabled><?php echo $bilgiler["title"]; ?></a> 
					
						<form action="<?php echo base_url("siparis/degisimsiparis"); ?>" method="post" autocomplate="off">
							<input type="hidden" value="<?=$bilgiler["id"]?>" name="id" />
							<div class="row">
								<div class="col-md-6" style="margin-top:15px;">
									<select class="form-control" name="renk" required>
										<option value="">--Renk Seçin--</option>
										<?php 
										$renk = json_decode($bilgiler["renk"], true);
										foreach($renk as $r){ ?>
										
											<option><?=$r?></option>
										<?php } ?>
									</select>
								</div>

								<div class="col-md-6" style="margin-top:15px;">	
									<select class="form-control hafiza" name="fiyat" required>
											<?php if($bilgiler["kisi_basi"] != 0) { ?><option value="<?=$bilgiler["kisi_basi"]." 8GB"?>">8 Gb</option> <?php } ?>
											<?php if($bilgiler["ozel_k"] != 0) { ?><option value="<?=$bilgiler["ozel_k"]." 16GB"?>">16 Gb</option> <?php }  ?>
											<?php if($bilgiler["yolcu_k"] != 0) { ?><option value="<?=$bilgiler["yolcu_k"]." 32GB"?>">32 Gb</option> <?php } ?>
											<?php if($bilgiler["acenta_f"] != 0) { ?><option value="<?=$bilgiler["acenta_f"]." 64GB"?>">64 Gb</option> <?php } ?>
											<?php if($bilgiler["fiyat128gb"] != 0) { ?><option value="<?=$bilgiler["fiyat128gb"]." 128GB"?>">128 Gb</option> <?php } ?>
									</select>		
								</div>
							</div>	
							
					</div>
					<div class="col-md-12">
						<h4>Özellikler</h4>
						<table class="table table-hover table-striped">
						<?php 
						$ozellik = json_decode($bilgiler["ozellik"], true);
						
							foreach($ozellik as $key => $ozel){ ?>
							<tr>
								<td><strong><?php echo $key; ?></strong></td>
								<td>: <?php echo $ozel; ?></td>
							</tr>
							<?php } ?>
						</table>
					</div>
				</div>
			</div>

		<div class="col-md-offset-1 col-md-4">
			<h4>Telefon Fiyatı</h4>
			<p class="fiyat">
				<strong id="telfiyat">
					<?php 
						if($bilgiler["kisi_basi"] != 0){
							echo $bilgiler["kisi_basi"];

						}else if($bilgiler["ozel_k"] != 0){
							echo $bilgiler["ozel_k"];

						}else if($bilgiler["yolcu_k"] != 0){
							echo $bilgiler["yolcu_k"];

						}else if($bilgiler["acenta_f"] != 0){
							echo $bilgiler["acenta_f"];

						}else if($bilgiler["fiyat128gb"] != 0){
							echo $bilgiler["fiyat128gb"];
						}
					?>
				</strong><strong> ₺</strong>
			</p>
			<h4>Sizin Telefonunuzun Fiyatı</h4>
			<p class="fiyat"><strong id="sizinfiyat"><?php echo $_SESSION["telefon"]["fiyat"]; ?></strong><strong> ₺</strong></p>
			<h4>Ödeyeceğiniz Tutar</h4>
			<p class="fiyat" style="color:red !important"><strong id="tutar"></strong><strong> ₺</strong></p>

			<button class="btn col-md-12">HEMEN DEĞİŞTİR</button>

			<br/><br/><hr/>
			</div>
		</div>
	</div>
	</form>

	

	<script type="text/javascript">
	$(function(){
		var telfiyat = $("#telfiyat").text();
		var sizinfiyat = $("#sizinfiyat").text();
		var tutar = parseInt(telfiyat) - parseInt(sizinfiyat);
		$("#tutar").text(tutar);

		$(".hafiza").change(function(){
			var fiyat = $(".hafiza").val();
			$("#telfiyat").html(parseInt(fiyat));

			var telfiyat = $("#telfiyat").text();
			var sizinfiyat = $("#sizinfiyat").text();
			var tutar = parseInt(telfiyat) - parseInt(sizinfiyat);
			$("#tutar").text(tutar);

		});
		 
	});
	</script>
