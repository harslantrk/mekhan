<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

	<li>
		 <a href="<?=base_url()?>admin"><i class="fa fa-home"></i> <span class="nav-label">Dashboard</span></a>

		<li>
		    <a href="#"><i class="fa fa-clipboard"></i> <span class="nav-label">Üye İşlemleri</span><span class="fa arrow"></span></a>
		    <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
			    

					<li>
						 <a href="<?=base_url()?>admin/members/member_list"><i class="fa fa-street-view"></i> <span class="nav-label">Üye Listesi</span></a>
					</li>



					<li>
						 <a href="<?=base_url()?>admin/services/service_list"><i class="fa fa-industry"></i> <span class="nav-label">Hizmet Profilleri</span></a>
					</li>



					<li>
						 <a href="<?=base_url()?>admin/bids/bid_list"><i class="fa fa-file"></i> <span class="nav-label">Talepler</span></a>
					</li>


		    </ul>
		</li>


	

		<li>
			 <a href="<?=base_url()?>admin/customers/customer_list"><i class="fa fa-user"></i> <span class="nav-label">Müşteriler</span></a>
		</li>

		<li>
			 <a href="<?=base_url()?>admin/gallery"><i class="fa fa-picture-o"></i> <span class="nav-label">Galeri</span></a>
		</li>


		<li>
			 <a href="<?=base_url()?>admin/slider"><i class="fa fa-file-image-o"></i> <span class="nav-label">Slider</span></a>
		</li>

		<li>
			 <a href="<?=base_url()?>admin/categories/category_list"><i class="fa fa-list"></i> <span class="nav-label">Kategoriler</span></a>
		</li>

		<li>
			 <a href="<?=base_url()?>admin/pages/page_list"><i class="fa fa-files-o"></i> <span class="nav-label">İçerik Sayfaları</span></a>
		</li>
		<li>
			 <a href="#"><i class="fa fa-event"></i> <span class="nav-label">Etkinlik Ekle</span></a>
		</li>

		<li>
		    <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Yönetim</span><span class="fa arrow"></span></a>
		    <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">

			        <li>
						<a href="<?=base_url()?>admin/user"><i class="fa fa-users"></i> <span class="nav-label">Kullanıcılar</span></a>
					</li>

					<li>
						<a href="<?=base_url()?>admin/definitions"><i class="fa fa-terminal"></i> <span class="nav-label">Tanımlamalar</span></a>
					</li>
		
					<li>
						<a href="<?=base_url()?>admin/logs/log_list"><i class="fa fa-user-secret"></i> <span class="nav-label">Log Kayıtları</span></a>
					</li>

					<li>
						<a href="<?=base_url()?>admin/settings"><i class="fa fa-cog"></i> <span class="nav-label">Ayarlar</span></a>
					</li>


		    </ul>
		</li>


