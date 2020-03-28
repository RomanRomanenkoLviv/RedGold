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

// COMMON
Route::get('/', function () {
    return view('front::pages.homepage.index');
})->name('homepage');


Route::middleware('auth:front')->group(function () {
    Route::get('/cabinet', 'CabinetController@index')->name('cabinet.index');
});

Route::post('logout', 'Auth\LoginController@logout')->name('customers.logout');
Route::post('login', 'Auth\LoginController@login')->name('customers.login');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('customers.password.email');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('customers.password.update');

Route::prefix('login')->group(function () {
    Route::get('facebook', 'Auth\LoginController@redirectToProvider')->name('login.facebook');
    Route::get('facebook/callback', 'Auth\LoginController@handleProviderCallback')->name('login.facebook.callback');

    Route::get('google', 'Auth\LoginController@redirectToProvider')->name('login.google');
    Route::get('google/callback', 'Auth\LoginController@handleProviderCallback')->name('login.google.callback');
});

// CONTROL
Route::prefix('control')->group(function() {
    Route::middleware('auth:control')->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
    });

    /**
     * Authentication
     */
    Route::get('login', 'AuthControl\LoginController@showLoginForm')->name('login');
    Route::post('login', 'AuthControl\LoginController@login');
    Route::post('logout', 'AuthControl\LoginController@logout')->name('logout');
    Route::post('password/email', 'AuthControl\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset', 'AuthControl\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/reset', 'AuthControl\ResetPasswordController@reset')->name('password.update');
    Route::get('password/reset/{token}', 'AuthControl\ResetPasswordController@showResetForm')->name('password.reset');
    Route::get('register', 'AuthControl\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'AuthControl\RegisterController@register');
});
