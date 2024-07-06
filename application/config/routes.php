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
// $route['default_controller'] = 'Display_controller/home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// MAIN ROUTES
$route['present'] 	= 'Main_controller/present';


$route['default_controller'] 		= 'Main_controller/home';

$route['search'] 					= 'Main_controller/home';
// $route['search/result'] 			= 'Main_controller/search_try';
$route['search/result'] 			= 'Main_controller/search_result';
$route['search/result/advance'] 	= 'Main_controller/advance_search_result';

$route['superadmin'] 				= 'SuperAdmin_controller/superadmin_home';

$route['admin'] 					= 'Admin_controller/admin_home';
$route['admin/material/add'] 		= 'Admin_controller/admin_addMaterial';
$route['admin/material/published'] 	= 'Admin_controller/admin_publishedMaterial';
$route['admin/material/verify'] 	= 'Admin_controller/admin_verifyMaterial';
$route['admin/user/add'] 			= 'Admin_controller/admin_addUser';
$route['admin/user/view'] 			= 'Admin_controller/admin_viewUser';
$route['admin/profile'] 			= 'Admin_controller/admin_profile';

$route['encoder']  					= 'Encoder_controller/encoder_home'; 
$route['encoder/material/add']  	= 'Encoder_controller/encoder_addMaterial';
$route['encoder/material/pending'] 	= 'Encoder_controller/encoder_pendingMaterial';
$route['encoder/profile'] 			= 'Encoder_controller/encoder_profile';

$route['login'] 					= 'Main_controller/login';
$route['logout'] 					= 'Main_controller/logout';




