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
use Illuminate\Http\Request;
use GrahamCampbell\Flysystem\Facades\Flysystem;
$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/response', function(Request $res) { 
    Flysystem::put('hi.txt', $res->all());
});