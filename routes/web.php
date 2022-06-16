<?php

use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RepliesController;
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
Route::get('/posts',[PostController::class,'index']);
Route::post('/posts',[PostController::class,'store'])->name('posts.store');
Route::get('/posts/create',[PostController::class,'create']);
Route::get('/posts/{channel}',[PostController::class,'index']);

Route::get('/posts/{channel}/{post:id}',[PostController::class,'show']);
// Route::resource('posts',PostController::class);
Route::post('posts/{channel}/{post}/replies',[RepliesController::class,'store'])->name('add.reply');

Route::post('replies/{reply}/favorites',[FavoritesController::class,'store'])->name('add.reply');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
