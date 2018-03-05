<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function (Request $request){
   return "Hola!";
});

Route::get('/ht/commercial', function (){
    return new App\Http\Resources\HTCommercial(\App\BuySellRate::commercial()->get());
});

Route::get('/ht/black', function (){
    return new App\Http\Resources\HTCommercial(\App\BuySellRate::black()->get());
});

Route::get('/ht/interbank', function (){
    return new App\Http\Resources\HTCommercial(\App\BuySellRate::interbank()->get());
});

Route::get('/ux/index', function (Request $request){
    return \App\UxIndexCurrent::find(1)->toJson();
});