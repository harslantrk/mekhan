

	<div class="container" style="min-height:550px">

		<div class="row">

			<div class="col-md-12">

			<section class="lazy-load-box trigger effect-slidefromleft " data-delay="400" data-speed="800" style="-webkit-transition: all 800ms ease; -moz-transition: all 800ms ease; -ms-transition: all 800ms ease; -o-transition: all 800ms ease; transition: all 800ms ease;">

				<h3><a href="">Sepetim</a></h3>

			</section>

			

			<table class="table table-striped">

				<tr style="background:white; color:#54a506; font-size:20px;">

					<th>Sipariş Türü</th>

					<th>Açıklama</th>

					<th>Ek Seçenek</th>

					<th>Adet</th>

					<th>Sipariş Tutarı</th>

					<th>Sil</th>

				</tr>
				<?php 
					$toplam = 0;
				if($this->cart->contents()){ ?>
				<?php foreach($this->cart->contents() as $siparis){ 
					$secenek_verisi = json_decode($siparis["options"]["ek_secenek"]);
				?>
				<tr>

					<td><?=$siparis["name"]?></td>

					<td><?php echo $siparis["options"]["kiralama_s"]." | ".$siparis["options"]["kisi_s"]." | ".$siparis["options"]["tarih"]." | ".$siparis["options"]["binisadresi"]." - ".$siparis["options"]["inisadresi"] ?></td>

					<td><?php 
					if(empty($siparis["options"]["ek_secenek"])) 
						echo ""; 
					else {
						for($i=0;$i<count($secenek_verisi);$i++){
							echo $secenek_verisi[$i]." ₺ <br>";
						}
					}
					?></td>

					<td><?=$siparis["qty"]?></td>

					<td><?php 
					$alt_toplam = 0;
					if(empty($siparis["options"]["ek_secenek"])){
						$alt_toplam = $siparis["subtotal"];
						echo $alt_toplam;
					}else {
						$alt_toplam = intval($siparis["subtotal"]);
						for($j=0;$j<count($secenek_verisi);$j++){
							$sec_fiyat = explode("|",$secenek_verisi[$j]);
							$alt_toplam = intval($alt_toplam) + intval($sec_fiyat[1]);
						}
						echo $alt_toplam;
					}
					?> ₺</td>

					<td><a href="<?php echo base_url("siparissil/".$siparis["rowid"]); ?>" class="sil btn btn-xs btn-danger"><span class="icon-remove"><b style="color:white;">X</b></span></a></td>

				</tr>
				<?php 
					$toplam = intval($toplam) + intval($alt_toplam);
				}
				 ?>
				<?php }else { ?>
				<tr>
					<td colspan="4">Sepetinizde ürün yok.</td>
				</tr>
				<?php } ?>

				<tr style="background:white; color:#54a506; font-size:20px;">

					<th></th>

					<th></th>

					<th>Toplam</th>

					<th>: <span id="toplam"><?php 
						/*$toplam = intval($siparis["qty"]) * intval($alt_toplam); */
					echo $toplam; 
					/*echo $this->cart->format_number($this->cart->total());*/?> ₺</span></th>

					<th></th>

				</tr>

			</table>

			



			<?php 

			if($this->session->flashdata("mesaj") == null){ 

				if($this->cart->contents()){ ?>	

					<?php if(isset($_SESSION["uye"])){ 

							if($_SESSION["uye"]["status"] == 1){ ?>

								<button id="tamamla" class="btn col-md-offset-9 col-md-3">Alışverişi Tamamla</button>

							<?php }else{ ?>

								<button class="btn col-md-offset-9 col-md-3" data-toggle="modal" data-target="#uyelikonayla">Alışverişi Tamamla</button>

								

							<?php } ?>

						

					<?php }else{ ?>

						<button class="btn col-md-offset-9 col-md-3" data-toggle="modal" data-target="#uyegirisi">Alışverişi Tamamla</button>

					<?php } 

			 

					} 

			}else{ ?>
			<div class="row">
				 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				 	<div class="alert alert-danger">
				 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				 		<?php echo $this->session->flashdata("mesaj"); ?>
				 	</div>
				 </div>
			 </div>
			<?php } ?>
			<?php  if($this->session->flashdata("kart")){ ?>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="alert alert-success">
						<?php echo $this->session->flashdata("kart"); ?>
					</div>
				</div>
			</div>



			<?php } ?>

			<?php  if($this->session->flashdata("kart-hata")){ ?>

				<div class="bg-danger col-md-12" style="padding:20px; margin-top:20px"><strong><?php echo $this->session->flashdata("kart-hata"); ?></strong>

				</div>



			<?php } ?>



			</div>

		</div>



		<?php if(isset($_SESSION["uye"]) && $this->cart->contents()){ ?>

		<div class="row" id="siparisformu">

			<div class="col-md-offset-2 col-md-8">

				<div class="row well">

						<div class="col-md-12">

							<hr/>

							

							<img src="<?php echo base_url(); ?>assets/front/images/panda.png" class="img-responsive" style="margin-bottom:15px; float:left"/>

							<h4 style="text-align:center">Akıllı Panda Formu</h4>

							<hr/>

						</div>

						<form action="<?php echo base_url("odeme"); ?>" method="post" autocomplate="off">

							<input type="hidden"  name="siparis" value="siparis"/>

							<input type="hidden"  name="siparisno" value="<?php echo substr(uniqid(),0,8); ?>"/>

							<input type="hidden"  name="uyeid" value="<?php echo $_SESSION["uye"]["id"]; ?>"/>

							<div class="form-group">

								<div class="col-md-3">Adınız Soyadınız</div>	

								

								<div class="col-md-9">

									<input type="text" name="ad"   placeholder="Adınız&Soyadınız" class="form-control" id="ad" maxlength="255" value="<?=$_SESSION["uye"]["ad"]?>" required/>

								</div>

							

							</div>

							

							<div class="form-group">

								<div class="col-md-3">Telefon Numarası</div>

								<div class="col-md-9">

									<input type="tel" name="telefon" placeholder="Telefon" 	class="form-control" id="tel" maxlength="255" value="<?=$_SESSION["uye"]["tel"]?>" required/>

								</div>

								

							</div>

							

							<div class="form-group">

								<div class="col-md-3">Email</div>

								<div class="col-md-9">

									<input type="email" name="email" placeholder="Email" 	class="form-control" id="email" maxlength="255" value="<?=$_SESSION["uye"]["email"]?>" required/>

								</div>

							</div>

							<?php if($this->cart->format_number($this->cart->total()) >0 || $this->cart->format_number($this->cart->total()) == 0){ ?>

							<div class="form-group">

								<div class="col-md-3" style="margin:20px 0px">

									Ödeme Tipi

								</div>

								<div class="col-md-9" style="margin:20px 0px">

									<div class="row">

										<div class="col-md-6" class="kredikarti">

										  <label>

											<input type="radio" name="odemetipi" id="kredikarti" value="kredikarti">

												Kredi Kartı

										  </label>

										</div>

										
										<div class="col-md-6">

										  <label>

											<input type="radio" name="odemetipi" id="bankahavale" value="bankahavale" checked>

												Banka Havalesi

										  </label>

										</div>

										

										

									</div>

									

									<div class="row" id="kartodeme">

										<img src="<?=base_url("assets/front/images/guvenlialisveris.jpg");?>" class="img-responsive guvenlialisveris" />

										<div class="col-md-12">
											<div class="form-group">
											<input type="text" name="kartsahibi" class="form-control" placeholder="Kart Sahibi" />
											</div>
										</div>

										<div class="col-md-12">
											<div class="form-group">
											<input type="text" name="kartno" class="form-control" placeholder="Kart Numarası" />
											</div>
										</div>	

										<div class="col-md-3">

											 <input type="text" class="form-control" name="ay" min="1" max="5" placeholder="Ay" />

										</div>

										<div class="col-md-3">

											<input type="text" name="yil" class="form-control" placeholder="Yıl" />

										</div>

										<div class="col-md-6">

											<input type="text" name="cvc" class="form-control" placeholder="CVC Numarası" />

										</div>

									</div>



									<div class="row" id="bankaodeme">

										<h4 style="text-align: center; margin: 30px 0px;"><a>Hesap Bilgileri</a></h4>

										<table class="table responsive">

											<tr>

												<td>Photons İnternet Teknolojileri San. ve Tic. Ltd.  Şti.</td>

											</tr>	

											<tr>

												<td>Denizbank - Şişli Şubesi</td>

											</tr>

										</table>

										<table class="table responsive">	

											<tr>

	 											<td>Hesap No / Şube</td><td>:  3070 - 12585319-351</td>

	 										</tr>

											<tr>

	 											<td>IBAN No</td><td>:  TR06 0013 4000 0125 8531 9000 01</td>

	 										</tr>

 										</table> 

									</div>

								</div>

							</div>

							

							<?php }else{ ?>

							<div class="form-group">

								<div class="col-md-3">Banka Adı</div>

								<div class="col-md-9">

									<input type="text" name="banka"	placeholder="Banka Adı" class="form-control" id="iban" value="" required />

								</div>

							</div>

							

							<div class="form-group">

								<div class="col-md-3">İban Numaranız</div>

								<div class="col-md-9">

									<input type="text" name="iban"	placeholder="İban Numarası" class="form-control" id="iban" value="" required />

								</div>

							</div>

							<?php } ?>



							<?php foreach($this->cart->contents() as $siparis){ 

								$tur = $siparis["name"];

							}

							 ?>

									<div class="form-group">

										<div class="col-md-3">Teslimat Adresi</div>

										<div class="col-md-9">

											<textarea name="teslimatadres" placeholder="Adresiniz" class="form-control" id="adres" rows="4" required><?php echo $_SESSION["uye"]["adres"]." ".$_SESSION["uye"]["il"]."/".$_SESSION["uye"]["ilce"]; ?></textarea>

										</div>

									</div>

									

									<div class="form-group">

										<div class="col-md-3">Fatura Adresi</div>

										<div class="col-md-9">

											<textarea name="faturaadres" placeholder="Fatura Adresi" class="form-control" id="adres" rows="4" required><?=$_SESSION["uye"]["adres"]?></textarea>

										</div>

									</div>



							<div class="form-group">

								<div class="col-md-offset-3 col-md-9" style="margin-top:15px">

									<label><input type="checkbox" checked required> Okudum Kabul Ediyorum</label>

								</div>	

								<div class="col-md-offset-3 col-md-9" style="margin-bottom:15px;">

									<a href="<?php echo base_url("mesafeli-satis-sozlesmesi"); ?>" target="_blank" >Mesafeli Satış Sözleşmesi</a>

								</div>

								

							</div>

							<div class="form-group">

								<div class="col-md-3">Açıklama</div>

								<div class="col-md-9">

									<textarea name="aciklama"	placeholder="Herhangi bir notunuz var mı?" class="form-control" id="aciklama" rows="5"></textarea>

								</div>

							</div>

							

							<div class="form-group">

								<div class="col-md-12">

									<input 	type="submit" class="btn btn-default" value="Gönder" style="width:100%" id="gonder"/>

								</div>

							</div>

						</form>

				</div>	

			</div>

		</div>	

		<?php } ?>

	</div>
<script type="text/javascript">
$(document).ready(function(){
    $("#kartodeme").hide();
    $("#bankaodeme").show();
	
    $('input[type="radio"]').click(function(){
        if($(this).attr("value")=="kredikarti"){
            $("#bankaodeme").hide();
            $("#kartodeme").show();
        }
        if($(this).attr("value")=="bankahavale"){
            $("#kartodeme").hide();
            $("#bankaodeme").show();
        }
    });
});
</script>