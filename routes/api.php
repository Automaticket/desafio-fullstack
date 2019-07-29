<?php

use Illuminate\Http\Request;
use App\Entities\User;

Route::post('login', 'Api\LoginController@login')->name('api.login');

Route::group(['middleware' => 'auth:api'], function(){
   Route::resource('user', 'Api\UserController');
});
