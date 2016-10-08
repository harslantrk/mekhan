<?php 
foreach($searchedPlaces as $key)
{
?>
   <div class="notificationslist newNotifications" <?php echo "onclick=\"window.location='search/$key->id';\" "; ?>>
       <div class="notificationsText">
       <?php echo $key->baslik;  ?> 
       </div>
   </div>
 <?php } ?>