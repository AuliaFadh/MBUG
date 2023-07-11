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
$routes->get('/dashboard', 'frontend::dashboard');
$routes->get('/beasiswa', 'frontend::beasiswa');
$routes->get('/penerima', 'frontend::penerima');
$routes->get('/akademik', 'frontend::akademik');
$routes->get('/mbkm', 'frontend::mbkm');
$routes->get('/prestasi', 'frontend::prestasi');
$routes->get('/log-aktivitas', 'frontend::log_aktivitas');
$routes->get('/manajemen', 'frontend::manajemen');
$routes->get('/tambah-beasiswa', 'Masuk::input_beasiswa');
$routes->get('/tambah-user', 'frontend::tambah_user');
$routes->get('/beasiswa/edit', 'frontend::edit_beasiswa');

$routes->post('/Masuk/save_beasiswa', 'Masuk::save_beasiswa');


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
