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

    Route::get('login', [
        'as' => 'admin.login', 'uses' => 'AdminController@login'
    ]);
    Route::post('doLogin', [
        'as' => 'admin.login', 'uses' => 'AdminController@doLogin'
    ]);
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

    Route::get('home', [
        'as' => 'travel.index', 'uses' => 'TravelController@index'
    ]);

    Route::get('detail', [
        'as' => 'travel.detail', 'uses' => 'TravelController@detail'
    ]);

    Route::post('publish', [
        'as' => 'travel.pulish', 'uses' => 'TravelController@publish'
    ]);

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
