<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $guarded = ['id', 'tid'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
