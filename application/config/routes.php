<?php  if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}
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
| 	example.com/class/method/id/
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
| There is one reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
*/

$route['default_controller'] = 'home';
$route['admin'] = 'administrators';
$route['admin/logout'] = 'administrators/auth/logout';

$route['question'] = 'home/question';
$route['login'] = 'users/login';
$route['logout'] = 'users/logout';
$route['register'] = 'users/register';
$route['blog'] = 'blogs';
$route['blog/view/(:num)'] = 'blogs/view/$1';
$route['blog/(:num)-(:any)'] = 'blogs/view/$1';
$route['news'] = 'posts';
$route['news/view/(:num)'] = 'posts/view/$1';
$route['news/(:num)-(:any)'] = 'posts/view/$1';
$route['questionnaires/result/(:any)'] = 'questionnaires/index/$1';
$route['questionnaires/sst/save'] = 'questionnaires/sst_save';
$route['questionnaires/sst/save/(:any)'] = 'questionnaires/sst_save/$1';
$route['check-your-symptoms'] = 'questionnaires';
$route['check-your-symptoms-2'] = 'questionnaires/sst';
/* End of file routes.php */
/* Location: ./application/config/routes.php */
