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

Route::group(['prefix' => 'admin', 'middleware' =>  ['auth', 'role:admin']], function () {

    //Dashboard
    Route::get('dashboard', 'Admin\HomeController@index');

    //Profile
    Route::get('users', 'Admin\UserController@index');
    Route::get('user/profile', 'Admin\UserController@get_profile');
    Route::post('user/profile', 'Admin\UserController@post_profile');
    Route::get('user/delete-image', 'Admin\UserController@delete_image');

    //Videos
    Route::get('videos', 'Admin\VideoController@index');

    //Option
    Route::get('options', 'Admin\OptionController@get_edit');
    Route::post('options', 'Admin\OptionController@post_edit');
    Route::get('options/delete-favicon', 'Admin\OptionController@delete_favicon');
    Route::get('options/delete-logo', 'Admin\OptionController@delete_logo');

    Route::get('cache/flush', 'Admin\HomeController@cache_flush');

});

