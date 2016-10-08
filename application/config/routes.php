<?php

defined('BASEPATH') OR exit('No direct script access allowed');



/*

| -------------------------------------------------------------------------

| URI ROUTING

| -------------------------------------------------------------------------

| This file lets you re-map URI requests to specific controller functions.

|

| Typically there is a one-to-one relationship between a URL string

| and its corresponding controller class/method. The segments in a

| URL normally follow this pattern:

|

|	example.com/class/method/id/

|

| In some instances, however, you may want to remap this relationship

| so that a different class/function is called than the one

| corresponding to the URL.

|

| Please see the user guide for complete details:

|

|	http://codeigniter.com/user_guide/general/routing.html

|

| -------------------------------------------------------------------------

| RESERVED ROUTES

| -------------------------------------------------------------------------

|

| There are three reserved routes:

|

|	$route['default_controller'] = 'welcome';

|

| This route indicates which controller class should be loaded if the

| URI contains no data. In the above example, the "welcome" class

| would be loaded.

|

|	$route['404_override'] = 'errors/page_missing';

|

| This route will tell the Router which controller/method to use if those

| provided in the URL cannot be matched to a valid route.

|

|	$route['translate_uri_dashes'] = FALSE;

|

| This is not exactly a route, but allows you to automatically route

| controller and method names that contain dashes. '-' isn't a valid

| class or method name character, so it requires translation.

| When you set this option to TRUE, it will replace ALL dashes in the

| controller and method URI segments.

|

| Examples:	my-controller/index	-> my_controller/index

|		my-controller/my-method	-> my_controller/my_method

*/



$route['default_controller'] = 'front';

$route['404_override'] = 'special404';

$route['translate_uri_dashes'] = FALSE;



$route['admin'] 								= 'admin/index';

$route['admin/(:any)']				 			= 'admin/$1';

$route['admin/(:any)/(:any)'] 					= 'admin/$1/$2';

$route['admin/(:any)/(:any)/(:any)'] 			= 'admin/$1/$2/$3';

$route['admin/(:any)/(:any)/(:any)/(:any)'] 	= 'admin/$1/$2/$3/$4';

$route['admin/blog']							 ='admin/blog';

$route['logout'] 								= 'front/front/logout';
$route['userRegister'] 							= 'front/front/userRegister';



$route['gallery'] 			= 'front/gallery/index';

$route['gallery/(:num)'] 	= 'front/gallery/index/$1';



$route['odeme'] 			= 'front/odeme/index';

$route['odeme/(:any)'] 		= 'front/odeme/$1';



$route['odeme1'] 			= 'front/odeme1/index';

$route['odeme1/(:any)'] 	= 'front/odeme1/$1';



$route['iletisim'] 			= 'front/iletisim/index';



$route['haber']						= 'front/front/haber';

$route['haber/(:any)']				= 'front/front/haber/$1';

$route['haber/(:any)/(:num)']		= 'front/front/haber/$1/$2';



$route['siparis']					= 'front/siparis/siparis';

$route['siparis/(:any)']			= 'front/siparis/siparis/$1';



$route['siparissil']				= 'front/siparis/siparissil';

$route['siparissil/(:any)']			= 'front/siparis/siparissil/$1';



$route['sepetim']					= 'front/siparis/sepetim';



$route['modal']						= 'front/front/modal';



$route['ilceler']					= 'front/front/ilceler';



$route['rezervasyon']				= 'front/siparis/rez_tekne_kiralama';

$route['rezervasyon/(:num)'] 		= 'front/front/rezervasyon/$1';



$route['kasa']						= 'front/siparis/kasa';



$route['arama']						= 'front/arama/index';



$route['tekne-yorum']					= 'front/siparis/tekne_yorum';
$route['mekanlar']						= 'front/front/mekanlar';
$route['mekanlar/(:any)']	= 'front/front/mekanlar/$1';
$route['etkinlikler']					= 'front/front/etkinlikler';
$route['etkinlikler/(:any)/(:any)/(:any)']	= 'front/front/etkinlikler/$1/$2/$3';
$route['galeri']						= 'front/front/galeri';
$route['video']							= 'front/front/video';
$route['video/(:any)/(:any)']	= 'front/front/video/$1/$2';
$route['blog']							= 'front/front/blog';
$route['iletisim']						= 'front/front/iletisim';
$route['search']					= 'front/front/searchPlace';
$route['infinite']					= 'front/front/infiniteGallery';
$route['search/(:any)']					= 'front/front/searchAllPlace/$1';
$route['mekan_page']						= 'front/front/mekan_page';
$route['event_page']						= 'front/front/event_page';
$route['slider/delete/(:num)']						= 'admin/slider/image_delete/$1';







$route['tekne-kiralama']							= 'front/front/tekne_kiralama';

$route['tekne-kiralama/(:any)/']					= 'front/front/tekne_kiralama/$1/';

$route['tekne-kiralama/(:any)/(:any)']				= 'front/front/tekne_kiralama/$1/$2';

$route['tekne-kiralama/(:any)/(:any)/(:num)']		= 'front/front/tekne_kiralama/$1/$2/$3';



$route['uyeol'] 					= 'front/profil/uyeol';
$route['uyeonay']					= 'front/profil/uyeonay';
$route['uyegiris'] 					= 'front/profil/uyegiris';
$route['uyecikis'] 					= 'front/profil/uyecikis';
$route['sifremi-unuttum'] 			= 'front/profil/sifremi_unuttum';
$route['sendMessage'] 					= 'front/sendMessage';
$route['profil/(:num)']				= 'front/profil/profil/$1';
$route['profil-duzenle/(:num)']		= 'front/profil/profil_duzenle/$1';

$route['etkinlik/(:any)/(:any)']        = 'front/etkinlik/$1/$2';
$route['mekan/(:any)/(:any)']       = 'front/etkinlikMekan/$1/$2';
$route['blog/(:any)/(:any)']        = 'front/etkinlikBlog/$1/$2';





$route['(:any)'] 				= 'front/page/$1';
$route['(:any)/(:any)'] 		= 'front/index/$1/$2';
$route['(:any)/(:any)/(:any)'] 	= 'front/index/$1/$2/$3';
$route['(:any)/(:any)/(:any)/(:num)'] 	= 'front/index/$1/$2/$3/$4';

