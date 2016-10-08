<?php 

function seo($s) {     
	return strtolower(url_title(convert_accented_characters($s)));
} 


?>