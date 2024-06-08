<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\BreakfastController;
use App\Http\Controllers\LunchController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return view('layout.master');
});

//tabel CRUD menu/mealtype
route::resource('/Tmeal', MenuController::class);

//untuk halaman dashboard
route::get('/dashboard', [DashboardController::class, 'index']);


Route::resource('breakfast', BreakfastController::class);

Route::resource('lunch', LunchController::class);
