<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Travel;
use Input;
use Validator;
use App\Http\Controllers\Controller;

class Table{

    public function make($source,$title){

    }
}

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    public function doLogin(){
        return response()->json(Input::all());
    }
}
