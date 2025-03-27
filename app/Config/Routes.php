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
// Route file 
$routes->get('file/profile_picture/(:segment)', 'FileController::profile_picture/$1');
$routes->get('file/rangkuman_nilai/(:segment)', 'FileController::rangkuman_nilai/$1');

// $routes->get('file/payment_proof/(:segment)', 'FileController::payment_proof/$1');
// $routes->get('file/download_file/(:segment)', 'FileController::download_file/$1');

// Route untuk admin
$routes->get('admin/login', 'Admin::login_admin');
$routes->get('admin/logout', 'Admin::logout_admin');
$routes->post('admin/login_check', 'Admin::admin_login_check');

$routes->group('admin', ['filter' => 'authAdmin'], function ($routes) {


    $routes->get('profile', 'Admin::profile_admin');
    $routes->post('profile/cedit/(:segment)', 'Admin::cedit_profile/$1');
    $routes->get('home', 'Admin::home');

    $routes->get('beasiswa', 'Admin::beasiswa');
    $routes->get('beasiswa/add', 'Admin::add_beasiswa');
    $routes->get('beasiswa/edit/(:segment)', 'Admin::edit_beasiswa/$1');
    $routes->post('beasiswa/cedit/(:segment)', 'Admin::cedit_beasiswa/$1');
    $routes->get('beasiswa/delete/(:segment)', 'Admin::del_beasiswa/$1');
    $routes->post('beasiswa/save', 'Admin::save_beasiswa');


    $routes->get('penerima', 'Admin::penerima');
    $routes->get('penerima/add', 'Admin::add_penerima');
    $routes->get('penerima/edit/(:segment)', 'Admin::edit_penerima/$1');
    $routes->post('penerima/cedit/(:segment)', 'Admin::cedit_penerima/$1');
    $routes->get('penerima/import', 'Admin::import_penerima');
    $routes->post('penerima/cimport', 'Admin::cimport_penerima');
    $routes->get('penerima/delete/(:segment)', 'Admin::del_penerima/$1');
    $routes->post('penerima/save', 'Admin::save_penerima');

    $routes->get('akademik', 'Admin::akademik');
    $routes->get('akademik/confirm', 'Admin::confirm_akademik');
    $routes->get('akademik/add', 'Admin::add_akademik');
    $routes->get('akademik/edit/(:segment)', 'Admin::edit_akademik/$1');
    $routes->post('akademik/cedit/(:segment)', 'Admin::cedit_akademik/$1');    
    $routes->post('akademik/confirm/all', 'Admin::save_confirm_akademik');
    $routes->post('akademik/save', 'Admin::save_akademik');

    $routes->get('prestasi', 'Admin::prestasi');
    $routes->get('prestasi/add', 'Admin::add_prestasi');
    $routes->get('prestasi/edit/(:segment)', 'Admin::edit_prestasi/$1');
    $routes->post('prestasi/cedit/(:segment)', 'Admin::cedit_prestasi/$1');
    $routes->post('prestasi/save', 'Admin::save_prestasi');
    $routes->get('prestasi/confirm', 'Admin::confirm_prestasi');
    $routes->post('prestasi/confirm/all', 'Admin::save_confirm_prestasi');
    
    

    $routes->get('mbkm', 'Admin::mbkm');
    $routes->get('mbkm/add', 'Admin::add_mbkm');
    $routes->get('mbkm/edit/(:segment)', 'Admin::edit_mbkm/$1');
    $routes->post('mbkm/cedit/(:segment)', 'Admin::cedit_mbkm/$1');
    $routes->post('mbkm/save', 'Admin::save_mbkm');
    $routes->get('mbkm/confirm', 'Admin::confirm_mbkm');
    $routes->post('mbkm/confirm/all', 'Admin::save_confirm_mbkm');

    $routes->get('keaktifan', 'Admin::keaktifan');
    $routes->get('keaktifan/add', 'Admin::add_keaktifan');
    $routes->get('keaktifan/edit/(:segment)', 'Admin::edit_keaktifan/$1');
    $routes->get('keaktifan/confirm', 'Admin::confirm_keaktifan');
    $routes->post('keaktifan/cedit/(:segment)', 'Admin::cedit_keaktifan/$1');
    $routes->post('keaktifan/confirm/all', 'Admin::save_confirm_keaktifan');
    $routes->post('keaktifan/save', 'Admin::save_keaktifan');
    
    
    
    
    
    

    $routes->get('gform', 'Admin::gform');
    $routes->get('gform/add', 'Admin::add_gform');
    $routes->get('gform/edit/(:segment)', 'Admin::edit_gform/$1');
    $routes->post('gform/cedit/(:segment)', 'Admin::cedit_gform/$1');
    $routes->post('gform/save', 'Admin::save_gform');
    $routes->get('gform/delete/(:segment)', 'Admin::del_gform/$1');

    $routes->get('pengumuman', 'Admin::pengumuman');
    $routes->get('pengumuman/add', 'Admin::add_pengumuman');
    $routes->get('pengumuman/edit/(:segment)', 'Admin::edit_pengumuman/$1');
    $routes->post('pengumuman/cedit/(:segment)', 'Admin::cedit_pengumuman/$1');
    $routes->post('pengumuman/save', 'Admin::save_pengumuman');
    $routes->get('pengumuman/delete/(:segment)', 'Admin::del_pengumuman/$1');

    $routes->get('panduan', 'Admin::panduan');

    $routes->get('manajemen', 'Admin::manajemen');
    $routes->get('manajemen/add', 'Admin::add_manajemen');
    $routes->get('manajemen/edit/(:segment)', 'Admin::edit_manajemen/$1');
    $routes->post('manajemen/cedit/(:segment)', 'Admin::cedit_manajemen/$1');
    $routes->post('manajemen/save', 'Admin::save_manajemen');
    $routes->get('manajemen/delete/(:segment)', 'Admin::del_manajemen/$1');

    $routes->get('log', 'Admin::log');

    $routes->get('tahun-ajaran', 'Admin::tahun_ajaran');
    $routes->post('tahun-ajaran/save', 'Admin::save_tahun_ajaran');
    $routes->post('tahun-ajaran/cedit/(:segment)', 'Admin::cedit_tahun_ajaran/$1');
    $routes->post('tahun-ajaran/delete/(:segment)', 'Admin::del_tahun_ajaran/$1');

    $routes->get('program-studi', 'Admin::program_studi');
    $routes->post('program-studi/save', 'Admin::save_program_studi');
    $routes->post('program-studi/cedit/(:segment)', 'Admin::cedit_program_studi/$1');
    $routes->post('program-studi/delete/(:segment)', 'Admin::del_program_studi/$1');

});

//____________________________________________________________________________________________________

// Route untuk penerima beasiswa
$routes->get('user/login', 'User::user_login');
$routes->get('user/logout', 'User::user_logout');
$routes->post('user/login_check', 'User::user_login_check');

$routes->group('user', ['filter' => 'authUser'], function ($routes) {

    $routes->get('profile', 'User::user_profile');
    $routes->get('home', 'User::user_home');
    $routes->post('profile/cedit/(:segment)', 'User::cedit_user_profile/$1');
    $routes->post('profile/pass/(:segment)', 'User::cedit_password_profile/$1');
   

    $routes->get('akademik', 'User::user_akademik');
    $routes->get('akademik/add', 'User::user_add_akademik');
    $routes->post('akademik/save', 'User::user_save_akademik');
    $routes->get('akademik/edit/(:segment)', 'User::user_edit_akademik/$1');
    $routes->post('akademik/cedit/(:segment)', 'User::user_cedit_akademik/$1');

    $routes->get('prestasi', 'User::user_prestasi');
    $routes->get('prestasi/add', 'User::user_add_prestasi');
    $routes->post('prestasi/save', 'User::user_save_prestasi');
    $routes->get('prestasi/edit/(:segment)', 'User::user_edit_prestasi/$1');
    $routes->post('prestasi/cedit/(:segment)', 'User::user_cedit_prestasi/$1');

    $routes->get('mbkm', 'User::user_mbkm');
    $routes->get('mbkm/add', 'User::user_add_mbkm');
    $routes->post('mbkm/save', 'User::user_save_mbkm');
    $routes->get('mbkm/edit/(:segment)', 'User::user_edit_mbkm/$1');
    $routes->post('mbkm/cedit/(:segment)', 'User::user_cedit_mbkm/$1');

    $routes->get('keaktifan', 'User::user_keaktifan');
    $routes->get('keaktifan/add', 'User::user_add_keaktifan');
    $routes->post('keaktifan/save', 'User::user_save_keaktifan');
    $routes->get('keaktifan/edit/(:segment)', 'User::user_edit_keaktifan/$1');
    $routes->post('keaktifan/cedit/(:segment)', 'User::user_cedit_keaktifan/$1');

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
$routes->get('/admin', 'Home::admin_index');

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
