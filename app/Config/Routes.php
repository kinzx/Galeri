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
$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::valid_register');
$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::valid_login');
$routes->get('/kelola', 'Home::kelola');
$routes->get('/logout', 'AuthController::logout');
$routes->get('/kelolafoto', 'home::kelolafoto');


