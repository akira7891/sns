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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


#トップページ
Route::get('/tweet',App\Http\Controllers\sns\IndexController::class)->name("top.index");

Route::middleware('auth')->group(function(){

#投稿を作成する
Route::post('/create',App\Http\Controllers\sns\CreateController::class)->middleware('auth');

#投稿を編集する
Route::get('/update/{tweetId}',App\Http\Controllers\sns\update\IndexController::class)->name("update.index");
Route::post('/update/{tweetId}',App\Http\Controllers\sns\update\PutController::class);

#投稿を削除する
Route::get('/delete/{tweetId}',App\Http\Controllers\sns\DeleteController::class)->name("delete");


});
