	<div class="container" style="min-height:420px; margin-top:50px;">
		<div class="row">

			<div class="col-md-offset-2 col-md-8 well">
					<div class="col-md-12">
						<h4 style="margin-bottom:20px;">
							<a href="">Profil Düzenle</a>
						</h4>
					</div>

					<?php if($this->session->flashdata("guncellemesaj")){ ?>
					<div class="col-md-12">
						<div class="bg-info" style="padding:20px; margin-top:20px"><strong><?php echo $this->session->flashdata("guncellemesaj"); ?></strong></div>
					</div>
					<?php } ?>
					<form action="<?php echo base_url("profil-duzenle"); ?>" method="post" autocomplate="off">
						<input type="hidden" value="profilduzenle" name="profilduzenle"/>
						<input type="hidden" name="id" value="<?=$_SESSION["uye"]["id"]?>" />
						<div class="form-group">
							<div class="col-md-12">
								<input type="text"  name="ad" class="form-control" placeholder="Adınız&Soyadınız" maxlength="300" value="<?=$profil["ad"]?>" required/>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-12">
								<input type="email" name="email" class="form-control" placeholder="Email Adresiniz" id="emailadresi" maxlength="300" value="<?=$profil["email"]?>" required/>
								<span id="emailkontrol"></span>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-12">
								<input type="text" name="tel" class="form-control" placeholder="Telefonunuz" maxlength="300" value="<?=$profil["tel"]?>" required/>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6">
								<select class="form-control" name="il" id="uyeolil" required>
									<option value="<?=$profil["il"]?>"><?=$profil["il"]?></option>
									<?php foreach($iller as $il){ ?>
									<option value="<?=$il["id"]?>"><?php echo $il["value"]; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-md-6">
								<select class="form-control" name="ilce" id="uyeolilce" required>
									<option value="<?=$profil["ilce"]?>"><?=$profil["ilce"]?></option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-12">
								<textarea name="adres" class="form-control" rows="4" placeholder="Adresiniz" maxlength="300" required><?=$profil["adres"]?></textarea>
							</div>
						</div>

						<div class="col-md-6">
							<button type="submit" class="btn btn-primary" id="giris">Kaydet</button>
						</div>

					</form>
			</div>
		</div>
	</div>
