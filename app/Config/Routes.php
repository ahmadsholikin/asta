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

service('auth')->routes($routes);