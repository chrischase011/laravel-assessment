<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'users'], function () {
    
    // N + 1 query
    Route::get('/getPost1', [UserController::class, 'getPost1']);

    // Optimized query using Eager Loading
    Route::get('/getPost2', [UserController::class, 'getPost2']);
});