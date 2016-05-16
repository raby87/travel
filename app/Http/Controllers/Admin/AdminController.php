<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Travel;
use Input;
use Validator;
use App\Http\Controllers\Controller;

class Table{
    private $source = [];
    private $titles = [];

    private $org = [];

    public function __construct($org=[]){
        $this->org = $org;
    }
    public function addLeft($title="",$col=[]){
        array_unshift($this->titles,$title);
        array_unshift($this->source,$col);
        return $this;
    }
    public function addRight($title="",$col=[]){
        array_unshift($this->titles,$title);
        array_unshift($this->source,$col);
        return $this;
    }
    public function addCol($titles=[]){
        $keys = array_keys($titles);
        $values = array_values($titles);
        foreach($keys as $k=>$v){
           $row = array_column($this->org,$v);
            array_push($this->source,$row);
        }
        $this->titles = $values;
        return $this;
    }
    /**
     * @param string $col
     * @param string $url   http://www.baidu.com/index.php?do=testController&aid=%s
     */
    public function addDecorator($col="",$url=[]){
        $cols = array_column($this->source,$col);
        
    }

    /**
     * todo 一次性渲染
     * @param $source
     */
    public function make(){

    }

    /**
     * todo 用于js绑定方法
     */
    public function addClass(){

    }
    /**
     * todo 用于js绑定方法
     */
    public function addAttr(){

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
