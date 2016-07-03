<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App;
use App\Contracts\OAuthContract;
class TestController extends Controller
{
    //ÒÀÀµ×¢Èë
    public function __construct(OAuthContract $test){
        $this->test = $test;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     * @author LaravelAcademy.org
     */
    public function index()
    {
        // $test = App::make('test');
        // $test->authorize('TestController');
        $this->test->authorize();
    }

}
