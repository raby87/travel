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
        $travel = Travel::with('user','image')->orderBy('init_time', 'desc')->take(10)->get();



        return response()->json([
            'tid'=>$travel->tid,
            'uid'=>$travel->uid,
            'icon'=>$travel->user->icon,
            'name'=>$travel->user->name,
            'sex'=>$travel->user->sex,
            'age'=>$travel->user->age,

            'init_time'=>$travel->init_time,
            'content'=>$travel->content,
            'comment_stat'=>$travel->comment_stat,
            'join_stat'=>$travel->join_stat,
            'like_stat'=>$travel->like_stat,

            'image_list'=>$travel->image->toJson(),
        ]);
    }
}
