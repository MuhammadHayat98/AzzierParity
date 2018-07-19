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

//Workorder model test
// $router->get('/findWo/{Wo}', function (int $Wo) use ($router) {
//     $wo = Workorder::find($Wo);
//     return $wo->toJson();
// });

// //Workrequest model test
// $router->get('/findWr/{Wr}', function (String $Wr) use ($router) {
//     $wr = WorkRequest::find($Wr);
//     return $wr->toJson();
// });

//Workorder create test
$router->post('/CreateWo', [
    'middleware' => 'App\Http\Middleware\parseXml',
    'uses' => 'WorkOrders@create'
]);

// //Workorder update test
// $router->get('/findWo/{Wo}', function (int $Wo) use ($router) {
//     $wo = Workorder::find($Wo);
//     return $wo->toJson();
// });