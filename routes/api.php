<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(
    [
        'as' => 'api.',
        'namespace' => 'Api',
    ],
    function () {
        Route::get('/', 'HomeController@index');
        Route::get('/search', 'Site\SiteController@search');
        Route::get('/show/{cv_id}', 'Site\SiteController@show');
        Route::post('/register', 'Auth\RegisterController@register');

        Route::middleware('auth:api')->group(function () {
            Route::get('/list/{user_id}', 'Profile\ProfileController@list');

            Route::put('/update', 'Cv\CvController@update');
            Route::post('/create', 'Cv\CvController@create');
            Route::delete('/remove/{cv_id}', 'Cv\CvController@remove');
        });
    }
);