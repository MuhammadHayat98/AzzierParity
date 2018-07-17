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
use App\Workorder as Workorder;
$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/find', function () use ($router) {
    $wo = Workorder::find(14);
    return $wo['Status'];
});