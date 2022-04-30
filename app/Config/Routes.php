<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
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
$routes->get('/', 'Home::index');

// $routes->get('employee/list','Admin\C_employee::index');
$routes->group('employee',function($routes){
	$routes->add('list','Admin\CEmployee::index');
	$routes->add('listes','Admin\CEmployee::listes');
	$routes->add('create','Admin\CEmployee::create');
	$routes->add('edit/(:any)','Admin\CEmployee::edit/$1');
	$routes->add('delete/(:any)','Admin\CEmployee::delete/$1');
});

//routes pour le service
$routes->get('service','Admin\CService::index');
$routes->group('service',function($routes){
	$routes->add('create','Admin\CService::create');
	$routes->add('edit/(:Any)','Admin\CService::edit/$1');
	$routes->add('list','Admin\CService::listService');
});
$routes->get('gestionpersonnel','Admin\Gestion_personnel::index');
//gestion personnel
$routes->get('gestion_personnel','Admin\CGestionPersonnel::displayEmployee');

//payement routes
$routes->get('payement','Admin\CPayement::index');
$routes->group('payement',function ($routes)
{
	$routes->add('rettrait/(:Any)','Admin\CPayement::rettrait/$1');
	// $routes->add('rettrait','Admin\CPayement::rettrait');
	$routes->add('create','Admin\CPayement::create');
});


//route salaire
$routes->get('salaire','Admin\CSalaire::index');
$routes->group('salaire',function ($routes)
{
	$routes->add('calculer','Admin\CSalaire::generer');
	$routes->add('list','Admin\CSalaire::list');
	$routes->add('teste','Admin\CSalaire::generer');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
