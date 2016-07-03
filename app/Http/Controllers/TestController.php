<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    //ÒÀÀµ×¢Èë
    public function __construct(TestContract $test){
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
        // $test->callMe('TestController');
        $this->test->callMe('TestController');
    }

}
