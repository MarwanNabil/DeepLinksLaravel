<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostContoller;
use App\Http\Controllers\HashtagController;



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

Route::get('/' , [UserController::class, 'direct']);

Auth::routes();

Route::get('/home', [PostContoller::class, 'index'])->name('home');
Route::post('/home', [PostContoller::class, 'store'])->name('post.store');
Route::get('/post/{id}', [PostContoller::class, 'show']);

Route::get('/post/delete/{id}', [PostContoller::class, 'destroy'])->name('post.delete');
Route::get('/post/edit/{id}', [PostContoller::class, 'edit'])->name('post.edit');
Route::post('/post/update/{id}', [PostContoller::class, 'update'])->name('post.update');

Route::get('/profile' , [PostContoller::class, 'myPosts'])->name('myProfile');


Route::get('/settings' , [UserController::class, 'index'])->name('settings');
Route::post('/settings/update' , [UserController::class, 'update'])->name('settings.update');


Route::get('/hashtag/view' , [HashtagController::class , 'view'])->name('hashtag.view');
Route::get('/hashtag/create' , [HashtagController::class , 'create'])->name('hashtag.create');
Route::post('/hashtag/store/' , [HashtagController::class , 'store'])->name('hashtag.store');
Route::get('/hashtag/view/{name}/' , [HashtagController::class , 'show'])->name('hashtag.show');
