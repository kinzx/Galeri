<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/tambah', 'Home::tambah');
$routes->get('/tes', 'Home::tes');
$routes->get('/profile', 'Home::profile');
$routes->get('/home', 'FotoController::home');

$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::valid_register');
$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::valid_login');
$routes->get('/logout', 'AuthController::logout');


$routes->get('/kelola', 'Home::kelola');
$routes->get('/kelolaprofile', 'Home::kelolaprofile');
$routes->get('/kelolafoto', 'home::kelolafoto');
$routes->post('/tambah', 'FotoController::creat');


$routes->get('/uploadForm', 'FotoController::uploadForm');
$routes->post('/uploadForm', 'FotoController::upload');