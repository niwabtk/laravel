<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/Group', function () {
    return view('groups.index');
});

//route resource
Route::resource('/posts', \App\Http\Controllers\PostController::class);
Route::resource('/students', \App\Http\Controllers\StudentController::class);
Route::resource('/groups', \App\Http\Controllers\GroupController::class);
Auth::routes();

