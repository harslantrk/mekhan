<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

<div class="row wrapper border-bottom white-bg category-heading">

    <div class="col-lg-10">

        <ol class="breadcrumb">

            <li><a href="<?= base_url() ?>admin">Anasayfa</a></li>

            <li>Tekne Ekle</li>

        </ol>

    </div>

    <div class="col-lg-2"></div>

</div><style>    #map {        height: 250px;        width: 800px;    }    .controls {        margin-top: 10px;        border: 1px solid transparent;        border-radius: 2px 0 0 2px;        box-sizing: border-box;        -moz-box-sizing: border-box;        height: 32px;        outline: none;        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);    }    #origin-input,    #destination-input {        background-color: #fff;        font-family: Roboto;        font-size: 15px;        font-weight: 300;        margin-left: 12px;        padding: 0 11px 0 13px;        text-overflow: ellipsis;        width: 200px;    }    #origin-input:focus,    #destination-input:focus {        border-color: #4d90fe;    }    #mode-selector {        color: #fff;        background-color: #4d90fe;        margin-left: 12px;        padding: 5px 11px 0px 11px;    }    #mode-selector label {        font-family: Roboto;        font-size: 13px;        font-weight: 300;    }    #right-panel {        float: right;        width: 34%;        height: 100%;    }    .panel {        height: 100%;        overflow: auto;    }</style>



<?php include "assets/msg.php" ?>

<!-- CK -->

<script src="<?= base_url() ?>assets/admin/ckeditor/ckeditor.js"></script>

<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">

        <div class="col-lg-12">

            <div class="ibox float-e-margins">

                <div class="ibox-title">

                    <h5>Tekne Ekle</h5>

                </div>

                <div class="ibox-content">

                    <form  id="validate-add" method="POST" class="form-horizontal">



                       

                        <div class="hr-line-dashed"></div>





                        <div class="form-group">

                            <label class="col-sm-2 control-label">Reklam Adı <span style="color:red">*</span></label>

                            <div class="col-sm-10"><input type="text" name="title" value="" class="form-control required"></div>

                        </div>

                        <div class="hr-line-dashed"></div>



                        



                        <div class="form-group">

                            <label class="col-sm-2 control-label">Fotoğraf</label>

                            <div class="col-sm-10" id="blueimp">





                                <div id="img_scheme">

                                    <div class="file-box">

                                        <input type="hidden" name="fotograf" value="<?php echo base_url(); ?>/uploads/no-img.jpg" class="form-control">

                                            <div class="file">

                                                <span class="corner"></span>

                                                <div class="image">

                                                    <a href="/uploads/no-img.jpg">

                                                        <img alt="image" class="img-responsive" src="<?php echo base_url(); ?>/uploads/no-img.jpg"></a>

                                                </div>

                                                <div class="file-name">



                                                    <div class="hr-line-dashed"></div>

                                                    <button style="margin:0" class="btn btn-default" type="button" onclick="openCKFinder('file-box', $(this).parent().parent().parent().index())"><i class="fa fa-upload"></i>&nbsp;&nbsp;<span class="bold">Resim Seç</span></button>

                                                </div>

                                            </div>

                                    </div>

                                </div>





                            </div>

                        </div>

                        <div class="hr-line-dashed"></div>



                            <input type="hidden" name="kalkis_n" id ="kalkis_n" value="<?= $kalkis_n = NULL; ?>" />

                            <input type="hidden" name="varis_n" id="varis_n" value="<?= $varis_n = NULL; ?>" />

                            


                        <div class="hr-line-dashed"></div>



                       



                       



                       





                        <div class="hr-line-dashed"></div>



                        <div class="form-group">

                            <label class="col-sm-2 control-label">Öncelik</label>

                            <div class="col-sm-10"><input type="number" name="priority" value="" class="form-control"></div>

                        </div>

                        <div class="hr-line-dashed"></div>





                        <div class="form-group">

                            <label class="col-sm-2 control-label">Durumu</label>

                            <div class="col-sm-10"><input name="status" value="1" type="checkbox" class="js-switch" checked /></div>

                        </div>

                        <div class="hr-line-dashed"></div>





                        <div class="form-group">

                            <div class="col-sm-4 col-sm-offset-2">

                                <button class="btn btn-primary " type="submit" id="btn-save">Kaydet</button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>