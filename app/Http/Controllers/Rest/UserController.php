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
        $user = User::find($uid)->first();

        return response()->json($user);
    }
    /**
     *
     *App Key:
     *   1817611297
     *App Secret:
     *   65a40f3a74b7859a07baad262aaed2d1
     */
    public function login()
    {

        return true;
    }
    public function detail()
    {

    }
}
