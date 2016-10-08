<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="<?=base_url()?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="<?=base_url()?>assets/admin/css/animate.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/admin/css/style.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <style>.vcenter { top:50% !important; margin-top:-150px !important; height:250px;}</style>
</head>
<body class="gray-bg">
    <div class="middle-box text-center loginscreen animated fadeInDown vcenter">
        <?php include "assets/msg.php" ?>
        <div>
            <h3 class="m-b" style="margin-bottom:20px;">Yönetim Girişi</h3>
            <form class="m-t" role="form" action="" method="post" id="validate-1">
                <div class="form-group" style="margin-bottom:20px;">
                    <input type="text" name="username" class="form-control required" placeholder="Kullanıcı Adı"  >
                </div>
                <div class="form-group" style="margin-bottom:20px;">
                    <input type="password" name="password" class="form-control required" placeholder="Şifre" >
                </div>
                <div class="form-group text-left" style="margin-bottom:20px;">
                    <button class="btn btn-md btn-primary pull-right m-t-n-xs" type="submit"><strong>Giriş</strong></button>
                    <label> <input type="checkbox" name="remember_me" value="true" class="i-checks" checked> Beni Hatırla </label> 
                </div>

                <a href="<?=base_url()?>admin/password_reset"><small>Şifremi Unuttum?</small></a>
            </form>
            <p class="m-t"> <small> &copy; 2015</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?=base_url()?>assets/admin/js/jquery-2.1.1.js"></script>
    <script src="<?=base_url()?>assets/admin/js/bootstrap.min.js"></script>
    <!-- Jquery Validate -->
    <script src="<?=base_url()?>assets/admin/js/plugins/validate/jquery.validate.js"></script>
    <script>$("#validate-1").validate();</script>

    <!-- iCheck -->
    <script src="<?=base_url()?>assets/admin/js/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>

</body>

</html>
