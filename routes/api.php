<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AuthController;


Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        // Below mention routes are public, user can access those without any restriction.
        // Create New User
        Route::post('register', 'App\Http\Controllers\AuthController@register');
        //Route::post('register','App\Http\Controllers\ContactController@store');
        // Login User
        Route::post('login', 'App\Http\Controllers\AuthController@login');
        
        // Refresh the JWT Token
        Route::get('refresh', 'App\Http\Controllers\AuthController@refresh');

        Route::post('Forgotpassword', 'App\Http\Controllers\PasswordResetRequestController@sendEmail');

        Route::post('ResetPasswordForm', 'App\Http\Controllers\ChangePasswordController@passwordResetProcess');

        
        // Below mention routes are available only for the authenticated users.
        Route::middleware('auth:api')->group(function () {
            // Get user info
            Route::get('user', 'App\Http\Controllers\AuthController@user');
            // Logout user from application
            Route::post('logout', 'App\Http\Controllers\AuthController@logout');
        });

    });

});