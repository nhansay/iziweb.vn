<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "default/index";
$route['admin'] = "admin/home";

$route['admin/product/cat/(:num)'] = "admin/product/index/$1";
$route['admin/product/page/(:num)'] = "admin/product/index/0/$1";
$route['admin/product/cat/(:num)/page/(:num)'] = "admin/product/index/$1/$2";
$route['admin/product/search/(:any)/page/(:num)'] = "admin/product/search/$1/$2";

$route['admin/attribute/attr_group/(:num)'] = "admin/attribute/index/$1";
$route['admin/attribute/page/(:num)'] = "admin/attribute/index/0/$1";
$route['admin/attribute/attr_group/(:num)/page/(:num)'] = "admin/attribute/index/$1/$2";

$route['admin/post/topic/(:num)'] = "admin/post/index/$1";
$route['admin/post/page/(:num)'] = "admin/post/index/0/$1";
$route['admin/post/topic/(:num)/page/(:num)'] = "admin/post/index/$1/$2";
$route['admin/post/search/(:any)/page/(:num)'] = "admin/post/search/$1/$2";

$route['admin/([a-zA-Z]+)/page/(:num)'] = "admin/$1/index/$2";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */