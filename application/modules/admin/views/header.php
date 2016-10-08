<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Panel</title>
<link href="<?=base_url()?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link href="<?=base_url()?>assets/admin/css/animate.css" rel="stylesheet">
<!-- Data Tables -->
<link href="<?=base_url()?>assets/admin/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?=base_url()?>assets/admin/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
<link href="<?=base_url()?>assets/admin/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">

<link href="<?=base_url()?>assets/admin/css/plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">
<link href="<?=base_url()?>assets/admin/css/plugins/switchery/switchery.css" rel="stylesheet">

<!-- Toastr style -->
<link href="<?=base_url()?>assets/admin/css/plugins/toastr/toastr.min.css" rel="stylesheet">

<!-- Jquery date-range-picker -->
<link href="<?=base_url()?>assets/admin/js/plugins/jquery-date-range-picker/daterangepicker.css" rel="stylesheet">

<!-- Multi Select -->
<link href="<?=base_url()?>assets/admin/js/plugins/multiselect/multi-select.css" rel="stylesheet">

<link href="<?=base_url()?>assets/admin/css/plugins/iCheck/custom.css" rel="stylesheet">

<link href="<?=base_url()?>assets/admin/css/style.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

    
    
</head>
<body>
<div id="wrapper"><div class="body-loading"><img src="<?=base_url()?>assets/admin/img/loading.gif" /></div>
  <nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
      <ul class="nav" id="side-menu">
        <li class="nav-header">
          <div class="dropdown profile-element"> <span> <img alt="image" class="img-circle" src="<?=base_url()?><?php if($this->session->userdata('img')){ echo 'uplo4ds/users/XS/'.$this->session->userdata('img');}else{ echo 'uploads/no-avatar.png';} ?>" /> </span>
          	<a data-toggle="dropdown" class="dropdown-toggle" href="#"> <span class="clear"> <span class="block m-t-xs">
          		<strong class="font-bold"><?php echo $this->session->userdata('username'); ?></strong><b class="caret"></b> </span> </span>
          	</a>
            <ul class="dropdown-menu animated fadeInRight m-t-xs">
              <li><a href="<?=base_url()?>admin/user/update_user/<?php echo $this->session->userdata('id'); ?>"><i class="fa fa-edit"></i> Profil Düzenle</a></li>
              <li class="divider"></li>
              <li><a href="<?=base_url()?>admin/logout"><i class="fa fa-sign-out"></i> Çıkış</a></li>
            </ul>
          </div>
          <div class="logo-element"> Emc² </div>
        </li>
        <?php include "sidebar.php"; ?>
      </ul>
    </div>
  </nav>

  <div id="page-wrapper" class="gray-bg">
    <div class="row border-bottom">
      <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header"> <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a> </div>
        <ul class="nav navbar-top-links navbar-right">
          <li> <span class="m-r-lg text-muted welcome-message"><i class="fa fa-clock-o"></i> <?=$this->session->userdata('fulltime')?> </span> </li>
          <li> <span class="m-r-sm text-muted welcome-message">Mekhan<!--<?php echo $this->session->userdata('fullname'); ?>--></span> </li>
          <li> <a href="<?=base_url()?>admin/logout"> <i class="fa fa-sign-out"></i> Çıkış </a> </li>
        </ul>
      </nav>
    </div>