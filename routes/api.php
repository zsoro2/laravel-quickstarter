<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Guests can access (user not logged in)
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'guest'], function () {
    Route::post('login', 'Api\LoginController@login');
    Route::post('register', 'Api\RegisterController@register');
});

/*
|--------------------------------------------------------------------------
| Authenticated users can access (user logged in)
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('users/{user}', 'Api\UserController@show');
});
