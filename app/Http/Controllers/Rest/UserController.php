<?php

namespace App\Http\Controllers\Rest;

use App\Comment;
use App\User;
use App\Travel;
use Validator;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    /**
     *  todo 首页性能
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        $uid = 1;
        $user = User::find($uid)->orderBy('init_time', 'desc')->take(10)->get();

        return response()->json($user);
    }
    public function login()
    {

        return true;
    }
    public function detail()
    {

    }
}
