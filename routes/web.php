<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'employee_controller@index');
Route::get('emp', 'employee_controller@index');
Route::post('emp', array('uses' => 'employee_controller@store'));
Route::get('emp/edit/{id}', 'employee_controller@edit');
Route::get('emp/delete/{id}', 'employee_controller@delete');
Route::put('emp', 'employee_controller@update');
