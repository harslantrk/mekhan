<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <ol class="breadcrumb">
            <li><a href="<?=base_url()?>admin">Anasayfa</a></li>
            <li><a>Ekspertiz Rapor</a></li>
        </ol>
    </div>
    <div class="col-lg-2"></div>
</div>

<?php include "assets/msg.php" ?>

<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
	    <div class="col-lg-12">
	        <div class="ibox float-e-margins">
	            <div class="ibox-title">
	                <h5>Rapor PDF Listesi</h5>
	            </div>
	            <div class="ibox-content">
	                <?php
						$files = scandir('./pdf/files');
						foreach($files as $file){
							if($file!='.' && $file!='..'){echo '<a target="_blank" href="'.base_url().'pdf/files/'.$file.'">'.$file.'</a><BR/>';}
						}
	                ?>
	            </div>
	        </div>
	    </div>
	</div>
</div>
