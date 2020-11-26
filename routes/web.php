<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;




//Route::get('register','App\Http\Controllers\ContactController@index');
//Route::post('register','App\Http\Controllers\ContactController@store');
Route::get('/{any?}', function (){
    return view('welcome');
})->where('any', '^(?!api\/)[\/\w\.-]*');
