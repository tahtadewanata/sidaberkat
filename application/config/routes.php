<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller']    = 'HomeController';
$route['404_override']          = '';
$route['translate_uri_dashes']  = FALSE;

$route['rekap_ppks']            = 'RekapPPKSKab/rekap_ppks';
$route['rekap_ppks_kec']        = 'RekapPPKSKec/rekap_ppks_kec';
$route['rekap_ppks_desa']       = 'RekapPPKSDesa/rekap_ppks_desa';
$route['getdata/(:any)']        = 'RekapPPKSKec/jumlah_permasalahan/$1';
$route['getdatadesa/(:any)']    = 'RekapPPKSKec/jumlah_permasalahan_desa/$1';

//LOGIN
$route['auth/login']                                      = 'auth/Login/index';
$route['auth/validatelogin']                              = 'auth/Auth/validatelogin';

//admin data arsip
$route['admin'] = 'AdminController/index';
//admin data arsip
$route['admin/export-data'] = 'AdminController/export_excel';
//admin data arsip
$route['admin/master-opd'] = 'MasterOPDCon/index';
//admin data arsip
$route['admin/master-pokok-masalah'] = 'MasterPokokCon/index';

//GANTI PASSWORD
$route['admin/reset']                          = 'auth/Auth/reset';
$route['admin/reset/save']                     = 'auth/Auth/save_password';

//MENU MASTER P3KE KELUARGA
$route['admin/p3ke-keluarga'] = 'P3keKel/p3ke_keluarga';
$route['admin/p3ke-keluarga/export-data'] = 'P3keKel/export_excel';

//MENU MASTER P3KE INDIVIDU
$route['admin/p3ke-individu'] = 'P3KeInd/p3ke_individu';
$route['admin/p3ke-individu/export-data'] = 'P3keInd/export_excel';

//MENU MASTER PROGRAM
$route['admin/master-program'] = 'MasterProgram/index';
//MENU MASTER PROGRAM
$route['admin/master-sumberdana'] = 'MasterSumberdana/index';
//MENU INPUT PROGRAM
$route['admin/input-program'] = 'InputProgram/index';
$route['admin/form-input-program'] = 'InputProgram/form_input_program';

//MENU REALISASI PROGRAM
$route['admin/realisasi-program'] = 'RealisasiProgram/index';




//HOME
$route['data_stunting']            = 'HomeController/index';
$route['jml_stunting']            = 'HomeController/jml_stunting';
$route['data_kemiskinan']            = 'HomeController/kemiskinan';
