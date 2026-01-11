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
    'darulqonitaat/santri',
    // ['filter' => 'auth,role:admin'],
    static function ($routes) {

        $routes->get('/', 'Dashboard::index');
        $routes->get('register', 'Admin::register');
        $routes->get('custom', 'Admin::custom');
        $routes->get('delete', 'Admin::delet');
    }
);

$routes->group(
    'darulqonitaat/akademik',
    // ['filter' => 'auth,role:admin'],
    static function ($routes) {

        $routes->get('/', 'Akademik::index');
        $routes->get('register', 'Akademik::register');
        $routes->get('custom', 'Akademik::custom');
        $routes->get('delete', 'Akademik::delet');
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
$routes->group('api/santri', function ($routes) {
    $routes->get('suggest', 'Api/SantriApi::suggest');
    $routes->post('check', 'Api/SantriApi::check');
    $routes->post('store', 'Api/SantriApi::store');
});

$routes->group('api/tag', function($routes) {
    $routes->post('store', 'Api\TagApi::store');
    $routes->get('', 'Api\TagApi::index');
});


service('auth')->routes($routes);
