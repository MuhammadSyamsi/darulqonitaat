<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/
$routes->get('/', 'Home::index');

/*
|--------------------------------------------------------------------------
| DARUL QONITAAT - PUBLIC WEBSITE
|--------------------------------------------------------------------------
*/
$routes->group('darulqonitaat', static function ($routes) {

    // Website publik
    $routes->get('/', 'Home::landing');
    $routes->get('pengembangan', 'Home::pengembangan');
    $routes->get('psb', 'Home::psb');

    // Auth manual (opsional jika Shield dipakai penuh)
    $routes->get('login', 'Auth::login');
    // $routes->get('logout', 'Auth::logout');
    $routes->get('register', 'Auth::register');
});

/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
*/
$routes->group(
    'darulqonitaat/admin',
    // ['filter' => 'auth,role:admin'],
    static function ($routes) {

        $routes->get('/', 'Dashboard::index');
        $routes->get('register', 'Admin::register');
        $routes->get('custom', 'Admin::custom');
        $routes->get('delete', 'Admin::delet');
    }
);

/*
|--------------------------------------------------------------------------
| STAFF AREA
|--------------------------------------------------------------------------
*/
$routes->group(
    'darulqonitaat/staff',
    ['filter' => 'auth,role:staff'],
    static function ($routes) {

        $routes->get('/', 'Staff::index');
        $routes->get('pembayaran', 'Staff::pembayaran');
    }
);

/*
|--------------------------------------------------------------------------
| GURU AREA
|--------------------------------------------------------------------------
*/
$routes->group(
    'darulqonitaat/guru',
    ['filter' => 'auth,role:guru'],
    static function ($routes) {

        $routes->get('akademik', 'Guru::akademik');
    }
);

/*
|--------------------------------------------------------------------------
| PSB AREA
|--------------------------------------------------------------------------
*/
$routes->group(
    'darulqonitaat/psb',
    ['filter' => 'auth,role:psb'],
    static function ($routes) {

        $routes->get('/', 'Psb::index');
    }
);

/*
|--------------------------------------------------------------------------
| SHIELD AUTH ROUTES
|--------------------------------------------------------------------------
*/
service('auth')->routes($routes);
