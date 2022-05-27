<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('user-login', 'Api\UserController@login')->name('user-login');
Route::post('user-register', 'Api\UserController@register')->name('user-register');

Route::group(['middleware' => 'auth:api', 'namespace' => 'Api'], function() {
    Route::get('user-details','UserController@details')->name('user-details');
    Route::post('update-profile','UserController@updateProfile')->name('update-profile');
    Route::post('reset-password','UserController@resetPassword')->name('reset-password');
    Route::get('all-language','ApiController@allLanguage')->name('all-language');
    Route::get('all-coach','ApiController@allCoach')->name('all-coach');
    Route::get('coach-details/{coach_id}','ApiController@coachDetails')
        ->name('coach-details');
    Route::get('coach-files/{coach_id}/{language_id}','ApiController@coachFiles')
        ->name('coach-files');
    Route::get('user-logout','UserController@logout')->name('user-logout');
});
