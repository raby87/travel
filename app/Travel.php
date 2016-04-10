<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $primaryKey = 'tid';

    public function user()
    {
        return $this->belongsTo('App\User','tid','uid');
    }
    public function image()
    {
        return $this->hasMany('App\TravelImage','tid','img_id');
    }
}
