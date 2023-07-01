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
    //*** all 40k handled below ***//

    //10th edition create and store
    Route::post('/create10e', [App\Http\Controllers\TenEdController::class, 'store10e']);
    Route::get('/create10e', [App\Http\Controllers\TenEdController::class, 'create10e'])->name('create10e');
    //10th edition index, edit, and update
    Route::get('/index10e', [App\Http\Controllers\TenEdController::class, 'index10e'])->name('index10e');
    Route::get('/ten/{ten}', [App\Http\Controllers\TenEdController::class,'show10e']);
    Route::get('/ten/{ten}/edit', [App\Http\Controllers\TenEdController::class,'edit10e'])->name('edit10e');
    Route::put('/ten/{ten}', [App\Http\Controllers\TenEdController::class,'update10e']);
    //10th edition stats
    Route::get('/stats10e', [App\Http\Controllers\TenEdController::class,'stats10e'])->name('stats10e');
    //10th edition delete
    Route::get('/ten/{ten}/remove', [App\Http\Controllers\TenEdController::class,'destroy10e'])->name('remove10e');


    //9th Edition create and index
    Route::post('/create', [\App\Http\Controllers\GameController::class,'store']);
    Route::get('/create', [\App\Http\Controllers\GameController::class,'create'])->name('create');
    Route::get('/index', [\App\Http\Controllers\GameController::class,'index'])->name('index');
    //9th Edition archive and stats
    Route::get('/games/{game}', [\App\Http\Controllers\GameController::class,'show']);
    Route::get('/games/{game}/edit', [\App\Http\Controllers\GameController::class,'edit'])->name('edit');
    Route::put('/games/{game}', [\App\Http\Controllers\GameController::class,'update']);
    Route::get('/stats', [\App\Http\Controllers\StatController::class,'index'])->name('statistics');
    //9th Edition delete
    Route::get('/games/{game}/remove', [\App\Http\Controllers\GameController::class,'destroy'])->name('remove');

    
    //*** all AOS below ***//

    //AOS create and store
    Route::post('/createaos', [App\Http\Controllers\AosController::class, 'storeaos']);
    Route::get('/createaos', [App\Http\Controllers\AosController::class, 'createaos'])->name('createaos');
    //AOS index, edit and update
    Route::get('/indexaos', [\App\Http\Controllers\AosController::class,'indexaos'])->name('indexaos');
    Route::get('/aos/{aos}', [\App\Http\Controllers\AosController::class,'showaos']);
    Route::get('/aos/{aos}/edit', [\App\Http\Controllers\AosController::class,'editaos'])->name('editaos');
    Route::put('/aos/{aos}', [\App\Http\Controllers\AosController::class,'updateaos']);
    //AOS stats
    Route::get('/statsaos', [\App\Http\Controllers\AosController::class,'stats'])->name('statisticsaos');
    //AOS delete
    Route::get('/aos/{aos}/remove', [\App\Http\Controllers\AosController::class,'destroyaos'])->name('removeaos');

    //edition selections
    Route::get('/editionselectindex', [App\Http\Controllers\GameController::class, 'editionselectindex'])->name('editionselectindex');
    Route::get('/editionselectstatistics', [App\Http\Controllers\GameController::class, 'editionselectstatistics'])->name('editionselectstatistics');
    //contact forms
    Route::get('/contact', [App\Http\Controllers\ContactUsFormController::class, 'createForm']);
    Route::post('/contact', [App\Http\Controllers\ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');


});

Route::get('/splash', [App\Http\Controllers\GameController::class, 'splash'])->name('splash');
Route::get('/specialrules', [App\Http\Controllers\TenEdController::class, 'showrules'])->name('showrules');
Route::get('/editionselect', [App\Http\Controllers\GameController::class, 'editionselect'])->name('editionselect');
Route::get('/scorecard', [App\Http\Controllers\GameController::class, 'create'])->name('scorecard');
Route::get('/scorecardSigmar', [App\Http\Controllers\AosController::class, 'createaos'])->name('scorecardSigmar');
Route::get('/scorecard10th', [App\Http\Controllers\TenEdController::class, 'create10e'])->name('scorecard10th');
Route::get('/faq', [App\Http\Controllers\GameController::class, 'faq'])->name('faq');
Route::get('/about', [App\Http\Controllers\GameController::class, 'about'])->name('about');


Auth::routes();

