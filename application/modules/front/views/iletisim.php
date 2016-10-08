 <section class="iletisim-section">
		<div class="row">
		<div class="col-sm-12">
		<iframe style="width:100%; height:300px" class="img-responsive" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3011.4895027904663!2d29.0388023157116!3d40.99265802833418!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cab87390c21ddd%3A0x93593aa313b8b985!2semcbilisim.com!5e0!3m2!1str!2str!4v1459342492749" width="600" height="450" frameborder="0" allowfullscreen=""></iframe>
		</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6">
				<h3>Bize Ulaşın</h3>
				<table class="table table-responsive">
					<tr>
						<td>
							<i class="fa fa-phone"></i> Telefon
						</td>
						<td>
							: <a href="tel:"><?php echo $_SESSION['front_tel']; ?></a>
						</td>
					</tr>
                     <tr>
                        <td><i class="fa fa-map-marker"></i> Adres</td>

                        <td>: <?php ECHO $_SESSION['front_address']; ?></td>
                    </tr>
					<tr>
						<td>
							<i class="fa fa-envelope"></i>
							Email
						</td>
						<td>
							: <a href=":mailto"><?php echo " ".$_SESSION['front_email']; ?></a>
						</td>
					</tr>
				</table>
				<table>
					<tr>
						<td></td>
						<td class="iletisim-social">
							<a href="">
								<i class="fa fa-lg fa-twitter"></i>
							</a>
							<a href="">
								<i class="fa fa-lg fa-facebook"></i>
							</a>
							<a href="">
								<i class="fa fa-lg fa-instagram"></i>
							</a>
						</td>
					</tr>

				</table>
			</div>
			<div class="col-md-6">
				<h3>İletişim Formu</h3>
				<?php if($this->session->flashdata("mesaj")){ ?>
				<div class="bg-info" style="padding:20px; margin-bottom:20px"><?=$this->session->flashdata("mesaj");?></div>
				<?php }?>

				<?php if($this->session->flashdata("mesaj-hata")){ ?>
				<div class="bg-danger" style="padding:20px; margin-bottom:20px"><?=$this->session->flashdata("mesaj-hata");?></div>
				<?php }?>
					<form action="<?php echo base_url("sendMessage"); ?>" method="post" class="wpcf7-form" autocomplate="off">
						<div class="inputblock">
							<p><span class="wpcf7-form-control-wrap your-name">
								<input type="text" name="ad" value="" size="40" class="form-control" placeholder="Adınız:" maxlength="100" required/></span> </p>
							<p><span class="wpcf7-form-control-wrap your-email">
								<input type="email" name="email" value="" size="40" class="form-control" wpcf7-validates-as-email" placeholder="E-mail:" maxlength="100" required/></span> </p>
							<p><span class="wpcf7-form-control-wrap your-phone">
								<input type="text" name="tel" value="" size="40" class="form-control" placeholder="Telefon:" maxlength="100" required/></span> </p>
						</div>
						<div class="textareablock">
							<p><span class="wpcf7-form-control-wrap your-message">
								<textarea name="mesaj" cols="40" rows="10" class="form-control" placeholder="Mesaj:" maxlength="1000" required></textarea></span> </p>
						</div>
						<div class="submitblock"><input type="submit" value="Gönder" class="btn-success"/> &nbsp; <input type="reset" class="btn-default" value="Temizle"/></div>
					</form>
			</div>
		</div>
</section>
<div style="margin-top:25px; height:100px;">
<hr>
</div>
