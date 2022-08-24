<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// admin //

// Auth
$route['administration/sign-in'] = 'admin/auth/signIn';
$route['administration/add-user'] = 'admin/user/addUser';
$route['administration/users'] = 'admin/user';

// Web Config 
$route['administration/web-configuration'] = 'admin/config/index';

$route['administration/dashboard'] = 'admin/dashboard';

// category
$route['administration/category'] = 'admin/category';
$route['administration/add-category'] = 'admin/category/index/add';
$route['administration/edit-category/(:any)'] = 'admin/category/index/edit/$1';

// client
$route['administration/client'] = 'admin/client';
$route['administration/add-client'] = 'admin/client/index/add';
$route['administration/edit-client/(:any)'] = 'admin/client/index/edit/$1';
$route['administration/company'] = 'admin/client/company';
$route['administration/add-company'] = 'admin/client/company/add';
$route['administration/edit-company/(:any)'] = 'admin/client/company/edit/$1';

// service
$route['administration/service'] = 'admin/service';
$route['administration/add-service'] = 'admin/service/addService';
$route['administration/detail-service/(:any)'] = 'admin/service/detailService/$1';
$route['administration/edit-service/(:any)'] = 'admin/service/editService/$1';

// feature
$route['administration/add-feature/(:any)'] = 'admin/feature/addFeature/$1';
$route['administration/edit-feature/(:any)'] = 'admin/feature/editFeature/$1';

// portfolio
$route['administration/portfolio'] = 'admin/portfolio';
$route['administration/add-portfolio'] = 'admin/portfolio/add';
$route['administration/edit-portfolio/(:any)'] = 'admin/portfolio/edit/$1';
$route['administration/detail-portfolio/(:any)'] = 'admin/portfolio/detailPortfolio/$1';

// backgorund
$route['administration/backgrounds'] = 'admin/background';
$route['administration/edit-bg-home'] = 'admin/background/index/editBgHome';
$route['administration/edit-bg-pd'] = 'admin/background/index/editBgPd';
$route['administration/edit-bg-service'] = 'admin/background/index/editBgService';
$route['administration/edit-bg-service-feature'] = 'admin/background/index/editBgServiceFeature';
$route['administration/edit-bg-portfolio'] = 'admin/background/index/editBgPortfolio';
$route['administration/edit-bg-about'] = 'admin/background/index/editBgAbout';
$route['administration/edit-bg-contact'] = 'admin/background/index/editBgContact';




// end admin //

$route['detail-service/(:any)'] = 'service/detail/$1';
$route['detail-portfolio/(:any)'] = 'portfolio/detail/$1';
