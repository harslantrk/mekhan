	<div class="container" style ="margin-top: 50px;">
		<div class="row">
			
			<div class="col-md-12">
				<div class="excerpt well">
				<h4 style="text-align:center; margin-bottom:20px;">
					<a href=""><?php echo $title; ?></a>
				</h4>
					<?php echo $content; ?>
					<?php 
						if($this->uri->segment(1,0) == "mesafeli-satis-sozlesmesi"){ ?>
							<p><strong>Üye Bilgileri</strong></p>
							<p>Ad Soyad&nbsp;&nbsp; &nbsp; : <?php if(isset($_SESSION["uye"])){ echo $_SESSION["uye"]["ad"]; } ?> <br />
							Adres&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php if(isset($_SESSION["uye"])){ echo $_SESSION["uye"]["adres"]; } ?><br />
							Tel.&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  : <?php if(isset($_SESSION["uye"])){ echo $_SESSION["uye"]["tel"]; } ?><br />
							E-Posta &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; : <?php if(isset($_SESSION["uye"])){ echo $_SESSION["uye"]["email"]; } ?> <br />
							</p>
							
							<p><strong>Satıcı Bilgileri</strong></p>
							<p>Ünvan&nbsp;&nbsp; &nbsp; : Photons İnternet Teknolojileri San.ve Tic Ltd. Şti. <br />
							Adres&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;: Gayrettepe Mah.Elifoglu sok.no:16/2 Beşiktaş / İstanbul<br />
							Tel.&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 0212 212 12 70<br />
							E-Posta&nbsp;&nbsp; : info@akillipanda.com</p>
					<?php	}
					?>
				</div>
			</div>
		</div>
	</div>
	