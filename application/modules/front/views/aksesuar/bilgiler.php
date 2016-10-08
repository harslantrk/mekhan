

	<div class="container" style="min-height:700px" >
		<div class="row">
			<div class="col-md-7">
				<div class="row">
					<div class="col-md-6">
						<img src="<?php echo $aksesuar["fotograf"]; ?>" class="img-responsive" style="height:405px; object-fit:cover"/>
						<a href="" class="btn btn-default urunbuton" disabled><?=$aksesuar["title"]?></a> 
					</div>
					
					<div class="col-md-6">
						<h4>Açıklama</h4>
						<p><?=$aksesuar["aciklama"]?></p>
					</div>
				</div>
			</div>

			
			<div class="col-md-offset-1 col-md-4">
			<h4>Akıllı Panda Fiyatı</h4>
				<p class="fiyat" ><strong><?=$aksesuar["fiyat"]?> ₺</strong></p>
				<a href="<?php echo base_url("siparis/aksesuarsiparis/".$aksesuar["id"]); ?>" class="btn btn-default btn-normal btn-inline" style="width:100%">HEMEN SATIN AL</a>
				<hr/>
				<p style="font-size:18px;"><b>Alıcının Bilmesi Gereken Durumlar</b></p>
				<p style="font-size:15px;">
					<span class="yildiz">*</span> Kapıda ödeme ve banka havalesi ile yapılan ödemelere 10 tl indirim geçerlidir.<br/>
					<span class="yildiz">*</span> 75 tl ve üzerindeki siparişlerinizde kargo ücretsizdir .<br/>
					<span class="yildiz">*</span> Ürünlerin garanti süreleri içinde kullanıcı kaynaklı sorun olmaması durumunda iade talabinde bulunabilirsiniz.<br/> 
					<span class="yildiz">*</span> Sitemizde olmayan ürünleri bize bildirebilirsiniz sizin için uygun fiyata sitemize ekleyebiliriz.<br/>
				</p>
			</div>
	
		</div>
	</div>
