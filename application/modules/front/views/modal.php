

	<!-- Modal Üye ol-->

		<div class="modal fade modal-top10 col-md-6 col-md-offset-3 col-md-6 col-md-offset-3" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display:none; z-index: 999999;">

		  <div class="modal-dialog" role="document">

			<div class="modal-content col-md-6 col-md-offset-3">

			  <div class="modal-header">

				<button type="button" class="close col-md-1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

				<h4 class="modal-title" id="myModalLabel">Üye Ol</h4>

			  </div>

			  <div class="modal-body">

				<form action="<?php echo base_url("uyeol"); ?>" method="post" autocomplate="off">



					<div class="form-group">

						<input type="hidden" name="url" value="<?php if(isset($_SERVER["PATH_INFO"])){echo base_url($_SERVER["PATH_INFO"]);}else{echo base_url();} ?>" />

						<div class="col-md-12">

							<input type="text"  name="ad" class="form-control cellspacing col-md-6" placeholder="Adınız&Soyadınız" maxlength="300" required/>

						</div>

					</div>



					<div class="form-group">

						<div class="col-md-12">

							<input type="email" name="email" class="form-control cellspacing col-md-6" placeholder="Email Adresiniz" id="emailadresi" maxlength="300" required/>

							<span id="emailkontrol"></span>

						</div>

					</div>



					<div class="form-group">

						<div class="col-md-12">

							<input type="text" name="tel" class="form-control cellspacing col-md-6" placeholder="Telefonunuz" maxlength="300" required/>

						</div>

					</div>



					<div class="form-group">

						<div class="col-md-12">

							<select class="form-control il cellspacing col-md-6" name="il" required>

								<option>-- İl --</option>

								<?php foreach($iller as $il){ ?>

								<option value="<?=$il["id"]?> <?php echo $il["value"]; ?>"><?php echo $il["value"]; ?></option>

								<?php } ?>

							</select>

						</div>

						<div class="col-md-12">

							<select class="form-control ilce cellspacing col-md-6" name="ilce" required>

								<option>-- İlçe --</option>

							</select>

						</div>

					</div>



					<div class="form-group">

						<div class="col-md-12">

							<textarea name="adres" class="form-control cellspacing col-md-6" rows="4" placeholder="Adresiniz" maxlength="300" required></textarea>

						</div>

					</div>



					<div class="form-group">

						<div class="col-md-12">

						<input type="password" name="sifre" class="form-control cellspacing col-md-6" placeholder="Şifre" maxlength="300" required/>

						</div>

					</div>



			  </div>

			  <div class="modal-footer border-top0">

					<div class="col-md-12" style="text-align:left">

						<div class="checkbox">

							<label>

								<input type="checkbox" id="sozlesme" checked required/> Kabul Ediyorum

							</label>



							 <a target="_blank" href="<?php echo base_url("uyelik-sozlesmesi"); ?>" style="font-size:13px">Üyelik Sözleşmesi</a>

						</div>



					</div>

					<div class="col-md-12">

						<button type="submit" class="btn btn-primary col-md-4" id="giris">Giriş</button>

						<button type="button" class="btn btn-default cellspacing col-md-4" data-dismiss="modal">İptal</button>
					</div>

				</form>

			  </div>

			</div>

		  </div>

		</div>



	<!-- Üye Girişi-->

		<div class="modal fade modal-top10" id="uyegirisi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  style="display:none; z-index: 999999;">

		  <div class="modal-dialog" role="document">

			<div class="modal-content col-md-6 col-md-offset-3">

			  <div class="modal-header">

				<button type="button" class="close col-md-1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

				<h4 class="modal-title" id="myModalLabel" >Üye Girişi</h4>

			  </div>

			  <div class="modal-body">

				<form action="<?php echo base_url("uyegiris"); ?>" method="post" autocomplate="off">

					<input type="hidden" name="url" value="<?php if(isset($_SERVER["PATH_INFO"])){echo base_url($_SERVER["PATH_INFO"]);}else{echo base_url();} ?>" />

					<div class="col-md-12">

					<input type="text" name="email" class="form-control cellspacing" placeholder="Email Adresiniz" maxlength="300"  required/>

					</div>

					<div class="col-md-12">

					<input type="password" name="sifre" class="form-control cellspacing" placeholder="Şifre" maxlength="300" required/>

					</div>



			  </div>

			  <div class="modal-footer border-top0">

					<div class="col-md-12" style="text-align:left">

							<a id="uyeDegilModal" href="" data-toggle="modal" data-target="#myModal" data-dismiss="modal cellspacing">Üye Değilim</a>

							<a href="<?php echo base_url("sifremi-unuttum"); ?>" class="cellspacing col-md-offset-1">Şifremi Unuttum</a>

					</div>

					<div class="col-md-12">

						<button type="submit" class="btn btn-primary col-md-5" id="giris"  >Giriş</button>

						<button type="button" class="btn btn-default col-md-5" data-dismiss="modal">İptal</button>

					</div>

				</form>

			  </div>

			</div>

		  </div>

		</div>



		<!-- Rezervasyonu tamamlamak için üyeliğinizi onaylayın-->

		<div class="modal fade" id="uyelikonayla" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display:none">

		  <div class="modal-dialog" role="document">

			<div class="modal-content">

			  <div class="modal-header">

				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

				<h4 class="modal-title" id="myModalLabel" style="padding:10px">Uyarı !</h4>

			  </div>

			  <div class="modal-body">

				<div style="text-align:center; padding:10px 10px 30px 10px;">

					Rezervasyona devam edebilmek için lütfen mail adresinize göndermiş olduğumuz aktivasyon linkine tıklayarak üyeliğinizi aktif duruma getirin.

				</div>

			  </div>



			</div>

		  </div>

		</div>



		<script>

			$(function(){

				$("#kayitOl").click(function(){
					$("#uyegirisi").modal("hide");
				});

				$("#uyeGiris").click(function(){
					$("#myModal").modal("hide");
				});

				$("#uyeDegilModal").click(function(){
					$("#uyegirisi").modal("hide");
				});

				$("select[name='il']").change(function(){

					var il		= $("select[name='il'] option:selected").val();

					var url = "<?php echo base_url("ilceler"); ?>";

					 $.ajax({

					   type: "POST",

					   url: url,

					   data: {il : il},

					   success: function(data)

					   {

						  $(".ilce").html(data);

					   }

					 });

				});





				$("#siparisformu").hide();

				$("#tamamla").click(function(){

					$("#siparisformu").slideToggle();

					$("#tamamla").hide();



				});







				$("#emailadresi").change(function(){

					var email = $(this).val();

					var url = "<?php echo base_url("modal"); ?>";

					 $.ajax({

					   type: "POST",

					   url: url,

					   data: {email : email},

					   success: function(data)

					   {

						  $("#emailkontrol").html(data);



					   }

					 });



				});



				$("#emailadresi").keyup(function(){

					var email = $(this).val();

					var url = "<?php echo base_url("modal"); ?>";

					 $.ajax({

					   type: "POST",

					   url: url,

					   data: {email : email},

					   success: function(data)

					   {

						  $("#emailkontrol").html(data);



					   }

					 });



				});







			});

		</script>
