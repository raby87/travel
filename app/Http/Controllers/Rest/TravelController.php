<?php

namespace App\Http\Controllers\Rest;

use App\Comment;
use App\User;
use App\Travel;
use Validator;
use App\Http\Controllers\Controller;

class TravelController extends Controller
{

    public function index()
    {
        $travels = Travel::with('user')->with('image')->orderBy('init_time', 'desc')->take(10)->get();

        $result = [];
        $result['test'] = $travels->toArray();
        foreach($travels as $k=>$travel){
            $tmp = [
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

                'image_list'=>$travel->image->toArray(),
            ];
            array_push($result,$tmp);
        }
        return response()->json($travels);
    }

    /**
     * todo 待优化，待增加追加的评论
     * @return \Illuminate\Http\JsonResponse
     */
    public function detail(){
        $tid = 1;
        $result = [];
        $travel = Travel::find($tid)->with('user')->with('image')->orderBy('init_time', 'desc')->first();
        //$result['travel'] = $travel->toJson();
        //$result['travel'][] = $travel->toJson();
        $result['travel'] = [
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
            ];

        $comments = Comment::find($tid)->with('user')->orderBy('init_time', 'desc')->take(10)->get();

        $comment_tmp = [];
        foreach ($comments as $k=>$comment) {
            $tmp = $comment;
            $tmp['user'] = $comment->user->toJson();
            array_push($comment_tmp,$tmp);
        }

        $result['comment'] = $comment_tmp;

        return response()->json($result);
    }
}
