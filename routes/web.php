<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\twitterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

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

Route::get('/tweet', [HomeController::class, 'index'])->name('home');

Route::get('/tlogin', [twitterController::class, 'login'])->name('twitter.login');
Route::get('/tcallback', [twitterController::class, 'callback'])->name('twitter.callback');

Route::get('/posts', [PostController::class, 'index'])->name('posts');

Route::post('/home', [App\Http\Controllers\twitterController::class, 'tweet'])->name('twitter.tweet');

Route::get('/summary', [App\Http\Controllers\SummaryController::class, 'index'])->name('summary');


// -------------------------------------- Testing -----------------------------------------------------
Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');

// Route::get('/tweet', function()
// {
// 	return Twitter::postTweet(['status' => 'Laravel is beautiful', 'format' => 'json']);
// });
Route::get('/userTimeline', function()
{
	 $posts = Twitter::getUserTimeline(['screen_name' => 'thujohn', 'count' => 20, 'format' => 'json']);
	 $object = (array)json_decode($posts);
	 dd($object);

});

Route::get('/search', function()
{
	$res = Twitter::getSearch(['q' => 'Something in the Rain']);
	dd($res);

});



