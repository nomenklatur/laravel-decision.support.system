<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homepage;
use App\Http\Controllers\Authorization;
use App\Http\Controllers\CalegController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\WeightController;
use App\Http\Controllers\DSSController;

//Homepage route
Route::get('/', [Homepage::class, 'index']);
Route::get('/dapil/{dapil:id}', [Homepage::class, 'show_dapil']);
Route::get('/caleg', [Homepage::class, 'show_caleg']);

// Authorization route
Route::get('/masuk', [Authorization::class, 'index'])->name('login')->middleware('guest');
Route::post('/register', [Authorization::class, 'register'])->middleware('guest');
Route::post('/login', [Authorization::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [Authorization::class, 'logout']);

// User exclusive route
Route::resource('/user/calegs', CalegController::class)->middleware('auth');
Route::resource('/user/parties', PartyController::class)->middleware('auth');
Route::get('/user/weight', [WeightController::class, 'index'])->middleware('auth');

// DSS function routes
Route::get('/rekomendasi', [DSSController::class, 'index']);
Route::get('/rekomendasi/{dapil:id}', [DSSController::class, 'saw']);
