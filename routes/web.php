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

$router->group(['prefix' => 'api/v1/'], function () use ($router) {
    $router->group(['prefix' => 'tasks'], function () use ($router) {
        $router->get('/', 'TaskController@index');
        $router->get('/{code}', 'TaskController@show');
        $router->post('/', 'TaskController@store');
        $router->put('/{code}/close', 'TaskController@close');
        $router->delete('/{code}', 'TaskController@destroy');
    });
});
