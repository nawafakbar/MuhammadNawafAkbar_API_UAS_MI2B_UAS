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

$router->group(['prefix' => 'api/uas'], function () use ($router) {
    $router->get('/', 'UasController@index');         // Get all
    $router->get('{id}', 'UasController@show');       // Get by ID
    $router->options('/', function () { // Tambahkan ini
        return response('', 204)
            ->header('Access-Control-Allow-Methods', 'POST, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type');
    });
    $router->post('/', 'UasController@store');        // Create
    $router->options('{id}', function () { // Tambahkan ini
        return response('', 204)
            ->header('Access-Control-Allow-Methods', 'PUT, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type');
    });
    $router->put('{id}', 'UasController@update');     // Update
    $router->delete('{id}', 'UasController@destroy'); // Delete
});
