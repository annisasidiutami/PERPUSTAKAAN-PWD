<?php

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

$router->post('/buku','BukuController@create');
$router->get('/buku','BukuController@read');
$router->post('/buku/{id}','BukuController@update');
$router->delete('/buku/{id}','BukuController@delete');
$router->get('/buku/{id}','BukuController@detail');

$router->post('/peminjam','PeminjamController@create');
$router->get('/peminjam','PeminjamController@read');
$router->post('/peminjam/{id}','PeminjamController@update');
$router->delete('/peminjam/{id}','PeminjamController@delete');
$router->get('/peminjam/{id}','PeminjamController@detail');