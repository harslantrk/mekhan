<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parola Sıfırla</title>
    <link href="<?=base_url()?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/admin/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/admin/css/animate.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/admin/css/style.css" rel="stylesheet">
    <style>.vcenter { top:50% !important; margin-top:-150px !important; height:250px;}</style>
</head>
<body class="gray-bg">
    <div class="middle-box text-center loginscreen animated fadeInDown vcenter">
        <?php include "assets/msg.php" ?>
        <div>
            <h3 class="m-b text-left" style="margin-bottom:20px;">Parola Sıfırla</h3>
            <form class="m-t" role="form" action="" method="post" id="validate-1">
                <div class="form-group" style="margin-bottom:20px;">
                    <input type="text" name="email" class="form-control required email" placeholder="E-mail adresi" value="<?=$this->input->post('email')?>" >
                </div>
               
                <div class="form-group text-left" style="margin-bottom:20px;">
                    <button class="btn btn-md btn-primary pull-right m-t-n-xs" type="submit"><strong>Devam ></strong></button>
                </div>
            </form>

        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?=base_url()?>assets/admin/js/jquery-2.1.1.js"></script>
    <script src="<?=base_url()?>assets/admin/js/bootstrap.min.js"></script>
    <!-- Jquery Validate -->
    <script src="<?=base_url()?>assets/admin/js/plugins/validate/jquery.validate.js"></script>
    <script>$("#validate-1").validate();</script>



</body>

</html>
