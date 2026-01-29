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
$routes->get('/ulangan', 'Home::kuis');
/*
|--------------------------------------------------------------------------
| DARUL QONITAAT - PUBLIC WEBSITE
|--------------------------------------------------------------------------
*/
$routes->group('dq', static function ($routes) {

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
    'dq/santri',
    // ['filter' => 'auth,role:admin'],
    static function ($routes) {

        $routes->get('/', 'Dashboard::index');
        $routes->get('register', 'Admin::register');
        $routes->get('custom', 'Admin::custom');
        $routes->get('delete', 'Admin::delet');
    }
);

$routes->group(
    'dq/akademik',
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
    'dq/staff',
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
    'dq/guru',
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
    'dq/psb',
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
    $routes->get('suggest', 'Api\Santri::suggest');
    $routes->post('check', 'Api\Santri::check');
    $routes->post('store', 'Api\Santri::store');
    $routes->post('delete', 'Api\Santri::delete');
    $routes->post('tag/add', 'Api\Santri::addTag');
    $routes->post('tag/attach', 'Api\Santri::attachTag');
});

service('auth')->routes($routes);
