

	<div class="container" style="min-height:700px" >
			<div class="row">
				<div class="col-md-offset-1 col-md-10">
					<div class="row">
						<div class="col-md-6">
							<img src="<?=$bilgiler["fotograf"]?>" alt="" class="img-responsive" style="width:100%; height:405px; object-fit:cover"/>
							<a href="" title="" class="btn btn-default" target="_self" style="color:black; border:1px solid lightgrey; width:100%; background:white !important" disabled><?=$bilgiler["title"]?></a> 
							
						</div>
						
						<div class="col-md-6">
							<h4>Açıklama</h4>
							<p style="color:black;"><?=$bilgiler["aciklama"]?></p>
						</div>
						
						<div class="col-md-12">
							<hr/>
							<h4>Fiyat : <?=$bilgiler["fiyat"]?> TL</h4>
							
						</div>
						
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-offset-1 col-md-10">
					<div class="col-md-12">
						<div class="row">
							<hr/>
							<h4>Sipariş Formu</h4><hr/>
							<?php if($this->session->flashdata("mesaj") !== null){ ?>
							<div class="bg-info" style="padding:20px;"><strong><?php echo $this->session->flashdata("mesaj"); ?></strong></div>
							<hr/>
							<?php } ?>
							<form action="<?php echo base_url("aksesuarsiparis/aksesuarsiparis/".$this->uri->segment(3,0)."/".$bilgiler["id"]); ?>" method="post" autocomlate="off">
								<input type="hidden"  	name="siparis" 		value="siparis" id="siparis"required/>
								<input type="hidden"  	name="fiyat" 		value="<?=$bilgiler["fiyat"]?>" />
								<input type="hidden" 	name="bilgiler[]" 	value="<?=$bilgiler["aciklama"]?>" />
								<input type="hidden"  	name="urunadi" 	value="<?=$bilgiler["title"]?>"/>
								<input type="text"  	name="ad"       placeholder="Adınız Soyadınız" 	class="form-control" id="ad" required/>
								<input type="tel"   	name="telefon"  placeholder="Telefon" 			class="form-control" id="tel" required/>
								<input type="email" 	name="email" 	placeholder="Email" 			class="form-control" id="email" required/>
								
								<select class="form-control" name="il" id="il" required>
									<option value="">-- İl --</option>
									<?php foreach($iller as $il){ ?>
									<option value="<?=$il["id"]?>"><?php echo $il["value"]; ?></option>
									<?php } ?>
								</select>
								
								<select class="form-control" name="ilce" id="ilce" required>
									<option value="">-- İlçe --</option>		
								</select>
								
								<textarea name="adres"	placeholder="Teslim Alma Adresi" class="form-control" id="adres" rows="8" required></textarea>
								<input 	type="submit" class="btn btn-default" value="Gönder" style="width:100%" id="gonder"/>
							</form>
							
						</div>	
					</div>
				</div>
			</div>	
			
	</div>


	
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script>
		$(function(){
			$("#il").change(function(){	
				var il		= $("#il").val();

				var url = "<?php echo base_url("aksesuarsiparis/aksesuarurunsiparis"); ?>";
				 $.ajax({
				   type: "POST",
				   url: url,
				   data: {il : il}, 
				   success: function(data)
				   {
					  $("#ilce").html(data); 
				   }
				 });
			});
		});
	</script>
	

