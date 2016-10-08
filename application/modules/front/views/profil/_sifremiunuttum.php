
<div class="container" style="min-height:420px;">
	<div class="col-md-offset-3 col-md-6">
		<h3 style="text-align:center"><a href=""> Şifremi Unuttum</a></h3>
		<form action="<?php echo base_url("sifremi-unuttum"); ?>" method="post" autocomplate="off">

			<input type="text" name="email" class="form-control" placeholder="Email Adresiniz"  required/>
			<button type="submit" class="btn btn-primary" id="giris" style="width:100%">Devam</button>
		</form>
		
		<?php if($this->session->flashdata("mesaj-hata")){?>
		<div class="bg-danger">
			<?php echo $this->session->flashdata("mesaj-hata"); ?>
		</div>
		<?php } ?>
		
		<?php if($this->session->flashdata("mesaj")){?>
		<div class="bg-info">
			<?php echo $this->session->flashdata("mesaj"); ?>
		</div>
		<?php } ?>

	</div>
</div>			


