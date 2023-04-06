<?php

use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\MovieController as AdminMovieController;
use App\Http\Controllers\Admin\QuoteController;

use App\Models\Movie;
use App\Models\Quote;


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




Route::view('movies/dashboard', 'movies.dashboard',  ['movies' => Movie::with('quotes')->get()])->name('movies.dashboard');
Route::view('movies/create','movies.create')->name('movies.create');
Route::view('movies/{movie}/edit',  'movies.edit', ['movies' => Movie::all() ])->name('movies.edit');

Route::view('quotes/create','quotes.create', ['movies' =>  movie::all()])->name('quotes.create');
Route::view('quotes/{quote}/edit',  'quotes.edit', ['quotes' => Quote::all(), 'movies' =>  movie::all(),])->name('quotes.edit');


Route::group(['controller' => AdminMovieController::class], function () {
    Route::post('movies/store', 'store')->name('movies.store');
    Route::patch('movies/{movie}',  'update')->name('movies.update');
    Route::delete('movies/{movie}',  'destroy')->name('movies.destroy');
});

Route::group(['controller' => QuoteController::class], function () {
    Route::post('quotes/store', 'store')->name('quotes.store');
    Route::patch('quotes/{quote}',  'update')->name('quotes.update');
    Route::delete('quotes/{quote}',  'destroy')->name('quotes.destroy');
});

Route::view('movies/login', 'login')->name('login.create');
Route::post('movies/login', [LoginController::class, 'store'])->name('login.store');



