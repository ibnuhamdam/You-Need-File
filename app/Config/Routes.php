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
$routes->get('/maintenance', 'Home::maintenance');

$routes->group('user', ['filter' => 'login'], function ($routes) {
	$routes->add('/', 'User::index');
	$routes->add('index', 'User::index');
	$routes->add('profile/(:num)', 'User::profile/$1');
	$routes->add('file/(:any)/(:any)', 'User::file/$1/$2');
	$routes->add('meet', 'User::meet');
	$routes->add('meet/(:num)', 'User::meetDetail/$1');
	$routes->add('edit/(:num)', 'User::edit/$1');
	$routes->post('update/(:num)', 'User::update/$1');
	$routes->add('back', 'User::back');
	$routes->post('add', 'User::addUser');
});

$routes->group('admin', ['filter' => 'role:admin,superadmin'], function ($routes) {
	$routes->add('/', 'Admin::index');
	$routes->add('index', 'Admin::index');
	// User
	$routes->add('users', 'Admin::user');
	$routes->post('users/(:num)', 'User::deleteUser/$1');
	$routes->post('users/update', 'Admin::updateUser');
	// Bidang
	$routes->add('bidang', 'Admin::bidang');
	$routes->post('bidang', 'Admin::addBidang');
	$routes->post('bidang/update', 'Admin::updateBidang');
	$routes->post('bidang/(:num)', 'Admin::deleteBidang/$1');
	// Meeting
	$routes->add('meeting', 'Meeting::index');
	$routes->add('meeting/(:num)', 'Meeting::detail/$1');
	$routes->add('meeting/index', 'Meeting::index');
	$routes->add('meeting/add', 'Meeting::add');
	$routes->post('meeting/insert', 'Meeting::insert');
	$routes->add('meeting/edit/(:num)', 'Meeting::edit/$1');
	$routes->post('meeting/delete', 'Meeting::delete');
	$routes->post('meeting/update', 'Meeting::update');
	$routes->add('meeting/reminder', 'Meeting::reminder');
	// Paparan
	$routes->add('files/paparan', 'Files::paparan');
	$routes->add('files/paparan/add', 'Files::addPaparan');
	$routes->post('files/paparan/insert', 'Files::insertPaparan');
	$routes->add('files/paparan/edit/(:num)', 'Files::editPaparan/$1');
	$routes->post('files/paparan/update', 'Files::updatePaparan');
	$routes->post('files/paparan/delete', 'Files::deletePaparan');
	// Dokumentasi
	$routes->add('files/dokumentasi', 'Files::dokumentasi');
	$routes->add('files/dokumentasi/add', 'Files::addDokumentasi');
	$routes->post('files/dokumentasi/insert', 'Files::insertDokumentasi');
	$routes->add('files/dokumentasi/edit/(:num)', 'Files::editDokumentasi/$1');
	$routes->post('files/dokumentasi/update', 'Files::updateDokumentasi');
	$routes->post('files/dokumentasi/delete', 'Files::deleteDokumentasi');
	// Attendes
	$routes->add('files/attendes', 'Files::attendes');
	$routes->add('files/attendes/add', 'Files::addAttendes');
	$routes->post('files/attendes/insert', 'Files::insertAttendes');
	$routes->add('files/attendes/edit/(:num)', 'Files::editAttendes/$1');
	$routes->post('files/attendes/update', 'Files::updateAttendes');
	$routes->post('files/attendes/delete', 'Files::deleteAttendes');
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
