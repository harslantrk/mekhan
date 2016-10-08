<?php 

	function kisalt($metin, $uzunluk){
  	// substr ile belirlenen uzunlukta kesiyoruz
        $metin = substr($metin, 0, $uzunluk)."...";
	// kesilen metindeki son kelimeyi buluyoruz
        $metin_son = strrchr($metin, " ");
	// son kelimeyi " ..." ile değiştiriyoruz
        $metin = str_replace($metin_son," ...", $metin);
        
        return strip_tags($metin);
    }
	
	if(!function_exists('word_wraps')){
		function word_wraps($str = null, $words = 10){
			$str = explode(" ", $str);
			$return = null;
			foreach($str as $key => $s){
				if ($key < $words){
					$return.= $s." ";
				}else{
					$return.="...";
					break;
				}
			}
			
			return strip_tags($return);
		}
	}
?>