<?php

namespace App\Http\Controllers\Rest;

use App\Message;
use Validator;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{

    /**
     *  todo
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        $message = Message::get();

        return response()->json($message);
    }
    public function detail()
    {

    }
}
