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

Route::get('getEmpdetails', 'apiController@index');
Route::get('getEmpdetails/{id}', 'apiController@show');
Route::post('postEmpdetails', 'apiController@store');
Route::post('updateEmpdetails/{id}', 'apiController@update');
Route::delete('deleteEmpdetails/{id}', 'apiController@delete');


