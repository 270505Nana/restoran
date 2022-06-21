<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/login', 'Admin\Login::index');
//  $routes->get('/kategori/(:any)', 'admin\kategori::selectWhere/$1');

 $routes->group('admin',['filter' => 'Auth'],function($routes){
    
    $routes -> add ('/','Admin\adminpage::index');
    $routes -> add ('kategori','Admin\kategori::read');
    $routes -> add ('kategori/insert','Admin\kategori::insert');
    $routes -> add ('kategori/create','Admin\Kategori::create');
    $routes -> add ('kategori/find/(:any)','Admin\kategori::find/$1');
    $routes -> add ('kategori/update','Admin\kategori::update');
    $routes -> add ('kategori/delete/(:any)','Admin\kategori::delete/$1');

    $routes -> add ('menu','Admin\menu::index');
    $routes -> add ('pelanggan','Admin\pelanggan::index');
    $routes -> add ('order','Admin\order::index');
    $routes -> add ('orderdetail','Admin\orderdetail::index');
    $routes -> add ('user','Admin\user::index');
 });



// $routes->get('/kategori', 'Kategori::index');
// $routes->get('/menu', 'Menu::index');
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
