<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class PaymentMethod
{
	const HAVALE  = "havale";
	const KREDI_KARTI  = "kredikarti";
	const BANKA_HAVALE  = "bankahavale";
}


if ( ! function_exists('seo_url'))
{
	function seo_url($string){// türkçe kararkter değiştirme 
		$table = array('Ü'=>'U', 'Ğ'=>'G', 'İ'=>'I', 'Ş'=>'S', 'Ç'=>'C', 'Ö'=>'O', 'ü'=>'u', 'ğ'=>'g', 'ı'=>'i', 'ş'=>'s', 'ç'=>'c', 'ö'=>'o', ' '=>'-', '%20'=>'-', '?'=>'');
		$string = strtolower(strtr($string, $table));
	    //Strip any unwanted characters
	    $string = preg_replace("/[^a-z0-9._\s-]/", "", $string);
	    //Clean multiple dashes or whitespaces
	    $string = preg_replace("/[\s-]+/", " ", $string);
	    //Convert whitespaces and underscore to dash
	    $string = preg_replace("/[\s_]/", "-", $string);
	    return $string;
	}
}


if ( ! function_exists('price_to_number'))
{
	function price_to_number($string){
		$string=str_replace(',','.',str_replace('.','',$string));
	    return $string;
	}
}

if ( ! function_exists('segment'))
{
	function segment($x){
		global $CI;
		$string=$CI->uri->segment($x,0);
	    return $string;
	}
}

if ( ! function_exists('number_to_price'))
{
	function number_to_price($number){
		setlocale(LC_MONETARY, 'tr_TR');
    	return money_format('%!.2n', $number);
	}
}


if ( ! function_exists('check_date'))
{
	function check_date($x) {
    	return (date('d.m.Y', strtotime($x)) == $x);
	}
}

if ( ! function_exists('check_datetime'))
{
	function check_datetime($x) {
    	return (date('Y-m-d H:i:s', strtotime($x)) == $x);
	}
}

function generateRandomString($length = 10)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}