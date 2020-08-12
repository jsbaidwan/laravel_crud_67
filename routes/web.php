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
Auth::routes();
Route::get('/', 'customers_controller@index');
Route::get('/customers', 'customers_controller@index');
Route::get('/add_customer/{id?}', 'customers_controller@add_customer');
Route::post('/save_customer', 'customers_controller@save_customer')->name('save_customer');
Route::post('/update_customer_status', 'customers_controller@update_customer_status');
Route::post('/delete_customer', 'customers_controller@delete_customer');
