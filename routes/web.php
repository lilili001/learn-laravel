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
\Illuminate\Support\Facades\Auth::loginUsingId(1);
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

Route::get('users',function (){
    $users = \App\User::paginate(10) ;
    return view('user',compact('users'));
});

Route::get('notifications',function (){
    $user = \App\User::find(1);
    $post = \App\Post::find(1);
    $res = $user->notify(new \App\Notifications\PostPublished($post));
    Auth::user()->unreadNotifications->markAsRead();
    //Mail::to($user->email)->send(new \App\Mail\welcomeToAsty($user));
});