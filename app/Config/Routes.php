<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/registrasi', 'Frontend\Auth::Registrasi');
// $routes->get('/login', 'Frontend\Auth::index');

$routes->get('/', 'Frontend\Auth::index');


// $routes->group('', function ($routes) {
//     $root_menu = 'Frontend\Auth';
//     //pages
//     $routes->add('/', $root_menu . '::index');
// });


$routes->group('beranda', function ($routes) {
    $root_menu = 'Backend\Home';
    //pages
    $routes->add('/', $root_menu . '::index');
});

$routes->group('agenda', function ($routes) {
    $root_menu = 'Backend\Agenda';
    //pages
    $routes->add('/', $root_menu . '::index');
});

$routes->get('perusahaan/(:any)', 'Perusahaan::index/$1');

//aktivitas
$routes->group('aktivitas', function ($routes) {
    $routes->group('perjalanan-dinas', function ($routes) {
        $root_menu = 'Backend\Aktivitas\Perjalanan_Dinas';
        //pages
        $routes->add('/', $root_menu . '::index');
        //infoASN
        $routes->get('info-asn', $root_menu . '::infoASN');
        //crud
        $routes->get('data', $root_menu . '::data');
        $routes->post('ambil-data', $root_menu . '::ambilData');
        $routes->post('simpan', $root_menu . '::simpan');
        $routes->post('hapus', $root_menu . '::hapus');
        //
        $routes->post('tambah-orang', $root_menu . '::tambahOrang');
        $routes->post('tambah-lokasi', $root_menu . '::tambahLokasi');
        $routes->get('detail-perusahaan', $root_menu . '::detailPerusahaan');
        //unduh
        $routes->get('unduh-sppd', $root_menu . '::unduhSppd');
    });
});


//laporan
$routes->group('laporan', function ($routes) {
    $routes->group('penerimaan-dd', function ($routes) {
        $root_menu = 'Backend\Laporan\Penerimaan_DD';
        //pages
        $routes->add('/', $root_menu . '::index');
    });
});


//referensi
$routes->group('referensi', function ($routes) {
    $routes->group('standar-harga', function ($routes) {
        $root_menu = 'Backend\Referensi\Standar_Harga';
        //pages
        $routes->add('/', $root_menu . '::index');
    });
});

service('auth')->routes($routes);