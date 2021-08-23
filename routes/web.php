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

Route::middleware('auth')->group(function () {

    Route::post('/create', [\App\Http\Controllers\GameController::class,'store']);
    Route::get('/create', [\App\Http\Controllers\GameController::class,'create'])->name('create');
    Route::get('/index', [\App\Http\Controllers\GameController::class,'index'])->name('archive');
    Route::get('/games/{game}', [\App\Http\Controllers\GameController::class,'show']);
    Route::get('/games/{game}/edit', [\App\Http\Controllers\GameController::class,'edit'])->name('edit');
    Route::put('/games/{game}', [\App\Http\Controllers\GameController::class,'update']);
    Route::get('/stats', [\App\Http\Controllers\StatController::class,'index'])->name('statistics');

    Route::get('/games/{game}/remove', [\App\Http\Controllers\GameController::class,'destroy'])->name('remove');

    Route::get('/contact', [App\Http\Controllers\ContactUsFormController::class, 'createForm']);
    Route::post('/contact', [App\Http\Controllers\ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');

    Route::get('/createaos', [App\Http\Controllers\AosController::class, 'createaos'])->name('createaos');

});

Route::get('/splash', [App\Http\Controllers\GameController::class, 'splash'])->name('splash');

Route::get('/scorecard', [App\Http\Controllers\GameController::class, 'create'])->name('scorecard');
Route::get('/scorecardSigmar', [App\Http\Controllers\AosController::class, 'createaos'])->name('scorecardSigmar');
Route::get('/faq', [App\Http\Controllers\GameController::class, 'faq'])->name('faq');
Route::get('/about', [App\Http\Controllers\GameController::class, 'about'])->name('about');





Auth::routes();

