<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\UserController;

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

Route::group(['middleware' => ['json.response']], function () {
    Route::get('products/count', [ProductController::class, 'total']);
    Route::get('products/names', [ProductController::class, 'takenProductNames']);
    Route::get('categories/count', [CategoryController::class, 'total']);
    Route::get('categories/names', [CategoryController::class, 'takenCategoryNames']);
    Route::get('regions/count', [RegionController::class, 'total']);
    Route::get('regions/names', [RegionController::class, 'takenRegionNames']);
    Route::get('users/count', [UserController::class, 'total']);
    Route::get('users/emails', [UserController::class, 'takenUserEmails']);

    Route::apiResources([
        'products' => ProductController::class,
        'categories' => CategoryController::class,
        'regions' => RegionController::class,
    ]);
    Route::apiResource('users', UserController::class, ['except' => ['store']]);
});

Route::group([

    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'

], function ($router) {
    Route::post('signup', 'AuthController@register');
    Route::post('signin', 'AuthController@login');
    Route::post('signout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::group(['middleware' => 'auth:api'], function(){
    // Users
    Route::get('users', 'UserController@index')->middleware('isAdmin');
    Route::get('users/{admin}', 'UserController@show')->middleware('isAdminOrSelf');
});
