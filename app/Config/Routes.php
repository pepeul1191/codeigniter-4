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
$routes->add('/', 'Home::index', ['filter' => 'GET']);
$routes->add('/master-data/location','Home::index', ['filter' => 'GET']); 
$routes->add('/master-data/specialism','Home::index', ['filter' => 'GET']); 
$routes->add('/coa/dentist','Home::index', ['filter' => 'GET']); 
$routes->add('/coa/dentist/edit/(:num)','Home::index', ['filter' => 'GET']); 
$routes->add('/coa/dentist/add','Home::index', ['filter' => 'GET']);
$routes->add('/coa/branch','Home::index', ['filter' => 'GET']); 
$routes->add('/coa/branch/edit/(:num)','Home::index', ['filter' => 'GET']); 
$routes->add('/coa/branch/add','Home::index', ['filter' => 'GET']);

$routes->add('/demo', 'Home::demo', ['filter' => 'GET']);
$routes->add('/specialism/list', 'Specialism::list', ['filter' => 'GET']);

$routes->add('/error/access/(:num)', 'Error::access/$1', ['filter' => 'GET']);
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
