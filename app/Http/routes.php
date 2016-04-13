<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(array('prefix' => 'admin','namespace' => 'Admin'), function()
{
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('test', function()
    {
        return view('admin.login');
    });

    Route::group(['as' => 'admin.'], function() {

        Route::get('login', [
            'as' => 'login', 'uses' => 'AdminController@login'
        ]);
        Route::post('doLogin', [
            'as' => 'doLogin', 'uses' => 'AdminController@doLogin'
        ]);

    });
});

/*************************************************************************************/
Route::group(array('prefix' => 'rest','namespace' => 'Rest'), function()
{

    Route::get('test', function()
    {
        return view('admin.login');
    });


    Route::group(['as' => 'user.'], function() {

        Route::get('my', [
            'as' => 'index', 'uses' => 'UserController@index'
        ]);


        Route::get('login', [
            'as' => 'login', 'uses' => 'UserController@login'
        ]);

    });


    Route::group(['as' => 'travel.'], function() {

        Route::get('home', [
            'as' => 'index', 'uses' => 'TravelController@index'
        ]);

        Route::get('detail', [
            'as' => 'detail', 'uses' => 'TravelController@detail'
        ]);

        Route::post('publish', [
            'as' => 'pulish', 'uses' => 'TravelController@publish'
        ]);

    });

    Route::get('location', [
        'as' => 'location.index', 'uses' => 'LocationController@index'
    ]);

    Route::get('message', [
        'as' => 'message.index', 'uses' => 'MessageController@index'
    ]);
});


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
