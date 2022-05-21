<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/', 'Auth\LoginController@showAdminLoginForm')->name('login');

Route::post('admin-login', 'Auth\LoginController@adminLogin')->name('admin-login');

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'],function() {
    Route::get('dashboard','DashboardController@dashboard')->name('dashboard');
});

Route::get('admin-logout', function() {
    Auth::logout();
    return redirect()->route('login');
})->name('admin-logout');