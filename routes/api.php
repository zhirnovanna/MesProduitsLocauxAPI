<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\VerifyEmailController;
use App\Http\Controllers\Auth\MeSignController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\Auth\SignOutController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->middleware(['signed', 'throttle:6,1'])
    ->name('verification.verify');

// Resend link to verify email
Route::post('/email/verify/resend', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth:api', 'throttle:6,1'])->name('verification.send');

