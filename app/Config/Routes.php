<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/jabatan', 'Jabatan::index');
$routes->get('/jabatan/create', 'Jabatan::create');
$routes->post('/jabatan/store', 'Jabatan::store');
$routes->get('/jabatan/edit/(:num)', 'Jabatan::edit/$1');
$routes->put('/jabatan/update/(:num)', 'Jabatan::update/$1');
$routes->delete('/jabatan/delete/(:num)', 'Jabatan::destroy/$1');
$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::process');
$routes->get('/logout', 'Login::destroy');
