<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\MovieController as AdminMovieController;
use App\Http\Controllers\Admin\QuoteController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\MovieController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::view('movies/create','movies.create')->middleware('auth')->name('movies.create');



Route::group(['controller' => AdminMovieController::class, 'middleware' => 'auth'], function () {
    Route::get('movies/dashboard',  'index')->name('movies_dashboard.index');
    Route::post('movies/store', 'store')->name('movies.store');
    Route::get('movies/{movie}/edit',  'edit')->name('movies.edit');
    Route::patch('movies/{movie}',  'update')->name('movies.update');
    Route::delete('movies/{movie}',  'destroy')->name('movies.destroy');
});

Route::group(['controller' => QuoteController::class, 'middleware' => 'auth'], function () {
    Route::get('quotes/create','create')->name('quotes.create');
    Route::post('quotes/store', 'store')->name('quotes.store');
    Route::get('quotes/{quote}/edit',  'edit')->name('quotes.edit');
    Route::patch('quotes/{quote}',  'update')->name('quotes.update');
    Route::delete('quotes/{quote}',  'destroy')->name('quotes.destroy');
});

Route::get('login', [AuthController::class, 'index'])->middleware('guest')->name('login.index');
Route::post('login', [AuthController::class, 'signIn'])->middleware('guest')->name('login.sign-in');

Route::get('set-locale/{locale}', [LocaleController::class, 'setLocale'])->name('set-locale');


Route::get('/', [MovieController::class, 'index'])->name('home.index');
Route::get('movies/{movie}', [MovieController::class, 'list'])->name('movie.list');



