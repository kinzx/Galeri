<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/tambah', 'Home::tambah');
$routes->get('/tes', 'Home::tes');
$routes->get('/profile', 'Home::profile');
$routes->get('/home', 'Home::home');
$routes->get('/register', 'Home::register');
$routes->get('/login', 'Home::login');

