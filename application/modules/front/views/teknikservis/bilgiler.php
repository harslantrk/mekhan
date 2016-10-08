	<div class="container" style="min-height:700px" >
		<div class="row">
		<form action="<?php echo base_url("siparis/tamirsiparis"); ?>" method="post" id="calculateForm">
			<div class="col-md-7">
				<div class="row">
					<div class="col-md-6">
						<img src="<?php echo $bilgiler["fotograf"]; ?>" class="img-responsive" style="height:405px; object-fit:cover; "/>
						<a href="" class="btn btn-default urunbuton" disabled><?php echo $bilgiler["title"]; ?></a> 
					</div>
					
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-12">
							<h4>Arıza Tipi</h4>
							<hr/>
							</div>
								<input type="hidden" name="marka" value="<?php echo $bilgiler["marka"] ?>" />
								<input type="hidden" name="model" value="<?php echo $bilgiler["title"] ?>" />
								<input type="hidden" name="teklif" id="teklif2" value="" />
								<div class="col-md-5" >Kırık Ekran</div>
								<div class=" col-md-7">
									<select class="form-control" name="kirik-ekran">
										<option value="0">-- Yok --</option>
										<option value="<?=$bilgiler["kirikekran"]?>" >Var</option>
									</select>
								</div>
								
								
								<div class="col-md-5" >Sıvı Teması </div>
								<div class=" col-md-7">
									<select class="form-control" name="sivi-temasi">
										<option value="0">-- Yok --</option>
										<option value="<?=$bilgiler["sivitemasi"]?>" >Var</option>
									</select>
								</div>
								
								<div class="col-md-5" >Şarj Sorunu  </div>
								<div class=" col-md-7">
									<select class="form-control" name="sarj-sorunu">
										<option value="0">-- Yok --</option>
										<option value="<?=$bilgiler["sarjsorunu"]?>" >Var</option>
									</select>
								</div>
								
								<div class="col-md-5" >Ses Sorunu</div>
								<div class=" col-md-7">
									<select class="form-control" name="ses-sorunu">
										<option value="0">-- Yok --</option>
										<option value="<?=$bilgiler["sessorunu"]?>" >Var</option>
									</select>
								</div>
								
								<div class="col-md-5" >Pil Sorunu  </div>
								<div class=" col-md-7">
									<select class="form-control" name="pil-sorunu">
										<option value="0">-- Yok --</option>
										<option value="<?=$bilgiler["pilsorunu"]?>" >Var</option>
									</select>
								</div>
								
								<div class="col-md-5" >Tuş Sorunu </div>
								<div class=" col-md-7">
									<select class="form-control" name="tus-sorunu">
										<option value="0">-- Yok --</option>
										<option value="<?=$bilgiler["tussorunu"]?>" >Var</option>
									</select>
								</div>
								
								<div class="col-md-5" >Kamera Sorunu </div>
								<div class=" col-md-7">
									<select class="form-control" name="kamera-sorunu">
										<option value="0">-- Yok --</option>
										<option value="<?=$bilgiler["kamerasorunu"]?>" >Var</option>
									</select>
								</div>	
								
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5 tamir" style="margin-top:30px;" >6 Saat İçinde Tamir<strong style="color:red"> *</strong></div>
					<div class=" col-md-7" style="margin-top:30px;">
						<select class="form-control" name="alti-saat">
							<option value="0"> Hayır </option>
							<option value="<?=$bilgiler["tamirsure"]?>" >Evet</option>
						</select>
					</div>
					
					<div class="col-md-5 tamir">Yedek Telefon İstiyor musunuz?<strong style="color:red"> *</strong></div>
					<div class=" col-md-7">
						<select class="form-control" name="yedektelefon">
							<option value="0"> Hayır </option>
							<option value="<?=$bilgiler["yedektelefon"]?>" >Evet</option>
						</select>
					</div>
					
					<div class="col-md-12">
						<textarea name="aciklama" class="form-control" rows="6" placeholder="Listedekiler dışında bir arızanız var mı? "></textarea>
					</div>
					
				</div>
			</div>
			
			<div class="col-md-offset-1 col-md-4">
				<h4>Akıllı Panda Tamir Fiyatı</h4>
				<p class="fiyat"><strong id="teklif" class="teklif">0</strong> <strong> ₺</strong></p>
				<button type="submit" class="btn btn-default btn-normal btn-inline btn-block">TAMİR ETTİR</button>
				<hr/>
				<p style="font-size:18px;"><b>Bilinmesi Gereken Durumlar</b></p>
				<p style="font-size:15px;">
				<span class="yildiz">*</span> Belirtilen ücret ve süre değerlerimiz öngörülen değerlerdir.<br/>
				<span class="yildiz">*</span> Süreç sırasında değişiklik olması halinde öncelikle onayınız alınacaktır. <br/>
				<span class="yildiz">*</span> Ücret ve süre bilgisi hesaplanamayan arızalar için arıza tespit yapıldıktan sonra onayınız alınacaktır.<br/>
				
				<span class="yildiz">*</span> 6 saatte tamir süresi istanbul için gecerlidir.<br/>
				<span class="yildiz">*</span> Kargo ile gönderilen ürünler ürün teknik servise ulaştıktan sonra en geç 48 saat içerisinde gönderim yapılır.<br/>
				<span class="yildiz">*</span> Teknik servisimizde degişen her parça için 6 ay garantisi mevcuttur .<br/>
				<span class="yildiz">*</span> Üretici firma garantisi devam eden cihazlar için garantisi Firmanın anlaşmalı olduğu teknik servisler tarafından ve  
				firmanın garanti kuralları geçerli olur .talep halinde ikinci bir onay için size ulaşılır .<br/>
				<span class="yildiz">*</span>Sıvı Teması Olan Cihazlar İçin Ücretlendirme Teknik Servisimizin İncelemesinden Sonra Belirtilir.</span>
				</p>
				
			</div>
		</form>
		</div>
	</div>
	<div id="sonuc"></div>
	

	<script type="text/javascript">
	$(function(){
		var total = 0;
		var teklif = parseInt($("#teklif").text());
		$('#calculateForm select').on('change', function(event){
			$("#calculateForm select" ).each(function( index ) {
				total += parseInt($(this ).val());
			});
			$("#teklif").html(teklif + total);
			$("#teklif2").val(teklif + total);
			total = 0;
			event.preventDefault();
		});


	});
	</script>
