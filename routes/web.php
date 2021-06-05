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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/cv/create', [App\Http\Controllers\CvController::class, 'create'])->name('cv.create');
Route::put('cv/edit/{cv}',[App\Http\Controllers\CvController::class, 'edit'])->name('cv.edit');
Route::post('/cv', [App\Http\Controllers\CvController::class, 'store']);
Route::delete('cv/remove/{cv}',[App\Http\Controllers\CvController::class, 'remove'])->name('cv.remove');

Route::get('/show/{cv}',[App\Http\Controllers\SiteController::class, 'show'])->name('site.show');
Route::get('/search',[App\Http\Controllers\SiteController::class, 'search'])->name('site.search');

Route::get('/list/{user}',[App\Http\Controllers\ProfileController::class, 'list'])->name('profile.list');