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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
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
$routes->get('/kos', 'Kos::index');
$routes->delete('/kos/(:num)', 'Kos::hapusKos/$1');
$routes->get('/kos/(:any)', 'Kos::dataKos/$1');
// $routes->get('/register/rantau', 'Akun::daftarRantau');
// $routes->get('/register/pemilik', 'Akun::daftarPemilik');
// $routes->get('/login', 'Akun::login');
$routes->get('/profil', 'Akun::profil');
$routes->get('/tambahKos', 'Kos::tambahKos');
$routes->post('/simpanKos', 'Kos::save');
$routes->post('/editKos/(:num)', 'Kos::editKos/$1');
$routes->post('/updateKos/(:num)', 'Kos::updateKos/$1');
$routes->post('/hubungi', 'Kos::hubungi');
$routes->post('/gantiKontak/(:num)', 'Akun::updateAkun/$1');



$routes->get('/hielo', 'Home::elements');

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
