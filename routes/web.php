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

//Workorder create 
$router->post('/CreateWo', [
    'middleware' => 'App\Http\Middleware\parseXml',
    'uses' => 'WorkOrders@create'
]);

//Workorder update
$router->post('/UpdateWo', [
    'middleware' => 'App\Http\Middleware\parseXml',
    'uses' => 'WorkOrders@update'
]);

//Work request create
$router->post('/CreateWr', [
    'middleware' => 'App\Http\Middleware\parseXml',
    'uses' => 'WorkRequests@create'
]);

//Work request update
$router->post('/UpdateWr', [
    'middleware' => 'App\Http\Middleware\parseXml',
    'uses' => 'WorkRequests@update'
]);