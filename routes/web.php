<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\BreakfastController;
use App\Http\Controllers\LunchController;
use App\Http\Controllers\DinnerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;
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
    return view('auth.login');
});

//tabel CRUD menu/mealtype


//untuk halaman dashboard
route::get('/dashboard', [DashboardController::class, 'index']);


Route::resource('breakfast', BreakfastController::class);

Route::resource('lunch', LunchController::class);

Route::resource('dinner', DinnerController::class);


Auth::routes();

Route::middleware(['auth'])->group(function () {
    route::resource('/Tmeal', MenuController::class);
});