<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/api/peminjaman', 'PeminjamanController@index');
$router->get('/api/peminjaman/{id:[\d]+}', [
    'as' => 'peminjaman.show',
    'uses' => 'PeminjamanController@show'
]);
$router->post('/api/peminjaman', 'PeminjamanController@store');
$router->put('/api/peminjaman/{id:[\d]+}', 'PeminjamanController@update');
$router->delete('/api/peminjaman/{id:[\d]+}', 'PeminjamanController@destroy');

