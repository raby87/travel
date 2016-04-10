<?php

namespace App\Http\Controllers\Rest;

use App\User;
use Validator;
use App\Http\Controllers\Controller;

class TravelController extends Controller
{

    public function index()
    {
        $user = User::find(1);
        dd($user);
        return $user;
    }
}
