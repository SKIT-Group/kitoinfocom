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
|	https://codeigniter.com/userguide3/general/routing.html
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

$route['signup']['POST']='Auth/signup';

$route['login']['get']='Auth';
$route['login']['post']='Auth/login';

$route['logout']='Auth/logout';

$route['dashboard']='admin/Dashboard';

$route['product']='admin/Product';
$route['product/add']['POST']='admin/Product/add';
$route['product/update']['POST']='admin/Product/update';

$route['cart/add/(:num)']="Cart/add/$1";
$route['cart/update/(:num)/(:num)']="Cart/update/$1/$2";
$route['cart/remove/(:num)']="Cart/remove/$1";

$route['checkout']="Checkout";
$route['checkout/pay']['POST']="Checkout/pay";

$route['orders']="Order";
$route['order/payment/re_verify/(:num)']="Order/payment_verify/$1";

$route['paypal/return']="Checkout/paypal_return";

$route['default_controller'] = 'Home';
$route['404_override'] = 'Errors/e_404';
$route['translate_uri_dashes'] = TRUE;
