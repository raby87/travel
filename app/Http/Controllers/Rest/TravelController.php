<?php

namespace App\Http\Controllers\Rest;

use App\Comment;
use App\User;
use App\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use Input;
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
    public function detail($id){
        $tid = $id;
        $result = [];
        $travel = Travel::where('tid',$tid)->with('user')->with('image')->orderBy('init_time', 'desc')->first();
        $result['travel'] = $travel;

        $comments = Comment::where('tid',$tid)->with('user')->orderBy('init_time', 'desc')->take(10)->get();
        $result['comment'] = $comments;

        return response()->json($result);
    }

    public function publish()
    {

        $uid = Input::get('uid');
        $content = Input::get('content');
        $images = Input::get('images');

        Storage::disk('local')->put('test.txt', $images);

        $travel = new Travel();
        $travel->uid = $uid;
        $travel->content = $content;
        $tid = $travel->save();

        //$file = "/var/www/public_html/7kanya/www/Home/Public/img/clinic/50118/2_1379831629.9642.jpg";
        Storage::disk('local')->put($tid."_$uid.jpg", $images);
        return response()->json($tid);
    }
}
