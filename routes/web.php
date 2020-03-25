<?php

use Illuminate\Support\Facades\Route;

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

Route::view('/', 'welcome');

Route::get('admin', 'Admin\LoginController@admin');
Route::get('admin/login', 'Admin\LoginController@index')->middleware('guest');
Route::post('admin/login', 'Admin\LoginController@login')->middleware('guest');


Route::group(['middleware' => 'adminUser', 'prefix' => 'admin'], function () {
    Route::get('logout', 'Admin\LoginController@logout');
    Route::get('dashboard', 'Admin\DashboardController@index');
    Route::get('users/datatables', 'Admin\UserController@datatables')->name('admin.users.datatables');
    Route::resource('users', 'Admin\UserController');
});
