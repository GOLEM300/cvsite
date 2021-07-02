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
Auth::routes();

Route::get('/', 'Site\SiteController@search');

Route::group(
    [
        'prefix' => 'admin',
        'as' => 'admin.',
        'namespace' => 'Admin',
        'middleware' => ['auth','can:admin-panel'],
    ],
    function () {
        Route::get('/index', 'HomeController@index')->name('index');
        Route::get('/show', 'HomeController@show')->name('show');
        Route::get('/create', 'HomeController@create');
        Route::get('/edit/{user}', 'HomeController@edit')->name('edit');
        Route::put('/', 'HomeController@update');
        Route::post('/', 'HomeController@store');
        Route::delete('/remove/{user}', 'HomeController@remove');
    }
);

Route::group(
    [
        'prefix' => 'cv',
        'as' => 'cv.',
        'namespace' => 'Cv',
        'middleware' => ['auth'],
    ],
    function () {
        Route::get('/create', 'CvController@create')->name('cv.create');
        Route::get('/edit/{cv}', 'CvController@edit')->name('cv.edit');
        Route::put('/', 'CvController@update')->name('cv.update');
        Route::post('/', 'CvController@store');
        Route::delete('/remove/{cv}', 'CvController@remove')->name('cv.remove');
    }
);

Route::group(
    [
        'prefix' => 'site',
        'as' => 'site.',
        'namespace' => 'Site',
    ],
    function () {
        Route::get('/show/{cv}', 'SiteController@show')->name('site.show');
        Route::get('/search', 'SiteController@search')->name('site.search');
    }
);

Route::group(
    [
        'prefix' => 'profile',
        'as' => 'profile.',
        'namespace' => 'Profile',
        'middleware' => ['auth'],
    ],
    function() {
        Route::get('/show/{cv}', 'ProfileController@show')->name('profile.show');
        Route::get('/list/{user_id}', 'ProfileController@list')->name('profile.list');
    }
);
