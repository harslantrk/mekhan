<?php 

function sablon(){
$CI =& get_instance();
  $CI->load->helper(['directory', 'file']);
  $_theme_name = $CI->config->item('smarty.theme_name');
  $_theme_path = $CI->config->item('smarty.theme_path');

  $path = $_theme_path.$_theme_name."/views/template/";
  $files = directory_map($path);
  $result  = array();
  foreach ($files as $key => $file) {
   if (!is_array($file)) {
    $openF = read_file($path.$file);
    $filename = str_replace('.tpl', "", $file);
    preg_match("/{\*(.*?)\*}/i", $openF, $replace);
    $result[] = array(
     'name' => array_key_exists(1, $replace) ? trim($replace[1]) : null,
     'file' => $filename
    );
   }
  }

  return $result;
}

?>