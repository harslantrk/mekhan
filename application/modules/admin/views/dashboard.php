<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!--
<div class="row  border-bottom white-bg dashboard-header">
  <div class="col-sm-3">
    <h3><?=$this->session->userdata('fullname')?></h3>
    <medium><?=$this->session->userdata('fulltime')?></medium> </div>
</div>
-->

<div class="wrapper wrapper-content animated fadeInLeft">
  <div class="row">
    <?php if(array_search('list',$this->session->userdata('auth')['members'])!==false || array_search('list',$this->session->userdata('auth')['bids'])!==false){?>
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Bildirimler</h5>
        </div>
        <div class="ibox-content">

          <div>
              <div class="col-sm-4 m-t">
                <?php if(array_search('list',$this->session->userdata('auth')['members'])!==false){?>
                  <a href="<?=base_url()?>admin/members/member_list">
                    <button type="button" class="btn btn-xs btn-<?php if($statistics['members_0']>0){ echo 'warning '; }else{ echo 'default'; }?> m-r-sm" style="min-width:35px"><?=$statistics['members_0']?></button>                            
                    Onaysız Üyeler
                  </a>
                  <hr/>
                  <a href="<?=base_url()?>admin/members/member_list">
                    <button type="button" class="btn btn-xs btn-default m-r-sm" style="min-width:35px"><?=$statistics['members_1']?></button>
                    Onaylı Üyeler
                  </a>
                <?php } ?>
              </div>

              <div class="col-sm-4 m-t">
<?php /*
                <?php if(array_search('list',$this->session->userdata('auth')['bids'])!==false){?>
                  <a href="<?=base_url()?>admin/bids/bid_list">
                    <button type="button" class="btn btn-xs btn-<?php if($statistics['bids_0']>0){ echo 'warning '; }else{ echo 'default'; }?> m-r-sm" style="min-width:35px"><?=$statistics['bids_0']?></button>
                    Onaysız Talepler
                  </a>
                  <hr/>
                  <a href="<?=base_url()?>admin/bids/bid_list">
                    <button type="button" class="btn btn-xs btn-default m-r-sm" style="min-width:35px"><?=$statistics['bids']?></button>
                    Toplam Talepler
                  </a>
                <?php } ?>
*/?>
              </div>
              <div class="col-sm-4 m-t">
<?php /*
                <?php if(array_search('list',$this->session->userdata('auth')['services'])!==false){?>
                  <a href="<?=base_url()?>admin/services/service_list">
                    <button type="button" class="btn btn-xs btn-<?php if($statistics['services_0']>0){ echo 'warning '; }else{ echo 'default'; }?> m-r-sm" style="min-width:35px"><?=$statistics['services_0']?></button>
                    Onaysız Hizmet p.
                  </a>
                  <hr/>
                  <a href="<?=base_url()?>admin/services/service_list">
                    <button type="button" class="btn btn-xs btn-default m-r-sm" style="min-width:35px"><?=$statistics['services']?></button>
                    Toplam  Hizmet p.
                  </a>
                <?php } ?>
*/?>
              </div>
              
              <div class="clearfix"></div>
          </div>

        </div>
      </div>
    </div>
    <?php } ?>
    
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Hızlı Menü</h5>
        </div>
        <div class="ibox-content">

          <?php if(array_search('list',$this->session->userdata('auth')['members'])!==false){?>
            <a href="<?=base_url()?>admin/members/member_list"><button rel="tooltip" title="Üye Listesi" class="btn btn-info btn-circle btn-lg btn-outline" type="button"><i class="fa fa-street-view"></i></button></a>
          <?php } ?>
<!--
          <?php if(array_search('list',$this->session->userdata('auth')['services'])!==false){?>
            <a href="<?=base_url()?>admin/services/service_list"><button rel="tooltip" title="Hizmet Profilleri" class="btn btn-info btn-circle btn-lg btn-outline" type="button"><i class="fa fa-industry"></i></button></a>
          <?php } ?>

          <?php if(array_search('list',$this->session->userdata('auth')['bids'])!==false){?>
            <a href="<?=base_url()?>admin/bids/bid_list"><button rel="tooltip" title="Talepler" class="btn btn-info btn-circle btn-lg btn-outline" type="button"><i class="fa fa-file"></i></button></a>
          <?php } ?>
-->
          <?php if(array_search('list',$this->session->userdata('auth')['customers'])!==false){?>
            <a href="<?=base_url()?>admin/customers/customer_list"><button rel="tooltip" title="Müşteriler" class="btn btn-primary btn-circle btn-lg btn-outline" type="button"><i class="fa fa-user"></i></button></a>
          <?php } ?>

          <?php if(array_search('list',$this->session->userdata('auth')['gallery'])!==false){?>
            <a href="<?=base_url()?>admin/gallery"><button rel="tooltip" title="Galeri" class="btn btn-primary btn-circle btn-lg btn-outline" type="button"><i class="fa fa-picture-o"></i></button></a>
          <?php } ?>

          <?php if(array_search('list',$this->session->userdata('auth')['slider'])!==false){?>
            <a href="<?=base_url()?>admin/slider"><button rel="tooltip" title="Slider" class="btn btn-primary btn-circle btn-lg btn-outline" type="button"><i class="fa fa-file-image-o"></i></button></a>
          <?php } ?>

          <?php if(array_search('list',$this->session->userdata('auth')['categories'])!==false){?>
            <a href="<?=base_url()?>admin/categories/category_list"><button rel="tooltip" title="Kategoriler" class="btn btn-primary btn-circle btn-lg btn-outline" type="button"><i class="fa fa-list"></i></button></a>
          <?php } ?>

          <?php if(array_search('list',$this->session->userdata('auth')['pages'])!==false){?>
            <a href="<?=base_url()?>admin/pages/page_list"><button rel="tooltip" title="İçerik Sayfaları" class="btn btn-primary btn-circle btn-lg btn-outline" type="button"><i class="fa fa-files-o"></i></button></a>
          <?php } ?>
          
        </div>
      </div>
    </div>

    <?php if(array_search('list',$this->session->userdata('auth')['users'])!==false || array_search('list',$this->session->userdata('auth')['logs'])!==false || array_search('update',$this->session->userdata('auth')['settings'])!==false){?>
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Yönetim</h5>
        </div>
        <div class="ibox-content">

          <?php if(array_search('list',$this->session->userdata('auth')['users'])!==false){?>
            <a href="<?=base_url()?>admin/user" rel="tooltip" title="Kullanıcılar" class="btn btn-white btn-bitbucket" style="color:mediumaquamarine"><i class="fa fa-users"></i></a>
          <?php } ?>

          <?php if(array_search('update',$this->session->userdata('auth')['definitions'])!==false){?>
            <a href="<?=base_url()?>admin/definitions" rel="tooltip" title="Tanımlamalar" class="btn btn-white btn-bitbucket" style="color:blueviolet" ><i class="fa fa-terminal"></i></button></a>
          <?php } ?>

          <?php if(array_search('list',$this->session->userdata('auth')['logs'])!==false){?>
            <a href="<?=base_url()?>admin/logs/log_list" rel="tooltip" title="Log Kayıtları" class="btn btn-white btn-bitbucket" style="color:darkseagreen"><i class="fa fa-user-secret"></i></button></a>
          <?php } ?>

          <?php if(array_search('update',$this->session->userdata('auth')['settings'])!==false){?>
            <a href="<?=base_url()?>admin/settings" rel="tooltip" title="Ayarlar" class="btn btn-white btn-bitbucket" style="color:cornflowerblue"><i class="fa fa-cog"></i></button></a>
          <?php } ?>

          <a href="<?=base_url()?>admin/logout" rel="tooltip" title="Çıkış" class="btn btn-white btn-bitbucket" style="color:brown"><i class="fa fa-power-off"></i></button></a>

        </div>
      </div>
    </div>
    <?php } ?>

  </div>
</div>

