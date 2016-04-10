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
        $user = Travel::find(1);
        dd($user);
        return $user;
    }
}
