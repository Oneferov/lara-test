<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;



Route::get('users/search',  [UserController::class, 'search']);
