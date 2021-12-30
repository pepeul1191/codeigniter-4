<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
# app
$routes->get('/', 'Home::index', ['filter' => 'GET']);
$routes->get('/master-data/location','Home::index', ['filter' => 'GET']); 
$routes->get('/master-data/specialism','Home::index', ['filter' => 'GET']); 
$routes->get('/coa/dentist','Home::index', ['filter' => 'GET']); 
$routes->get('/coa/dentist/edit/(:num)','Home::index', ['filter' => 'GET']); 
$routes->get('/coa/dentist/add','Home::index', ['filter' => 'GET']);
$routes->get('/coa/branch','Home::index', ['filter' => 'GET']); 
$routes->get('/coa/branch/edit/(:num)','Home::index', ['filter' => 'GET']); 
$routes->get('/coa/branch/add','Home::index', ['filter' => 'GET']);
# login
$routes->get('/login','Login::index', ['filter' => 'GET']);
$routes->get('/login/sign-in', 'Login::index', ['filter' => 'GET']);
$routes->get('/login/reset-password','Login::index', ['filter' => 'GET']);
$routes->post('/login','Login::access', ['filter' => 'CSRFForm']);
# session
$routes->get('/user','Home::user', ['filter' => 'GET']);
# api rest
$routes->get('/demo', 'Home::demo', ['filter' => 'GET']);
$routes->get('/specialism/list', 'Specialism::list', ['filter' => 'GET']);
$routes->add('/specialism/save', 'Specialism::save', ['filter' => 'POST']);

$routes->get('/error/access/(:num)', 'Error::access/$1', ['filter' => 'GET']);
$routes->set404Override('App\Controllers\Error::go404');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
