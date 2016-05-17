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
     * @param string $col   "opt"
     * @param string $url   'aid',http://www.baidu.com/index.php?do=testController&aid=%s
     */
    public function addDecorator($col="",$url=[]){
        $cols = array_column($this->source,$col);
        $new_array = [];
        foreach($cols as $k=>$v){
            $tmp = str_replace("%s",$this->source[$k][$url[0]],"http://www.baidu.com/index.php?do=testController&aid=%s");
            $this->source[$k][$col] = $tmp;
        }
        return $this;
    }

    /**
     *
     */
    public function make(){
        print_r($this->source);die;

        $html = "<thead><tr>";
        foreach($this->titles as $k=>$v){
            $html .= "<th>".$v."</th>";
        }
        $html .="</tr></thead>";

        $html .="<tbody>";
        foreach($this->source as $k=>$item){
            $html .= "<tr>";
            foreach($item as  $vv){
                $html .= "<td>".$vv."</td>";

            }
            $html .= "</tr>";
        }
        $html .="</tbody>";

        return '<table class="table table-bordered table-striped table-condensed">'.$html."</table>";
    }

    /**
     * todo
     */
    public function addClass(){

    }
    /**
     * todo 
     */
    public function addAttr(){

    }
}

class AdminController extends Controller
{
    public function login()
    {
        $table = (new Table([['a'=>'a','b'=>'b'],['a'=>'aa','b'=>'bb'],['a'=>'aaa','b'=>'bbb']]))->addCol(['a'=>'title','b'=>'name'])->make();
        print_r($table);die;
        return view('admin.login');
    }
    public function doLogin(){
        return response()->json(Input::all());
    }
}
