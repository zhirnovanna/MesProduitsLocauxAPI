<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegionController;

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
    Route::get('categories/count', [CategoryController::class, 'total']);
    Route::get('regions/count', [RegionController::class, 'total']);
    Route::apiResources([
        'products' => ProductController::class,
        'categories' => CategoryController::class,
        'regions' => RegionController::class,
    ]);
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
