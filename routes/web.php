<?php

use Illuminate\Support\Facades\Route;

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
})->name('welcome');


Route::post('/create', [\App\Http\Controllers\GameController::class,'store']);
Route::get('/create', [\App\Http\Controllers\GameController::class,'create'])->name('create');
Route::get('/index', [\App\Http\Controllers\GameController::class,'index'])->name('archive');
Route::get('/games/{game}', [\App\Http\Controllers\GameController::class,'show']);
Route::get('/games/{game}/edit', [\App\Http\Controllers\GameController::class,'edit'])->name('edit');


