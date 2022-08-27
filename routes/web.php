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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('main');
Route::view('/about', 'about')->name('about');
Route::resource('articles', \App\Http\Controllers\ArticleController::class);
Route::resource('categories', \App\Http\Controllers\CategoryController::class);
Route::resource('tags', \App\Http\Controllers\TagController::class);
Route::get('/login', function(){
   \Illuminate\Support\Facades\Auth::loginUsingId(1);
   return redirect('/');
})->name('login');
Route::get('/logout', function(){
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/');
})->name('logout');

