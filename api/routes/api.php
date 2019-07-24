<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api\V1')->group(function () {
    Route::prefix('v1')->group(function () {
        Route::post('login', 'AuthController@login');

        Route::middleware('auth:api')->group(function () {
            Route::apiResource('users', 'UsersController');
            Route::get('user/{user}', 'UsersController@user');
            Route::get('logout', 'AuthController@logout');
        });
    });
});
