<?php 

function postt($post){
	return trim(htmlspecialchars($_POST[$post]));
}
?>