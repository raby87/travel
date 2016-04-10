<?php

namespace App\Http\Controllers\Rest;

use App\Comment;
use App\User;
use App\Travel;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;

class TravelController extends Controller
{

    /**
     *  todo 首页性能
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        $travels = Travel::with('user')->with('image')->orderBy('init_time', 'desc')->take(10)->get();

        $result = [];
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

        return response()->json($result);
    }

    /**
     * todo 待优化，待增加追加的评论
     * @return \Illuminate\Http\JsonResponse
     */
    public function detail(){
        $tid = 1;
        $result = [];
        $travel = Travel::find($tid)->with('user')->with('image')->orderBy('init_time', 'desc')->first();
        $result['travel'] = $travel;

        $comments = Comment::find($tid)->with('user')->orderBy('init_time', 'desc')->take(10)->get();
        $result['comment'] = $comments;

        return response()->json($result);
    }

    public function publish()
    {
        $uid = 1;
        $input = Request::all();
        $rs = Travel::create([
            'uid'=>$uid,
            'content'=>$input['content'],
        ]);


        return response()->json($rs);
    }
}
