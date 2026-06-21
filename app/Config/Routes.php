<?php

use CodeIgniter\Router\RouteCollection;
use DeepCopy\Filter\Filter;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/home', 'User::index');
$routes->get('/login', 'Login::index');

$routes->get('/surat', 'Surat::index');
$routes->get('/surat/SKTM', 'Surat::SKTM');
$routes->post('/surat/cetakSKTM', 'Surat::cetakSKTM');
$routes->post('/surat/cetakNamaSama', 'Surat::cetakNamaSama');
$routes->get('/surat/NamaSama', 'Surat::NamaSama');
$routes->get('/surat/getJabatan/(:num)', 'Surat::getJabatan/$1');
$routes->get('/surat/getJabatan/(:any)', 'Surat::getJabatan/$1');
$routes->get('/surat/(:any)', 'Surat::unduhDokumen/$1');

$routes->get('/arsip', 'Arsip::index');
$routes->get('arsip/detail/(:num)', 'Arsip::detail/$1');
$routes->get('arsip/add', 'Arsip::formArsip');
$routes->post('arsip/addArsip', 'Arsip::addArsip');
$routes->get('arsip/download/(:num)', 'Arsip::download/$1');
$routes->get('arsip/delete/(:num)', 'Arsip::delete/$1');
$routes->get('arsip/edit/(:num)', 'Arsip::edit/$1');
$routes->post('arsip/update/(:num)', 'Arsip::update/$1');


$routes->get('/admin/user_list', 'Admin::user_list', ['filter' => 'role:admin']);
$routes->get('/admin/tambah_user', 'Admin::addUser', ['filter' => 'role:admin']);
$routes->post('/admin/addUser', 'Admin::saveUser', ['filter' => 'role:admin']);
$routes->get('/admin/(:num)', 'Admin::detail/$1', ['filter' => 'role:admin']);
$routes->get('admin/editUser/(:num)', 'Admin::editUser/$1', ['filter' => 'role:admin']);
$routes->post('admin/updateUser/(:num)', 'Admin::updateUser/$1', ['filter' => 'role:admin']);
$routes->get('admin/deleteUser/(:num)', 'Admin::deleteUser/$1', ['filter' => 'role:admin']);
