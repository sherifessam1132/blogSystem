<?php

use App\Http\Controllers\api\UserController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostSubscriptionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RepliesController;
use App\Http\Controllers\UserNotificationsController;
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
Route::post('/posts',[PostController::class,'store'])->name('posts.store')->middleware('must-be-confirmed');
Route::get('/posts/create',[PostController::class,'create']);
Route::get('/posts/{channel}',[PostController::class,'index']);

Route::get('/posts/{channel}/{post:id}',[PostController::class,'show']);
Route::delete('/posts/{channel}/{post:id}',[PostController::class,'destroy']);
// Route::resource('posts',PostController::class);
Route::get('posts/{channel}/{post}/replies',[RepliesController::class,'index']);
Route::post('posts/{channel}/{post}/replies',[RepliesController::class,'store'])->name('add.reply');

// subscription
Route::post('/posts/{channel}/{post}/subscriptions',[PostSubscriptionController::class,'store']);
Route::delete('/posts/{channel}/{post}/subscriptions',[PostSubscriptionController::class,'destroy']);

Route::post('replies/{reply}/favorites',[FavoritesController::class,'store']);
Route::delete('replies/{reply}/favorites',[FavoritesController::class,'destroy']);

Route::delete('replies/{reply}',[RepliesController::class,'destroy']);
Route::put('replies/{reply}',[RepliesController::class,'update']);


Route::get('/profiles/{user}',[ProfileController::class,'show'])->name('profile');
//notifications
Route::get('/profiles/{user}/notifications',[UserNotificationsController::class,'index']);
Route::delete('/profiles/{user}/notifications/{notification}',[UserNotificationsController::class,'destroy']);
//confirmation
Route::get('/register/confirm',[\App\Http\Controllers\api\RegisterConfirmationController::class,'index'])->name('register.confirm');
// avatar
Route::get('api/users',[UserController::class,'index']);
Route::post('api/users/{user}/avatar',[UserController::class,'store'])->middleware('auth')->name('avatar');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
