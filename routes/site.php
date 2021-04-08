<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'web'], function () {

    //Home
    Route::get('/', 'Site\VideoController@get_feeds');

    //Login
    Route::get('login', ['as' => 'login', 'uses' => 'Site\AuthController@get_login']);
    Route::post('login', 'Site\AuthController@post_login');
    Route::get('logout', 'Site\AuthController@get_logout');

    //Register
    Route::get('register', 'Site\AuthController@get_register');
    Route::post('register', 'Site\AuthController@post_register');

    //Feeds
    Route::get('feed/video/{id}', 'Site\VideoController@get_single_feed');
    Route::post('feed/video/{id}', 'Site\VideoController@post_rating');

    //Video Upload
    Route::get('video/add', 'Site\VideoController@get_add_video');
    Route::post('video/add', 'Site\VideoController@post_video');

});
