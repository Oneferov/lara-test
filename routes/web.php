<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CRUD\PositionController;
use App\Http\Controllers\CRUD\UserTypeController;
use App\Http\Controllers\CRUD\UserController;
use App\Http\Controllers\SourceController;



Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('source', [SourceController::class, 'get'])->name('source.get');

Route::get('users/list', [UserController::class, 'list']);
Route::get('positions/list', [PositionController::class, 'list']);
Route::get('user_types/list', [UserTypeController::class, 'list']);

Route::resources([
    'positions' => PositionController::class,
    'user_types' => UserTypeController::class,
    'users' => UserController::class,
]);
