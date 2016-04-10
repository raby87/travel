<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $primaryKey = 'tid';

    public function user()
    {
        return $this->belongsTo('App\User','uid','uid');
    }
    public function image()
    {
        return $this->hasMany('App\TravelImage','tid','tid');
    }
}
