<?php

namespace App\Http\Controllers\Rest;

use App\User;
use App\Travel;
use Validator;
use App\Http\Controllers\Controller;

class TravelController extends Controller
{

    public function index()
    {
        $user = Travel::find()->orderBy('init_time', 'desc')->with('user')->take(10)->get();

        return $user->toJson();
    }
}
