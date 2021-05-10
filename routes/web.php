<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::middleware('auth')->group(function ()
{
    Route::get('/tweets', [App\Http\Controllers\TweetController::class, 'index'])->name('home');
    Route::post('/tweets', [App\Http\Controllers\TweetController::class, 'store'])->name('tweet.post');

    Route::post('/tweets/{tweet}/like', [App\Http\Controllers\TweetLikesController::class, 'store'])->name('tweet.post');
    Route::delete('/tweets/{tweet}/like', [App\Http\Controllers\TweetLikesController::class, 'destroy'])->name('tweet.post');

    Route::post('/profiles/{user:username}/follow', [App\Http\Controllers\FollowsController::class, 'store'])->name('follow');

    Route::get('/profiles/{user:username}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('tweet.post');
    Route::patch('/profiles/{user:username}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile');
    Route::get('/explore', [App\Http\Controllers\ExploreController::class, 'index'])->name('profile');


});

Route::get('/profiles/{user:username}', [App\Http\Controllers\ProfilesController::class, 'show'])->name('profile');





Auth::routes();

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
