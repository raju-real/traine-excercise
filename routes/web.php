<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('admin', 'Auth\LoginController@showAdminLoginForm')->name('admin');

Route::post('admin-login', 'Auth\LoginController@adminLogin')->name('admin-login');

//Auth::routes();


Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'],function() {
    Route::get('dashboard','DashboardController@dashboard')->name('dashboard');
    Route::resource('languages','LanguageController');
    Route::resource('coach','TrainerController');
    Route::get('coach-file-div',function() {
        $languages = App\Language::orderBy('name','asc')->get();
        return view('admin.trainer_file_div', compact('languages'));
    })->name('coach-file-div');
    Route::get('coach-files/{id}','TrainerController@coachFiles')->name('coach-files');
});

Route::get('admin-logout', function() {
    Auth::logout();
    return redirect()->route('home');
})->name('admin-logout');