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
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'AdminController::index', ['as' => 'admin.dashboard']);

$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
    // Categories
    $routes->get('categories', 'CategoryController::index', ['as' => 'admin.categories.index']);
    $routes->get('categories/create', 'CategoryController::create', ['as' => 'admin.categories.create']);
    $routes->post('categories/store', 'CategoryController::store', ['as' => 'admin.categories.store']);
    $routes->get('categories/edit/(:num)', 'CategoryController::edit/$1', ['as' => 'admin.categories.edit']);
    $routes->post('categories/update/(:num)', 'CategoryController::update/$1', ['as' => 'admin.categories.update']);
    $routes->post('categories/destroy/(:num)', 'CategoryController::destroy/$1', ['as' => 'admin.categories.destroy']);
    // Tags
    $routes->get('tags', 'TagController::index', ['as' => 'admin.tags.index']);
    $routes->get('tags/create', 'TagController::create', ['as' => 'admin.tags.create']);
    $routes->post('tags/store', 'TagController::store', ['as' => 'admin.tags.store']);
    $routes->get('tags/edit/(:num)', 'TagController::edit/$1', ['as' => 'admin.tags.edit']);
    $routes->post('tags/update/(:num)', 'TagController::update/$1', ['as' => 'admin.tags.update']);
    $routes->post('tags/destroy/(:num)', 'TagController::destroy/$1', ['as' => 'admin.tags.destroy']);
    // Community Managers
    $routes->get('community-managers', 'CommunityController::index', ['as' => 'admin.community.index']);
    $routes->get('community-managers/create', 'CommunityController::create', ['as' => 'admin.community.create']);
    $routes->post('community-managers/store', 'CommunityController::store', ['as' => 'admin.community.store']);
    $routes->get('community-managers/edit/(:num)', 'CommunityController::edit/$1', ['as' => 'admin.community.edit']);
    $routes->post('community-managers/update/(:num)', 'CommunityController::update/$1', ['as' => 'admin.community.update']);
    $routes->post('community-managers/destroy/(:num)', 'CommunityController::destroy/$1', ['as' => 'admin.community.destroy']);
    // Clients
    $routes->get('clients', 'ClientController::index', ['as' => 'admin.clients.index']);
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
