<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/active-user', [UserController::class, 'activeUser']);

Route::group(['prefix' => 'tasks'], function () {
    Route::get('/', TaskController::class);
    Route::put('/{task}', [TaskController::class, 'complete']);
});
