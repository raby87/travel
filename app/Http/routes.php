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
    $code = isset($_GET['code']) ? $_GET['code'] : "";
    //if(!$code)
    //    return view('welcome');

    $url = "https://api.weibo.com/oauth2/access_token";
    $data = [
        'client_id' => '1817611297',
        'client_secret'=>'65a40f3a74b7859a07baad262aaed2d1',
        'grant_type'=>'authorization_code',
        'code'=>$code,
        'redirect_uri'=>'http://run.51094.com',
    ];

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POST, 1);
//    curl_setopt($ch, CURLOPT_POSTFIELDS,
//        "postvar1=value1&postvar2=value2&postvar3=value3");

// in real life you should use something like:
    curl_setopt($ch, CURLOPT_POSTFIELDS,
        http_build_query($data));

// receive server response ...
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec ($ch);

    curl_close ($ch);
    //echo "".$server_output;
    return $server_output;
    //return view('welcome');
});


Route::get('/info', function () {
    $code = isset($_GET['code']) ? $_GET['code'] : "";
    //if(!$code)
    //    return view('welcome');

    $url = "https://api.weibo.com/oauth2/access_token";
    $data = [
        'client_id' => '1817611297',
        'client_secret'=>'65a40f3a74b7859a07baad262aaed2d1',
        'grant_type'=>'authorization_code',
        'code'=>$code,
        'redirect_uri'=>'http://run.51094.com/info',
    ];

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POST, 1);
//    curl_setopt($ch, CURLOPT_POSTFIELDS,
//        "postvar1=value1&postvar2=value2&postvar3=value3");

// in real life you should use something like:
    curl_setopt($ch, CURLOPT_POSTFIELDS,
        http_build_query($data));

// receive server response ...
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec ($ch);

    curl_close ($ch);
    echo $server_output;
    exit;

});

Route::get('/test', function () {

    return view('admin/authLogin');
});

Route::get('/upload', function () {
        return view('admin/upload');
});

Route::post('/doUpload', function () {
    $name = \Illuminate\Support\Facades\Input::get("name");

    $photo = \Illuminate\Support\Facades\Input::file("photo");
    $size = $photo->getSize();
    $path = $photo->getRealPath();
    $photo->move(storage_path('app'),"11.jpg");

    dd([storage_path('app'),$path,$photo,$size]);
});




Route::group(array('prefix' => 'admin','namespace' => 'Admin'), function()
{
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('test/{id}', function($id)
    {
        $travel = \App\Travel::paginate($id);
        $pageView = $travel->render();
        //dd([$travel,$pageView]);

        return view('admin.login',['travel'=>$travel]);
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

        Route::get('detail/{id}', [
            'as' => 'detail', 'uses' => 'TravelController@detail'
        ])->where('id', '[0-9]+');

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
