<?php

use CodeIgniter\Router\RouteCollection;
use Config\Services;

/**
 * @var RouteCollection $routes
 */
$routes = Services::routes();


/*
 * Load the system's routing file first
 */
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * Router Setup
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

/*
 * Custom Routes
 */
$routes->get('/', 'Dashboard::index');
$routes->get('/dashboard', 'Dashboard::index');

/* Mahasiswa CRUD */
$routes->get('/mahasiswa', 'Mahasiswa::index');
$routes->get('/mahasiswa/tambah', 'Mahasiswa::tambah');
$routes->post('/mahasiswa/simpan', 'Mahasiswa::simpan');
$routes->get('/mahasiswa/edit/(:segment)', 'Mahasiswa::edit/$1');
$routes->post('/mahasiswa/update/(:segment)', 'Mahasiswa::update/$1');
$routes->get('/mahasiswa/hapus/(:segment)', 'Mahasiswa::hapus/$1');

/* Nilai */
$routes->get('/nilai', 'Nilai::index');
$routes->get('/nilai/tambah', 'Nilai::tambah');
$routes->post('/nilai/simpan', 'Nilai::simpan');
$routes->post('/nilai/update', 'Nilai::update');
$routes->get('/nilai/hapus/(:num)', 'Nilai::hapus/$1');
$routes->get('/nilai/edit/(:num)', 'Nilai::edit/$1');

/* Transkrip */
$routes->get('/transkrip', 'Transkrip::index');
$routes->get('/transkrip/(:segment)', 'Transkrip::detail/$1');

/* Laporan */
$routes->get('/laporan', 'Laporan::index');

$routes->get('/dosen', 'Dosen::index');
$routes->get('/dosen/tambah', 'Dosen::tambah');
$routes->post('/dosen/simpan', 'Dosen::simpan');
$routes->get('/dosen/edit/(:segment)', 'Dosen::edit/$1');
$routes->post('/dosen/update/(:segment)', 'Dosen::update/$1');
$routes->get('/dosen/hapus/(:segment)', 'Dosen::hapus/$1');

$routes->get('/matakuliah', 'Matakuliah::index');
$routes->get('/matakuliah/tambah', 'MataKuliah::tambah');
$routes->post('/matakuliah/simpan', 'MataKuliah::simpan');
$routes->get('/matakuliah/edit/(:segment)', 'MataKuliah::edit/$1');
$routes->post('/matakuliah/update/(:segment)', 'MataKuliah::update/$1');
$routes->get('/matakuliah/hapus/(:segment)', 'MataKuliah::hapus/$1');

$routes->get('/kelas', 'Kelas::index');
$routes->get('/kelas/tambah', 'Kelas::tambah');
$routes->post('/kelas/simpan', 'Kelas::simpan');
$routes->get('/kelas/edit/(:num)', 'Kelas::edit/$1');
$routes->post('/kelas/update/(:num)', 'Kelas::update/$1');
$routes->get('/kelas/hapus/(:num)', 'Kelas::hapus/$1');

$routes->get('/log-aktivitas', 'LogAktivitas::index');



$routes->get('/login', 'Auth::login');
$routes->post('/cek-login', 'Auth::cek_login');
$routes->get('/logout', 'Auth::logout');

$routes->match(['get', 'post'], 'schema', 'Schema::index');

/*
 * Load environment Routes
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';



}
