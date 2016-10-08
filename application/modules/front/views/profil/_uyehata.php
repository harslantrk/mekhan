
<div class="container" style="min-height:420px;">
	<div class="col-md-offset-3 col-md-6">
		<h3 style="text-align:center"><a href=""> Üye Girişi</a></h3>
		<form action="<?php echo base_url("uyegiris"); ?>" method="post" autocomplate="off">
			
			
			<input type="hidden" name="url" value="<?php echo base_url(); ?>" />
			<input type="text" name="email" class="form-control" placeholder="Email Adresiniz"  required/>
			<input type="password" name="sifre" class="form-control" placeholder="Şifre" required/>
			<button type="submit" class="btn btn-primary" id="giris" style="width:100%">Giriş</button>
		</form>
	
		<?php if($this->session->flashdata("mesaj-hata")){?>
		<div class="bg-danger">
			<?php echo $this->session->flashdata("mesaj-hata"); ?>
		</div>
		<?php } ?>
	</div>
</div>			


