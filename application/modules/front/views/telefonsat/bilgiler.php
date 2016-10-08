
	
	<div class="container" style="min-height:700px" >
		<div class="row">
			<div class="col-md-7">
				<div class="row">
					<h2 style="font-size:25px; margin:0px 0px 0px 15px">Telefon Özellikleri</h2>
					<div class="col-md-6">
						<img src="<?php echo $telefon["fotograf"]; ?>" alt="" class="img-responsive" style="height:405px; object-fit:cover"/>
						<a href="" class="btn btn-default urunbuton"  disabled><?php echo $telefon["title"]; ?></a> 
					</div>
					
					<div class="col-md-6">
						<div class="row">
						
							<div class="col-md-3 bilgiler">IMEI No</div>
							<div class=" col-md-9" >
								<input type="text" name="imei" placeholder="IMEI Numarası" class="form-control" id="imei" required/>
							</div>
							
							<div class="col-md-3 bilgiler" >Rengi</div>
							<div class=" col-md-9" >
								<select class="form-control" id="renk">
									<?php 
									$renk = json_decode($telefon["renk"], true);
									foreach($renk as $r){ ?>
										<option value="<?=$r?>" ><?=$r?></option>
									<?php } ?>
								</select>
							</div>
							
						<form action="" method="post" id="calculateForm">	
							<div class="col-md-3 bilgiler">Durumu</div>
							<div class=" col-md-9">
								<select class="form-control" id="durum">
									<option value="<?=$telefon["cokiyi"]?> Çok İyi">Çok İyi</option>					
									<option value="0 İyi" selected>İyi</option>
									<option value="-<?=$telefon["sorunlu"]?> Sorunlu">Sorunlu</option>
								</select>
							</div>
							
							<div class="col-md-3 bilgiler">Hafıza</div>
							<div class=" col-md-9">
								<select class="form-control" id="hafiza">
								<?php if($telefon["gb8"] != 0){ ?>
									<option value="<?=$telefon["gb8"]?> 8GB" selected>8GB</option>
								<?php } ?>	
								
								<?php if($telefon["gb16"] != 0){ ?>
									<option value="<?=$telefon["gb16"]?> 16GB">16GB</option>	
								<?php } ?>	
								
								<?php if($telefon["gb32"] != 0){ ?>	
									<option value="<?=$telefon["gb32"]?> 32GB" >32GB</option>
								<?php } ?>	

								<?php if($telefon["gb64"] != 0){ ?>		
									<option value="<?=$telefon["gb64"]?> 64GB" >64GB</option>
								<?php } ?>	

								<?php if($telefon["gb128"] != 0){ ?>			
									<option value="<?=$telefon["gb128"]?> 128GB" >128GB</option>
								<?php } ?>	
								</select>
							</div>
							
							<div class="col-md-3 bilgiler">Garantisi</div>
							<div class=" col-md-9">
								<select class="form-control" id="garanti">
									<option value="0" selected>Yok</option>
									<option value="<?=$telefon["garanti"]?>">Var</option>
								</select>
							</div>

							<div class="col-md-3 bilgiler">Şarj</div>
							<div class=" col-md-9">
								<select class="form-control" id="sarj">
									<option value="0" selected>--Yok--</option>
									<option value="<?=$telefon["sarj"]?>">Usb/Şarj</option>
								</select>
							</div>
							
							<div class="col-md-3 bilgiler">Kulaklık</div>
							<div class=" col-md-9">
								<select class="form-control" id="kulaklik">
									<option value="0" selected>--Yok--</option>
									<option value="<?=$telefon["kulaklik"]?>">Kulaklık</option>
								</select>
							</div>
							<div class=" col-md-12">
							<textarea id="aciklama" class="form-control" rows="6" placeholder="Cep telefonunuz tamir gördü mü? Sıvı teması yaşandı mı? Listedekiler dışında bir notunuz var mı? "></textarea>
							</div>
						
						</div>
						
						
					</div>
					
					<div class="col-md-12" id="iyi-nedir">
						<div class="row">
							<div class="col-md-12">
								<div class="bg-info"> 
									<h3 style="font-size:25px; line-height:19px;">iyi nedir ?</h3>    
									<span style="font-size:15px; line-height:26px;">Telefon açılıyor ve düzgün çalışmasına engel fonksiyonel veya donanımsal  bir sorunu yok. Ekran, çerçeve ve kapakta herhangi bir kırık, derin bir çizik veya boya atması yok.     
									</span>
								</div>
							</div>
						</div>
					</div>	
					
					<div class="col-md-12" id="cok-iyi-nedir">
						<div class="row">
							<div class="col-md-12">
								<div class="bg-info"> 
									<h3 style="font-size:25px; line-height:19px;">çok iyi nedir ?</h3>     
									<span style="font-size:15px; line-height:26px;">Telefonun yazılımsal veya donanımsal herhangi bir sorunu yok. Kozmetik olarak çok iyi durumda (Ekran, kasa  ve kapakta kayda değer hiç bir çizik yok). Sıfır veya sıfıra yakın ürün.     
									</span>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-12" id="sorunlu-nedir">
						<div class="row">
							<div class="col-md-12">
								<div class="bg-info"> 
									<h3 style="font-size:25px; line-height:19px;">sorunlu cihaz nedir ?</h3>     
									<span style="font-size:15px; line-height:26px;">Telefon açılıyor fakat düzgün çalışmasına engel fonksiyonel veya fiziksel problemi var.  Bozuk dokunmatik, kırık ekran, eksik tuş/parça, çalışmayan donanım.
									</span>
								</div>
							</div>
						</div>
					</div>		

				</div>
			</div>

			<div class="col-md-offset-1 col-md-4">
				<h2 style="font-size:25px; margin:0 auto;">Akıllı Panda Teklifi</h2>
				<p class="fiyat">
					<strong id="teklif" class="teklif"><?=$telefon["fiyat"]?></strong> <strong> ₺</strong>
				</p>
				
				<a href="<?php echo base_url("telefonsat/kategorilerdegisim"); ?>" class="btn btn-info" id="degistir" style="width:49%; background:#54a506">DEĞİŞTİR</a>

				<a href="<?php echo base_url("siparis/sadecesatsiparis"); ?>" class="btn"  id="sat" style="width:49%">SADECE SAT</a>
				<br/><br/>
				<hr/>
				<p style="font-size:18px;"><b>Satıcının Bilmesi Gereken Durumlar</b></p>    
				<p><span class="yildiz">*</span> Akıllı Panda teklifimiz ,girmiş olduğunuz bilgiler üzerinden hesaplanacaktır. <br/>      
				<span class="yildiz">*</span> Akıllı Panda teklifi cihazınız Akıllı Panda Teknik Birimleri tarafından kontrol edilip onaylandıktan sonra geçerli olacaktır . <br/>           
				<span class="yildiz">*</span> Hatalı bilgiler ile gelen cihaza Akıllı Panda tarafından yeni teklif yapılır kullanıcıdan onay alınır .   <br/>   
				<span class="yildiz">*</span> Hatalı bilgilerle giriş yapılan telefon üyeye iade edilir ve kargo ücreti de telefon sahibine yansıtılır <br/>		
				</p>
			</form>	
			</div>
	
		</div>
	</div>
	<div id="sonuc"></div>
	<script>
		$(function(){
			$("#sat").click(function(){	
				var model		= "<?php echo $telefon["title"]; ?>";
				var marka		= "<?php echo $telefon["marka"]; ?>";
				var renk		= $("#renk").val();
				var fiyat		= $("#teklif").text();
				var durum 		= $("#durum").val();
				var garanti 	= $("#garanti").val();
				var imei		= $("#imei").val();
				var sarj		= $("#sarj").val();
				var kulaklik	= $("#kulaklik").val();
				var aciklama	= $("#aciklama").val();
				var hafiza		= $("#hafiza").val();
				var url = "<?php echo base_url("siparis/sadecesatsiparis"); ?>";
				
				
				 $.ajax({
				   type: "POST",
				   url: url,
				   data: {hafiza : hafiza, renk : renk, marka: marka, model: model, durum : durum, garanti : garanti, imei : imei, sarj : sarj, kulaklik : kulaklik, aciklama : aciklama, fiyat : fiyat}, 
				   success: function(data){
					  //$("#sonuc").html(data); 
					  //alert(data);
				   }
				 });
			});
			
			$("#degistir").click(function(){	
				var model		= "<?php echo $telefon["title"]; ?>";
				var marka		= "<?php echo $telefon["marka"]; ?>";
				var fiyat		= $("#teklif").text();
				var durum 		= $("#durum").val();
				var garanti 	= $("#garanti").val();
				var imei		= $("#imei").val();
				var sarj		= $("#sarj").val();
				var kulaklik	= $("#kulaklik").val();
				var aciklama	= $("#aciklama").val();
				var renk		= $("#renk").val();
				var hafiza		= $("#hafiza").val();
				var url = "<?php echo base_url("telefonsat/kategorilerdegisim"); ?>";
				
				
				 $.ajax({
				   type: "POST",
				   url: url,
				   data: {hafiza : hafiza, renk : renk, marka: marka, model: model, durum : durum, garanti : garanti, imei : imei, sarj : sarj, kulaklik : kulaklik, aciklama : aciklama, fiyat : fiyat}, 
				   success: function(data){
					  //$("#sonuc").html(data); 
					  //alert(data);
				   }
				 });
			});
		});
	</script>
	
	<script type="text/javascript">
			$(function(){
				var total = 0;
				var teklif = parseInt($("#teklif").text());
				$('#calculateForm select').on('change', function(event){
					$("#calculateForm select" ).each(function( index ) {
						total += parseInt($(this ).val());
					});
					$("#teklif").html(teklif + total);
					total = 0;
					event.preventDefault();
				});
				
				$("#sorunlu-nedir").hide();
				$("#cok-iyi-nedir").hide();
				
				$("#durum").change(function(){
					var durum = $("#durum").val();
					var t = parseInt(durum);

					if(t>0){
						$("#iyi-nedir").hide();
						$("#sorunlu-nedir").hide();
						$("#cok-iyi-nedir").show();
					}else if(t < 0){
						$("#iyi-nedir").hide();
						$("#cok-iyi-nedir").hide();
						$("#sorunlu-nedir").show();
					}else if(t == 0){
						$("#cok-iyi-nedir").hide();
						$("#sorunlu-nedir").hide();
						$("#iyi-nedir").show();
					}
					
					
				});
				 
			});
			
			
			</script>
