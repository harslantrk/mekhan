function getSearch()
{
   var query = document.getElementById('notificationLink').value;
   var say=query.length;
   if(say>"3")
   {
   $.ajax({
     url: 'search',
     type: 'POST',
     cache: false,
     data: {keyword: query},
     success: function(data){
       document.getElementById('notificationsBody').innerHTML=data;
     },
     error: function(jqXHR, textStatus, err){}
  });
   }
}
$(document).ready(function()
{
  /*LIVE SEARCH*/
    $(".notificationLink").click(function()
    {
       //okundu işlemi burda yapılabilir.
        $("#notificationContainer").fadeToggle(300);
        $("#notification_count").fadeOut("slow");
        return false;
    });
    //Document Click
    $(document).click(function()
    {
        $("#notificationContainer").hide();
    });
    //Popup Click
    $("#notificationContainer").click(function()
    {
        //return false
    });
    /*INFINITE SCROLLING*/
    var total_record = 0;
  //var total_groups = <?php echo $total_data; ?>;  
  $('#resultData').load("infinite",
  {'group_no':total_record}, function() {total_record++;});
  $(window).scroll(function() {
     
    if($(window).scrollTop() + $(window).height() == $('html').height())  
    {
      /*if(total_record <= total_groups)
      {*/
        loading = true; 
        $('.loader_image').show(); 
        $.post('infinite',{'group_no': total_record},
          function(data){ 
              if (data != "") {                               
                  $("#resultData").append(data);                 
                  $('.loader_image').hide();                  
                  total_record++;
              }
          });     
      //}
    }
  });
});