<?php

use Illuminate\Http\Request;

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::get('details', 'API\UserController@details');
Route::post('hitung', 'API\HitungController@hitung');
Route::get('logout', 'API\UserController@logout');