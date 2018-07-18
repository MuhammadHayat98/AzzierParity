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
use App\WorkOrder as WorkOrder;
use App\WorkRequest as WorkRequest;
use Carbon\Carbon;
$router->get('/', function () use ($router) {
    return $router->app->version();
});

//Workorder model test
$router->get('/findWo/{Wo}', function (int $Wo) use ($router) {
    $wo = Workorder::find($Wo);
    return $wo->toJson();
});

//Workrequest model test
$router->get('/findWr/{Wr}', function (String $Wr) use ($router) {
    $wr = WorkRequest::find($Wr);
    return $wr->toJson();
});

//Workorder create test
$router->get('/CreateWo', function () use ($router) {
    $wo = new WorkOrder();
    $wo::create([
        'WoNum' => 999999,
        'WoNumStr' => '999999',
        'Priority' => '3',
        'OpenDate' => Carbon::createFromTimeString('06/25/2018 00:00:00', 'GMT')

    ]);
    $wo->save();
});

// //Workorder update test
// $router->get('/findWo/{Wo}', function (int $Wo) use ($router) {
//     $wo = Workorder::find($Wo);
//     return $wo->toJson();
// });