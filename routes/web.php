<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',App\Http\Controllers\sns\IndexController::class);

Route::post('/create',App\Http\Controllers\sns\CreateController::class);

Route::get('/update/{tweetId}',App\Http\Controllers\sns\update\IndexController::class)->name("update.index");

Route::post('/update/{tweetId}',App\Http\Controllers\sns\update\PutController::class);
