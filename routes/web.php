<?php

use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\MovieController as AdminMovieController;
use App\Http\Controllers\Admin\QuoteController;
use App\Http\Controllers\LocaleController;

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





Route::view('movies/create','movies.create')->name('movies.create');

Route::group(['controller' => AdminMovieController::class], function () {
    Route::get('movies/dashboard',  'index')->name('movies_dashboard.index');
    Route::post('movies/store', 'store')->name('movies.store');
    Route::get('movies/{movie}/edit',  'edit')->name('movies.edit');
    Route::patch('movies/{movie}',  'update')->name('movies.update');
    Route::delete('movies/{movie}',  'destroy')->name('movies.destroy');
});

Route::group(['controller' => QuoteController::class], function () {
    Route::get('quotes/create','create')->name('quotes.create');
    Route::post('quotes/store', 'store')->name('quotes.store');
    Route::get('quotes/{quote}/edit',  'edit')->name('quotes.edit');
    Route::patch('quotes/{quote}',  'update')->name('quotes.update');
    Route::delete('quotes/{quote}',  'destroy')->name('quotes.destroy');
});

Route::get('login', [LoginController::class, 'create'])->name('login.create')->middleware('guest')->middleware('locale');
Route::post('login', [LoginController::class, 'store'])->name('login.store')->middleware('guest');

Route::get('locale/{locale}', [LocaleController::class, 'store'])->name('locale.store');





