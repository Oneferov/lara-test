<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CRUD\PositionController;
use App\Http\Controllers\CRUD\SubdivisionController;
use App\Http\Controllers\CRUD\UserTypeController;
use App\Http\Controllers\CRUD\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/home', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('users/list', [UserController::class, 'list']);
Route::get('positions/list', [PositionController::class, 'list']);
Route::get('user_types/list', [UserTypeController::class, 'list']);


Route::resources([
    'positions' => PositionController::class,
    'user_types' => UserTypeController::class,
    'users' => UserController::class,
]);
