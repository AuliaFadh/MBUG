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
$routes->group('admin', function ($routes) {
    $routes->get('test', 'Admin::test');
    $routes->get('login', 'Admin::login_admin');
    $routes->get('logout', 'Admin::logout_admin');
    $routes->post('login_check', 'Admin::admin_login_check');
    $routes->get('profile', 'Admin::profile_admin');
    $routes->get('home', 'Admin::home');

    $routes->get('beasiswa', 'Admin::beasiswa');
    $routes->get('beasiswa/add', 'Admin::add_beasiswa');
    $routes->get('beasiswa/edit/(:any)', 'Admin::edit_beasiswa/$1');
    $routes->post('beasiswa/cedit/(:any)', 'Admin::cedit_beasiswa/$1');
    $routes->get('beasiswa/delete/(:any)', 'Admin::del_beasiswa/$1');
    $routes->post('beasiswa/save', 'Admin::save_beasiswa');


    $routes->get('penerima', 'Admin::penerima');
    $routes->get('penerima/add', 'Admin::add_penerima');
    $routes->get('penerima/edit/(:any)', 'Admin::edit_penerima/$1');
    $routes->post('penerima/cedit/(:any)', 'Admin::cedit_penerima/$1');
    $routes->get('penerima/import', 'Admin::import_penerima');
    $routes->get('penerima/delete/(:any)', 'Admin::del_penerima/$1');
    $routes->post('penerima/save', 'Admin::save_penerima');

    $routes->get('akademik', 'Admin::akademik');
    $routes->get('akademik/add', 'Admin::add_akademik');
    $routes->get('akademik/edit/(:any)', 'Admin::edit_akademik/$1');
    $routes->post('akademik/cedit/(:any)', 'Admin::cedit_akademik/$1');
    $routes->post('akademik/save', 'Admin::save_akademik');

    $routes->get('prestasi', 'Admin::prestasi');
    $routes->get('prestasi/add', 'Admin::add_prestasi');
    $routes->get('prestasi/edit/(:any)', 'Admin::edit_prestasi/$1');
    $routes->post('prestasi/cedit/(:any)', 'Admin::cedit_prestasi/$1');
    $routes->post('prestasi/save', 'Admin::save_prestasi');

    $routes->get('mbkm', 'Admin::mbkm');
    $routes->get('mbkm/add', 'Admin::add_mbkm');
    $routes->get('mbkm/edit/(:any)', 'Admin::edit_mbkm/$1');
    $routes->post('mbkm/cedit/(:any)', 'Admin::cedit_mbkm/$1');
    $routes->post('mbkm/save', 'Admin::save_mbkm');

    $routes->get('keaktifan', 'Admin::keaktifan');
    $routes->get('keaktifan/add', 'Admin::add_keaktifan');
    $routes->get('keaktifan/edit/(:any)', 'Admin::edit_keaktifan/$1');
    $routes->post('keaktifan/cedit/(:any)', 'Admin::cedit_keaktifan/$1');
    $routes->post('keaktifan/save', 'Admin::save_keaktifan');

    $routes->get('gform', 'Admin::gform');
    $routes->get('gform/add', 'Admin::add_gform');
    $routes->get('gform/edit/(:any)', 'Admin::edit_gform/$1');
    $routes->post('gform/cedit/(:any)', 'Admin::cedit_gform/$1');
    $routes->post('gform/save', 'Admin::save_gform');
    $routes->get('gform/delete/(:any)', 'Admin::del_gform/$1');

    $routes->get('pengumuman', 'Admin::pengumuman');
    $routes->get('pengumuman/add', 'Admin::add_pengumuman');
    $routes->get('pengumuman/edit/(:any)', 'Admin::edit_pengumuman/$1');
    $routes->post('pengumuman/cedit/(:any)', 'Admin::cedit_pengumuman/$1');
    $routes->post('pengumuman/save', 'Admin::save_pengumuman');
    $routes->get('pengumuman/delete/(:any)', 'Admin::del_pengumuman/$1');

    $routes->get('panduan', 'Admin::panduan');

    $routes->get('manajemen', 'Admin::manajemen');
    $routes->get('manajemen/add', 'Admin::add_manajemen');
    $routes->get('manajemen/edit/(:any)', 'Admin::edit_manajemen/$1');
    $routes->post('manajemen/cedit/(:any)', 'Admin::cedit_manajemen/$1');
    $routes->post('manajemen/save', 'Admin::save_manajemen');
    $routes->get('manajemen/delete/(:any)', 'Admin::del_manajemen/$1');

    $routes->get('log', 'Admin::log');
});


//____________________________________________________________________________________________________

$routes->group('user', function ($routes) {
    $routes->get('login', 'User::user_login');
    $routes->get('logout', 'User::user_logout');
    $routes->post('login_check', 'User::user_login_check');
    $routes->get('profile', 'User::user_profile');
    $routes->post('profile/cedit/(:any)', 'User::cedit_user_profile/$1');
    $routes->post('profile/pass/(:any)', 'User::cedit_password_profile/$1');
    $routes->get('home', 'User::user_home');

    $routes->get('akademik', 'User::user_akademik');
    $routes->get('akademik/add', 'User::user_add_akademik');
    $routes->get('akademik/edit/(:any)', 'User::user_edit_akademik/$1');

    $routes->get('prestasi', 'User::user_prestasi');
    $routes->get('prestasi/add', 'User::user_add_prestasi');
    $routes->get('prestasi/edit/(:any)', 'User::user_edit_prestasi/$1');

    $routes->get('mbkm', 'User::user_mbkm');
    $routes->get('mbkm/add', 'User::user_add_mbkm');
    $routes->get('mbkm/edit/(:any)', 'User::user_edit_mbkm');

    $routes->get('keaktifan', 'User::user_keaktifan');
    $routes->get('keaktifan/add', 'User::user_add_keaktifan');
    $routes->get('keaktifan/edit/(:any)', 'User::user_edit_keaktifan/$1');

    $routes->get('panduan', 'User::user_panduan');
});


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
