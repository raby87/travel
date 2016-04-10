<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $primaryKey = 'uid';
    protected $hidden = [
        'password', 'remember_token',
    ];
}
