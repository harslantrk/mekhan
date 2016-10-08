<?php defined('BASEPATH') OR exit('No direct script access allowed');?>



	<div class="footer">

      <div class="pull-right"> <strong></strong> </div>

      <div> <strong>Copyright</strong> &copy; 2016 </div>

    </div>

  </div>

</div>

<script>var base_url='<?=base_url()?>';</script>

<!-- Mainly scripts --> 

<script src="<?=base_url()?>assets/admin/js/jquery-2.1.1.js"></script> 

<script src="<?=base_url()?>assets/admin/js/jquery-ui-1.10.4.min.js"></script> 

<script src="<?=base_url()?>assets/admin/js/bootstrap.min.js"></script> 

<script src="<?=base_url()?>assets/admin/js/bootstrap-filestyle.js"></script>

<script src="<?=base_url()?>assets/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script> 

<script src="<?=base_url()?>assets/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="<?=base_url()?>assets/admin/js/plugins/jeditable/jquery.jeditable.js"></script> 

<script type="text/javascript">
$(document).ready(function() {
  $(".js-example-basic-single").select2();
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<!-- Data Tables -->

<script src="<?=base_url()?>assets/admin/js/plugins/dataTables/jquery.dataTables.js"></script>

<script src="<?=base_url()?>assets/admin/js/plugins/dataTables/dataTables.bootstrap.js"></script>

<script src="<?=base_url()?>assets/admin/js/plugins/dataTables/dataTables.responsive.js"></script>

<script src="<?=base_url()?>assets/admin/js/plugins/dataTables/dataTables.tableTools.min.js"></script>
<script src="<?=base_url()?>assets/front/plugins/custom/js/jquery.maskedinput.js"></script>



<script type="text/javascript">
  jQuery(function($){
    $("#phone").mask("(999) 999-9999");
  });
</script>



<!-- Switchery -->

<script src="<?=base_url()?>assets/admin/js/plugins/switchery/switchery.js"></script>



<!-- Toastr script -->

<script src="<?=base_url()?>assets/admin/js/plugins/toastr/toastr.min.js"></script>



<!-- Custom and plugin javascript --> 

<script src="<?=base_url()?>assets/admin/js/inspinia.js"></script> 

<script src="<?=base_url()?>assets/admin/js/plugins/pace/pace.min.js"></script>



<!-- blueimp gallery -->

<script src="<?=base_url()?>assets/admin/js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>



<!-- Jquery Validate -->

<script src="<?=base_url()?>assets/admin/js/plugins/validate/jquery.validate.js"></script>

<script src="<?=base_url()?>assets/admin/js/plugins/bootstrap-inputmask/jquery.inputmask.min.js"></script>



<!-- Jquery date-range-picker -->

<script src="<?=base_url()?>assets/admin/js/plugins/jquery-date-range-picker/moment.min.js"></script>

<script src="<?=base_url()?>assets/admin/js/plugins/jquery-date-range-picker/jquery.daterangepicker.js"></script>



<!-- iCheck -->

<script src="<?=base_url()?>assets/admin/js/plugins/iCheck/icheck.min.js"></script>



<!-- price format -->

<script src="<?=base_url()?>assets/admin/js/plugins/price-format/jquery.price_format.2.0.min.js"></script>



<!-- CK -->

<script src="<?=base_url()?>assets/admin/ckfinder/ckfinder.js"></script>



<!-- Multi Select -->

<script src="<?=base_url()?>assets/admin/js/plugins/multiselect/jquery.multi-select.js"></script>



<script src="<?=base_url()?>assets/admin/js/custom.js"></script>



<!-- The Gallery as lightbox dialog, should be a child element of the document body -->

<div id="blueimp-gallery" class="blueimp-gallery">

    <div class="slides"></div>

    <h3 class="title"></h3>

    <a class="prev">‹</a>

    <a class="next">›</a>

    <a class="close">×</a>

    <a class="play-pause"></a>

    <ol class="indicator"></ol>

</div> 

	<script>

		$(function(){

			$("#renk-box").click(function(){

				$('<div class="col-md-2 renk"><input type="text" name="renk[]" class="form-control" placeholder="Servis Girin"><input type="text" name="sfiyat[]" class="form-control" placeholder="Fiyat Girin"><i class="fa fa-remove iptal-et"></i></div>').insertBefore(this);

			});

			

			$('body').delegate(".iptal-et","click", function(){ 

				$(this).parent().remove();

			});

			

		});

	</script>





<script>

 /*$(function () {

     

    $("#origin-input").focusout(function () {

        var x =   $("#origin-input").val();

      alert(x);

    });

})

*/

</script>  



</body>

</html>  