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

Route::get('currencies', 'Api\CurrencyController@index');
Route::get('currencies/{id}', 'Api\CurrencyController@show')->where('id', '[0-9]+');

Route::prefix('admin')->group(function () {
    Route::apiResource('/currencies', 'Admin\Api\CurrencyAdminController');
});
