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
$route['default_controller'] = 'pages/home';
$route['language/([a-z]+)'] = 'config/language/$1';
$route['home'] = 'pages/home';
$route['profile'] = 'profile/index';
$route['profile/edit'] = 'profile/edit';
$route['pages/history'] = 'pages/show/1';
$route['pages/add'] = 'pages/add';
$route['pages/view'] = 'pages/view';
$route['pages/(:any)'] = 'pages/show/$1';
$route['account'] = 'account/index';
$route['account/signin'] = 'account/signin';
$route['account/signout'] = 'account/signout';
$route['account/register'] = 'fastregister';
$route['account/request'] = 'accountrequest/create';
$route['news'] = 'news';
$route['news/edit'] = 'news/edit';
$route['news/edit/(:any)'] = 'news/edit/$1';
$route['news/add'] = 'news/add';
$route['news/view'] = 'news/view';
$route['news/(:any)'] = 'news/view/$1';
$route['events'] = 'events/index';
$route['events/add'] = 'events/add';
$route['events/api'] = 'events/api';
$route['events/(:any)'] = 'events/view/$1';
$route['careers'] = 'careers/index';
$route['careers/add'] = 'careers/add';
$route['careers/edit/(:num)'] = 'careers/edit/$1';
$route['careers/delete'] = 'careers/delete';
$route['careers/(:any)'] = 'careers/view/$1';
$route['admin'] = 'admin/index';
$route['admin/initialize'] = 'admin/initialize';
$route['admin/pages'] = 'pages/view';
$route['admin/news'] = 'news/admin_index';
$route['admin/news/add'] = 'news/add';
$route['admin/news/delete'] = 'news/delete';
$route['admin/events'] = 'events/admin_index';
$route['admin/events/delete'] = 'events/delete';
$route['admin/events/add'] = 'events/add';
$route['admin/events'] = 'events/admin_index';
$route['admin/events/(:any)'] = 'events/edit/$1';
$route['admin/profile'] = 'profile/admin_index';
$route['admin/download'] = 'profile/download';
$route['admin/account_request/accept/(:num)'] = 'accountrequest/admin_accept/$1';
$route['admin/account_request/delete/(:num)'] = 'accountrequest/admin_delete/$1';
$route['admin/careers/publish/(:any)'] = 'careers/publish/$1';
$route['admin/careers/delete/(:num)'] = 'careers/delete/$1';
$route['admin/careers/history'] = 'careers/admin_history';
$route['migrate'] = '404_override';
$route['(:any)'] = '404_override';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
