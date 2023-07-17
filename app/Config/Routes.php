<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */

$routes->setDefaultNamespace('App\Controllers');
//$routes->setDefaultController('Home');
//$routes->setDefaultMethod('index');
$routes->get('/admin/login', 'Admin::login_admin');
$routes->get('/admin/profile', 'Admin::profile_admin');
$routes->get('/admin/home', 'Admin::home');


$routes->get('/admin/beasiswa', 'Admin::beasiswa');
$routes->get('/admin/beasiswa/add', 'Admin::add_beasiswa');
$routes->get('/admin/beasiswa/edit/(:any)', 'Admin::edit_beasiswa/$1');
$routes->post('/admin/beasiswa/save', 'Admin::save_beasiswa');
$routes->get('/admin/beasiswa/delete/(:any)', 'Admin::del_beasiswa/$1');


$routes->get('/admin/penerima', 'Admin::penerima');
$routes->get('/admin/penerima/add', 'Admin::add_penerima');
$routes->get('/admin/penerima/edit/(:any)', 'Admin::edit_penerima/$1');
$routes->get('/admin/penerima/import', 'Admin::import_penerima');
$routes->post('/admin/penerima/save', 'Admin::save_penerima');
$routes->get('/admin/penerima/delete/(:any)', 'Admin::del_penerima/$1');

$routes->get('/admin/akademik', 'Admin::akademik');
$routes->get('/admin/akademik/add', 'Admin::add_akademik');
$routes->get('/admin/akademik/edit/(:any)', 'Admin::edit_akademik/$1');

$routes->get('/admin/prestasi', 'Admin::prestasi');
$routes->get('/admin/prestasi/add', 'Admin::add_prestasi');
$routes->get('/admin/prestasi/edit/(:any)', 'Admin::edit_prestasi/$1');

$routes->get('/admin/mbkm', 'Admin::mbkm');
$routes->get('/admin/mbkm/add', 'Admin::add_mbkm');
$routes->get('/admin/mbkm/edit/(:any)', 'Admin::edit_mbkm');

$routes->get('/admin/keaktifan', 'Admin::keaktifan');
$routes->get('/admin/keaktifan/add', 'Admin::add_keaktifan');
$routes->get('/admin/keaktifan/edit/(:any)', 'Admin::edit_keaktifan/$1');


$routes->get('/admin/gform', 'Admin::gform');
$routes->get('/admin/gform/add', 'Admin::add_gform');
$routes->get('/admin/gform/edit/(:any)', 'Admin::edit_gform/$1');

$routes->get('/admin/pengumuman', 'Admin::pengumuman');
$routes->get('/admin/pengumuman/add', 'Admin::add_pengumuman');
$routes->get('/admin/pengumuman/edit/(:any)', 'Admin::edit_pengumuman/$1');

$routes->get('/admin/panduan', 'Admin::panduan');

$routes->get('/admin/manajemen', 'Admin::manajemen');
$routes->get('/admin/manajemen/add', 'Admin::add_manajemen');
$routes->get('/admin/manajemen/edit/(:any)', 'Admin::edit_manajemen/$1');

$routes->get('/admin/log', 'Admin::log');


$routes->get('/user/login', 'User::user_login');
$routes->get('/user/keaktifan', 'User::keaktifan');







// $routes->setTranslateURIDashes(false);
// $routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
