<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $primaryKey = 'cid';

    public function user()
    {
        return $this->belongsTo('App\User','to','uid');
    }
    //追加的评论
    public function userAttach()
    {
        return $this->belongsTo('App\User','to','uid');
    }
}
