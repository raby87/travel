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
        foreach($keys as $v){
            foreach($this->org as $k=>$col){
                $tmp = $col[$v];
                $this->source[$k][$v]=$tmp;
            }
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
        $types = array_keys($url);

        $new_array = [];
        foreach($cols as $k=>$v){
            $href = $label = $data_id = "";
            if(isset($url['url'])){
                $link = $url['url'];
                $id = $link[0];
                $tmp = str_replace("%s",$this->source[$k][$id],$link[1]);
                $href .= "href='".$tmp."'";
            }
            if(isset($url['label'])){
                $label .= $url['label'];
            }
            if(isset($url['data-id'])){
                $data_id .= "data-id='".$url['data-id']."'";
            }
            $item = '<a class="btn btn-xs btn-success btn-domain-del" '.$data_id.' '.$href.'>'.$label.'</a>';
            $this->source[$k][$col] = $item;
        }
        return $this;
    }

    /**
     *
     */
    public function make(){

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
class Panel{
    private $heading = "";
    private $body = "";
    public function heading($heading=""){
        $this->heading = $heading;
        return $this;
    }
    public function body($body=""){
        $this->body = $body;
        return $this;
    }
    public function make(){
        $html = '<div class="panel">
        <div class="panel-heading">
            '.$this->heading.'
        </div>
        <div class="panel-body">'.$this->body.'</div>
        </div>';
        return $html;
    }
}

class AdminController extends Controller
{
    public function login()
    {
        $header = '代理商管理<input class="btn btn-sm btn-success pull-right" type="button" value="添加代理商" id="omsAgencyAdd"  />';

        $table = (new Table([['a'=>'a','b'=>'b'],['a'=>'aa','b'=>'bb'],['a'=>'aaa','b'=>'bbb']]))
            ->addCol(['a'=>'title','b'=>'name'])
            ->addDecorator('a',['url'=>["a","www.baidu.com/%s"],'data-id'=>"did","label"=>"删除"])
            ->make();

        $panel = (new Panel())->heading($header)->body($table)->make();
        echo $panel;
        print_r($table);die;
        return view('admin.login');
    }
    public function doLogin(){
        return response()->json(Input::all());
    }
}
