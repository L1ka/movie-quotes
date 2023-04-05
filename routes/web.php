<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\MovieController as AdminMovieController;
use App\Http\Controllers\AdminPanelController;
use App\Models\Movie;


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


Route::group(['controller' => AdminMovieController::class], function () {
    Route::post('movies/store', 'store')->name('movies.store');
    Route::patch('movies/{movie}',  'update')->name('movies.update');
    Route::delete('movies/{movie}',  'destroy')->name('movies.destroy');
});



