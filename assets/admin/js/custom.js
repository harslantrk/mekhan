"use strict";
$(document).ready(function(){
	
	// İtem Delete (Ex: User, Page)
	$(".delete-item1").click(function(){
		$("#delete-item").attr('delete-id',$(this).parent().find('.data-id').text());
		$("#delete-caption").text($(this).parent().parent().find('.data-caption').text());
	});

	$(".delete-item").click(function(){
		$("#delete-item").attr('delete-id',$(this).parent().parent().find('.data-id').text());
		$("#delete-caption").text($(this).parent().parent().find('.data-caption').text());
	});

	$("#delete-item").click(function(){ GetAjax( $(this).attr('delete-handler'), 'id='+$(this).attr('delete-id') ); });

	// Delete img fuctions
	$(".delete-img").click(function(){
		$("#delete-img").attr('delete-id',$(this).attr('data-id'));
		$("#delete-caption").text($(this).attr('data-title'));
	});
	$("#delete-img").click(function(){ GetImg($(this).attr('delete-function'),'id='+$(this).attr('delete-id')); });

	// Validation
	$( "#validate-add" ).validate({
		rules: {
	  		member_email: { remote: { url: base_url+"admin/ajax/check_field_member" } },
	  		email: { remote: { url: base_url+"admin/ajax/check_field" } },
	  		username: { remote: {  url: base_url+"admin/ajax/check_field" } },
	  		seo_url: { remote: {  url: base_url+"admin/ajax/check_field_seo_url" } }
	    }
	});
	$( "#validate-edit" ).validate({
		rules: {
	  		member_email: { remote: { url: base_url+"admin/ajax/check_field_member/"+$('input[name=id]').val() } },
	  		email: { remote: { url: base_url+"admin/ajax/check_field/"+$('input[name=id]').val() } },
	  		username: { remote: {  url: base_url+"admin/ajax/check_field/"+$('input[name=id]').val() } },
	  		seo_url: { remote: {  url: base_url+"admin/ajax/check_field_seo_url/"+$('input[name=id]').val() } }
	    }
	});

	//Price Formatting
	$('#amount').priceFormat({
	    prefix: '',
	    centsSeparator: ',',
	    thousandsSeparator: '.'
	});

	$('[rel=tooltip]').tooltip({
	    placement: 'top'
	});
	
	$('.dataTables-js').dataTable();
	$('.dataTables-js-sort').dataTable({
        "paging"  : false,
        "ordering": true,
        "info"	  : false,
        "order"	  : [[ 0, $('.dataTables-js-sort').attr('data-sort')]],
        "bFilter" : false,
        "bInfo"	  : false
    });


	var elem = document.querySelector('.js-switch');
    var switchery = new Switchery(elem, { color: '#1AB394' });

	$(".toggle-statu").click(function(){
		var status=0;
		$(this).find('i').toggleClass('fa-check fa-uncheck');
		if($(this).find('i').hasClass('fa-check')){
			status=1;
		}else{
			status=0;
		}
		GetAjax($(this).attr('ajax-handler'),'id='+$(this).parent().parent().find('.data-id').text()+'&status='+status);
	});
	
	toastr.options = {
	  "closeButton": true,
	  "debug": false,
	  "progressBar": true,
	  "positionClass": "toast-top-right",
	  "onclick": null,
	  "showDuration": "400",
	  "hideDuration": "1000",
	  "timeOut": "10000",
	  "extendedTimeOut": "1000",
	  "showEasing": "swing",
	  "hideEasing": "linear",
	  "showMethod": "fadeIn",
	  "hideMethod": "fadeOut"
	}

	$(":file").filestyle({buttonBefore: true});

	// CTRL + Save 
	$(window).bind('keydown', function(event) {
	    if (event.ctrlKey || event.metaKey) {
	        switch (String.fromCharCode(event.which).toLowerCase()) {
	        case 's':
	            event.preventDefault();
	            $("#btn-save").trigger( "click" );  
	            break;
	        //case 'f':
	          //  event.preventDefault();
	            //alert('ctrl-f');
	            //break;
	        }
	    }
	});

	if($('input[name^="datetime"]').length){
		$('input[name^="datetime"]').dateRangePicker({ format: 'DD.MM.YYYY', language: 'tr', separator: ' - ', showShortcuts: false });
	}
	
	$("#checkAll").click(function(){
	    $(this).parent().parent().find('input:checkbox').not(this).prop('checked', this.checked);
	    $(this).parent().parent().find('input:checkbox').parent().toggleClass("checked",this.checked); // for i-checks
	});

	$('.edt').dblclick(function(){ // td update
		var txt=$(this).text();
		var td=$(this);
		td.html('<input type="text" value="">');
		td.find('input').focus();
		td.find('input').val(txt);
		td.find('input').focusout(function(){
			if(txt!=$(this).val()){
				txt=$(this).val();
				GetAjax(td.attr('ajax-handler'),'id='+td.parent().find('.data-id').text()+'&val='+txt);
			}
			td.html(txt);	
		});
	});


	$('input[name="title"]').focusout(function(){
		$('input[name="seo_url"]').focusin(function(){
			$(this).val(convertToSlug($('input[name="title"]').val()));
		});
	});

	$('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });	

	$( "#blueimp" ).sortable();

	$('input[name="countySelect"]:radio').on('ifChecked', function(event){

		if($(this).val()=='1'){
			$('#county-area').hide(500);
			$('#county-area input[name="county"]').attr('disabled', true);
			$('#county-area input[name="town"]').attr('disabled', true);
		}else{
			$('#county-area input[name="county"]').attr('disabled', false);
			$('#county-area input[name="town"]').attr('disabled', false);
			$('#county-area').show(500);
			
		}
	});



	active_function();
	SLoad(0);
}); // ready

function active_function (){
	SubSelect('page_top_id');
	SubSelect('category_top_id');
	SubSelect_county('county');
	$('#multiselect1').multiSelect();
	$('#multiselect2').multiSelect();

	$('#multiselect1').change(function(){
		var data=$(this).val();
		if(data==null){data='';}
		$('input[name="county"]').val(data);
		if(data.length==1){
			GetAjax('county_multiselect','parent_id='+data,'#county-area');
		}else{
			$('.multiselect2').remove();
		}
	});

	$('#multiselect2').change(function(){
		var data=$(this).val();
		if(data==null){data='';}
		$('input[name="town"]').val(data);
	});

}
function SubSelect(ref){
	$('#'+ref+' select').change(function(){ // td update
		var val=$(this).val();
		//alert(val);
		if(val){
			GetAjax(''+ref+'_select','top_id='+val,'#'+ref+'');
		}else{
			GetAjax(''+ref+'_select','top_id=0','#'+ref+'');
		}
	});
}
function SubSelect_county(ref){
	$('#'+ref+' select').change(function(){ // td update
		var val=$(this).val();
		var name=$(this).attr('name');
		//alert(val);
		$('#'+ref+'_select').html('');
		if(name=='county'){
			if(val){
				GetAjax(''+ref+'_select','parent_id='+val,'#'+ref+'');
			}else{
				GetAjax(''+ref+'_select','parent_id=0','#'+ref+'');
			}
		}else{
			if(val){
				GetAjax(''+ref+'_select','parent_id='+$('select[name="county"]').val()+'&id='+val,'#'+ref+'');
			}else{
				GetAjax(''+ref+'_select','parent_id='+$('select[name="county"]').val()+'','#'+ref+'');
			}
		}
		
	});
}
function UploadImg(controller){
	if(controller){
		SLoad(1);
		var formData = new FormData($(".upload_form")[0]);
	    $.ajax({
			type: 'POST',
			url: base_url+'admin/ajax/'+controller,
			data: formData,
		    cache: false,
		    async: false,
		    contentType: false,
		    processData: false
		}).done(function(data){
			SLoad(0); 
			$('#img_div').html(data);
			$("#delete-img").click(function(){ GetImg($(this).attr('delete-function'),'id='+$(this).attr('delete-id')); });
		});
	}else{
		alert('no controller');
	}
}

function GetImg(controller,query){
	if(controller){
		SLoad(1);
		var formData = new FormData($(".upload_form")[0]);
	    $.ajax({
			type: 'POST',
			url: base_url+'admin/ajax/'+controller,
			data: query,
			context: document.body
		}).done(function(data){
			SLoad(0); 
			$('#img_div').html(data);
		});
	}else{
		alert('no controller');
	}
}

function GetAjax(controller,query,div){
	if(controller){
		SLoad(1);
		if(div){
			$.ajax({
			  type: 'POST',
			  url: base_url+'admin/ajax/'+controller,
			  data: query,
			  dataType:'html',
			  context: document.body
			}).done(function(data){
				SLoad(0);
				$(div).html(data);
				active_function();
			});
		}else{
			$.ajax({
			  type: 'POST',
			  url: base_url+'admin/ajax/'+controller,
			  data: query,
			  dataType:'json',
			  context: document.body,
        	  success:function(data){
				SLoad(0);
				if(data.result==1){
					toastr.success(data.msg);
				}else if(data.result==0){
					toastr.info(data.msg);
				}else if(data.refresh==1){
					$("html, body").scrollTop(0);
					window.location.reload();
				}
			  },
	          error: function(response) {
	          	SLoad(0);
	            toastr.error('Hata: '+JSON.stringify(response.responseText)+'<br/>'+JSON.stringify(response));
	          }
	    	});
		}
	    
	}else{
		alert('no controller');
	}
}

function SLoad(e){ // Loading Visible
	if(e){
		$('.body-loading').fadeIn('fast');
	}else{
		$('.body-loading').fadeOut('fast');
	}
}

function convertToSlug(Text) // Seo Url
{
    function translate(string){
      var str = { "Ç": "C", "ç": "c", "Ö": "O", "ö": "o", "İ": "I", "ı": "i", "Ş": "S", "ş": "s", "Ü": "U", "ü": "u", "Ğ": "G", "ğ": "g", " ": "-" };
      return string.replace(/[\s\S]/g, function(x){
        if( str.hasOwnProperty( x ) )
          return str[ x ];
        return x;
      });
    };
    Text=translate(Text).toLowerCase();
    return Text.replace(/[^\w-]+/g,'');
}

function openCKFinder(class_name,id) {
     CKFinder.popup( {
         chooseFiles: true,
         onInit: function( finder ) {
             finder.on( 'files:choose', function( evt ) {
                 var file = evt.data.files.first();
                 $('.'+class_name).eq(id).find('input:first').val( file.getUrl() );
                 //$('#'+id+' small').text( file.getUrl().split('/').reverse()[0] );
                 $('.'+class_name).eq(id).find('img').attr('src', file.getUrl() );
                 $('.'+class_name).eq(id).find('a').attr('href', file.getUrl() );
                 //blueimp.Gallery();
             } );
             finder.on( 'file:choose:resizedImage', function( evt ) {
                 $('.'+class_name).eq(id).find('input:first').val( evt.data.resizedUrl );
                 //$('#'+id+' small').text( evt.data.resizedUrl.split('/').reverse()[0] );
                 $('.'+class_name).eq(id).find('img').attr('src', evt.data.resizedUrl );
                 $('.'+class_name).eq(id).find('a').attr('href', evt.data.resizedUrl );
             } );
         }
     } );
 }
 
 function clone_file_box(){
 	var html=$('#img_scheme').html();
 	html= html.split('<a href="/uploads/no-img.jpg">').join('<a href="/uploads/no-img.jpg" data-gallery="">');
 	$('#file-box').before( html );
	$( "#blueimp" ).sortable();
	$('body').tooltip({selector: '[rel=tooltip]' });
 }
 