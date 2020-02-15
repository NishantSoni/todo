<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::prefix('v1')->namespace('Api\V1')->group(function () {

    Route::middleware(['validateClient'])->group(function () {
        Route::post('login', 'UserAuthenticationController@login')->name('users.login');
        Route::post('register', 'UserAuthenticationController@register')->name('users.register');
    });

    Route::get('categories', 'CategoryController@index')->name('categories.index');
    Route::resource('todos', 'TodoController');
});
