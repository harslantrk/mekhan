
<div class="container" style="min-height:420px; margin-top: 100px;">
	<div class="col-md-offset-3 col-md-6">
		<?php if($this->session->flashdata("mesaj-hata")){?>
		<div class="col-md-12">
		<div class="alert alert-danger">
			<?php echo $this->session->flashdata("mesaj-hata"); ?>
		</div>
		</div>
		<?php } ?>
		<h3 style="text-align:center"><a href=""> Üye Girişi</a></h3>
		<form action="<?php echo base_url("uyegiris"); ?>" method="post" autocomplate="off">
			
			<div class="col-md-12">
				<div class="form-group">
					<input type="hidden" name="url" value="<?php echo base_url(); ?>" />
					<input type="text" name="email" class="form-control" placeholder="Email Adresiniz"  required/>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<input type="password" name="sifre" class="form-control" placeholder="Şifre" required/>
				</div>
			</div>
			<div class="col-md-6" align="center">
				<a href="" data-toggle="modal" data-target="#myModal" data-dismiss="modal cellspacing">Üye Değilim</a>
			</div>
			<div class="col-md-6" align="center">
				<a href="<?php echo base_url("sifremi-unuttum"); ?>">Şifremi Unuttum</a>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<button type="submit" class="btn btn-primary" id="giris" style="width:100%">Giriş</button>
				</div>
			</div>
		</form>
	</div>
</div>			


