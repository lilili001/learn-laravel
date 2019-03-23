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

Route::get('/', function () {
    return view('welcome');
});

Route::get('auth/login','Auth\LoginController@showLoginForm');
Route::post('auth/login','Auth\LoginController@login');

Route::get('auth/register','Auth\RegisterController@showRegistrationForm');
Route::post('auth/register','Auth\RegisterController@register');

Route::get('auth/logout','Auth\LoginController@logout');

Route::get('user/{user}',function (\App\User $user){
    return ($user);
})->middleware('throttle');

Route::get('admin/login','AdminAuth\LoginController@showLoginForm');
Route::post('admin/login','AdminAuth\LoginController@login');

Route::get('admin/register','AdminAuth\RegisterController@showRegistrationForm');
Route::post('admin/register','AdminAuth\RegisterController@register');

Route::get('admin/logout','AdminAuth\LoginController@logout');

Route::get('admin','AdminController@index');