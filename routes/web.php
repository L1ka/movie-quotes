<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MovieController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\UpdateController;
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




Route::get('admin/panel', [AdminPanelController::class, 'create'])->name('panel');

Route::get('movie/create', [UpdateController::class, 'create'])->name('create');
Route::post('movie/store', [UpdateController::class, 'store'])->name('store');

Route::get('movie/{movie}', [UpdateController::class, 'edit'])->name('edit');
Route::patch('movie/update', [UpdateController::class, 'update'])->name('update');

