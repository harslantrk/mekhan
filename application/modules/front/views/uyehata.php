
<div class="container" style="min-height:550px;">
	<div class="col-md-offset-2 col-md-8">
	<form action="<?php echo base_url("uyegiris"); ?>" method="post">
		<h3 style="font-size:25px;"> Üye Girişi</h3>
		<input type="text" name="email" class="form-control" placeholder="Email Adresiniz" />

		<input type="password" name="sifre" class="form-control" placeholder="Şifre" />

		<button type="submit" class="btn btn-primary" id="giris" style="width:100%; height:80px; font-family:tahoma">Giriş</button>
	</form>
		<?php echo $this->session->flashdata("mesaj-hata"); ?>
	</div>
</div>			


