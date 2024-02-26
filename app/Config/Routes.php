<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/tambah', 'Home::tambah');
$routes->get('/tes', 'Home::tes');


$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::valid_register');
$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::valid_login');
$routes->get('/logout', 'AuthController::logout');

$routes->post('/editProfile', 'Home::editProfile');
$routes->get('/kelolaprofile', 'Home::kelolaprofile');

$routes->get('/kelolafoto', 'FotoController::kelolafoto');
$routes->post('delete/(:num)', 'FotoController::delete/$1');
$routes->post('edit/(:num)', 'FotoController::edit/$1');
$routes->post('update/(:any)', 'FotoController::update/$1'); // Tambahkan rute untuk menangani update foto
$routes->get('like/(:any)', 'FotoController::like/$1');

$routes->get('/uploadForm', 'FotoController::uploadForm');
$routes->post('/uploadForm', 'FotoController::upload');

$routes->post('hapus_foto/(:num)', 'Home::hapusFoto/$1');

$routes->get('/home', 'FotoController::home');
$routes->post('/home/(:any)', 'KomentarController::tambahkomentar/$1');
$routes->post('/simpan-foto', 'FotoController::simpanFoto');

$routes->get('like/(:num)', 'FotoController::like/$1');

$routes->post('/album/create', 'AlbumController::create');
$routes->get('/album', 'Home::album');
$routes->get('/profile', 'Home::profile');
// $routes->post('hapus_album/(:num)', 'Home::hapus_album/$1');
$routes->post('hapus_album/(:num)', 'Home::hapus_album/$1');
