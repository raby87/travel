<?php

namespace App\Http\Controllers\Rest;

use App\Location;
use Validator;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{

    /**
     *  todo
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        $location = Location::orderBy('init_time', 'desc')->take(10)->get();

        return response()->json($location);
    }
    public function detail()
    {

    }
}
