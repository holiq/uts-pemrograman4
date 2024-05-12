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
$routes->get('/anggota', 'Anggota::index');
$routes->get('/anggota/create', 'Anggota::create');
$routes->post('/anggota/store', 'Anggota::store');
$routes->get('/anggota/edit/(:num)', 'Anggota::edit/$1');
$routes->put('/anggota/update/(:num)', 'Anggota::update/$1');
$routes->delete('/anggota/delete/(:num)', 'Anggota::destroy/$1');
$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::process');
$routes->get('/logout', 'Login::destroy');
