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

Route::group(array('prefix' => 'admin'), function()
{
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('test', function()
    {
        return view('admin.login');
    });

});

/*************************************************************************************/
Route::group(array('prefix' => 'rest'), function()
{

    Route::get('test', function()
    {
        return view('admin.login');
    });


    Route::get('my', [
        'as' => 'user.index', 'uses' => 'Rest\UserController@index'
    ]);


    Route::get('login', [
        'as' => 'user.login', 'uses' => 'Rest\UserController@login'
    ]);


    Route::get('home', [
        'as' => 'travel.index', 'uses' => 'Rest\TravelController@index'
    ]);

    Route::get('detail', [
        'as' => 'travel.detail', 'uses' => 'Rest\TravelController@detail'
    ]);

    Route::post('publish', [
        'as' => 'travel.pulish', 'uses' => 'Rest\TravelController@publish'
    ]);

    Route::get('location', [
        'as' => 'location.index', 'uses' => 'Rest\LocationController@index'
    ]);

    Route::get('message', [
        'as' => 'message.index', 'uses' => 'Rest\MessageController@index'
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
