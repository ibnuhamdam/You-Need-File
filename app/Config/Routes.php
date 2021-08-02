<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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
$routes->get('/', 'User::getStarted');

$routes->group('user', ['filter' => 'login'], function ($routes) {
	$routes->add('/', 'User::index');
	$routes->add('index', 'User::index');
	$routes->add('profile', 'User::profile');
	$routes->add('file/(:any)', 'User::file/$1');
	$routes->add('meet', 'User::meet');
	$routes->add('meet/(:num)', 'User::meetDetail/$1');
	$routes->add('edit/(:num)', 'User::edit/$1');
	$routes->post('update/(:num)', 'User::update/$1');
	$routes->add('back', 'User::back');
});

$routes->group('admin', ['filter' => 'role:admin'], function ($routes) {
	$routes->get('/', 'Admin::index');
});


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