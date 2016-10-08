
<div class="container" style="min-height:420px;">
	<div class="col-md-offset-2 col-md-8">
		<form action="<?php echo base_url("uyeol"); ?>" method="post" autocomplate="off">
			<div class="col-md-12">
				<h3 style="text-align:center"><a href="">Üyelik Formu</a></h3>
			</div>
			<div class="form-group">
				<input type="hidden" name="url" value="<?php echo base_url(); ?>" />
				<div class="col-md-12">
					<input type="text"  name="ad" class="form-control" placeholder="Adınız&Soyadınız" maxlength="300" required/>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-md-12">
					<input type="email" name="email" class="form-control" placeholder="Email Adresiniz" id="emailadresi" maxlength="300" required/>
					<span id="emailkontrol"></span>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-md-12">
					<input type="text" name="tel" class="form-control" placeholder="Telefonunuz" maxlength="300" required/>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-md-6">
					<select class="form-control il" name="il" required>
						<option>-- İl --</option>
						<?php foreach($iller as $il){ ?>
						<option value="<?=$il["id"]?> <?php echo $il["value"]; ?>"><?php echo $il["value"]; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col-md-6">					
					<select class="form-control ilce" name="ilce" required>
						<option>-- İlçe --</option>		
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-md-12">
					<textarea name="adres" class="form-control" rows="4" placeholder="Adresiniz" maxlength="300" required></textarea>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-md-12">
				<input type="password" name="sifre" class="form-control" placeholder="Şifre" maxlength="300" required/>
				</div>
			</div>

			<div class="col-md-9" style="text-align:left">
				<div class="checkbox">
					<label>
						<input type="checkbox" id="sozlesme" checked required/> Kabul Ediyorum
					</label>
					
					 <a target="_blank" href="<?php echo base_url("uyelik-sozlesmesi"); ?>" style="font-size:13px">Üyelik Sözleşmesi</a>
				</div>
				
			</div>
			<div class="col-md-3">
				<button type="submit" class="btn btn-primary col-md-12" id="giris">Giriş</button>
			</div>
		</form>
	</div>			
		<?php echo $this->session->flashdata("mesaj-hata"); ?>
</div>			


