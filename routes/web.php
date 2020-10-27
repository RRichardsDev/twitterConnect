<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\twitterController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/tlogin')->name('tlogin');
// Route::get('App\Http\Controllers\twitterController@callback')->name('twitter.callback');

Route::get('/tlogin', [App\Http\Controllers\twitterController::class, 'login'])->name('twitter.login');
Route::get('/tcallback', [App\Http\Controllers\twitterController::class, 'callback'])->name('twitter.callback');

// Route::get('/tlogin', [App\Http\Controllers\twitterController::class, 'callback'])->name('twitter.callback');

// Route::get('login', 'twitterController@login')->name('twitter.login');
// Route::get('callback', 'twitterController@callback')->name('twitter.callback');

