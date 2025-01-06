<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
Route::get('/', function () {
    return view('welcome');
});
Route::redirect('/','tasks');
Route::resource('/tasks', TaskController::class);