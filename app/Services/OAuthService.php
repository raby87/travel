<?php

namespace App\Services;

use App\Contracts\OAuthContract;

class OAuthService implements OAuthContract
{
    private $type = null;
    private $url = null;
    private $login = null;  //µÇÂ½×´Ì¬
    private $token = null;
    public function __construct($type = ""){
        $this->type = $type ?: "qq";
    }
    public function callMe($controller)
    {
        dd('Call Me From OAuthServiceProvider In '.$controller);
    }
    public function authorize(){
        $data = [];
        switch($this->type){
            case 'weibo':
                $data = $this->getTokenQQ();
                break;
            case 'qq':
                $data = $this->getTokenWeibo();
                break;
            default:;
        }
        return json_encode($data);
    }
    private function getTokenQQ(){
        $code = $_GET['code'];
        $url = "https://graph.qq.com/oauth2.0/token";
        $data = [
            'client_id' => '101309385',
            'client_secret'=>'9b77806974b0213b3998e976bb3195ee',
            'grant_type'=>'authorization_code',
            'code'=>$code,
            'redirect_uri'=>'http://www.kcdlife.com'
        ];
        $rsData = $this->http($url,$data);
        $access_token_params = explode('&',$rsData)[0];
        $this->token = explode('=',$access_token_params)[1];
        return $rsData;
    }
    private function getTokenWeibo(){
        $code = $_GET['code'];
        $url = "https://api.weibo.com/oauth2/access_token";
        $data = [
            'client_id' => '3453585210',
            'client_secret'=>'c6bd0d3e5e4cd8ab60192fce14fa03f4',
            'grant_type'=>'authorization_code',
            'code'=>$code,
            'redirect_uri'=>'http://www.kcdlife.com',
        ];
        $rsData = $this->http($url,$data);
        return $rsData;
    }
    public function getUser(){
        $data = [];
        switch($this->type){
            case 'weibo':
                $data = $this->getUserQQ();
                break;
            case 'qq':
                $data = $this->getUserWeibo();
                break;
            default:;
        }
        return json_encode($data);
    }

    private function getUserQQ(){
        $graph_url = "https://graph.qq.com/oauth2.0/me?access_token=".$this->token;
        $str  = file_get_contents($graph_url);
        if (strpos($str, "callback") !== false)
        {
            $lpos = strpos($str, "(");
            $rpos = strrpos($str, ")");
            $str  = substr($str, $lpos + 1, $rpos - $lpos -1);
        }
        $user = json_decode($str);
        if (isset($user->error))
        {
            echo "<h3>error:</h3>" . $user->error;
            echo "<h3>msg  :</h3>" . $user->error_description;
            exit;
        }

    }
    private function getUserWeibo(){

    }


    private function http($url,$data){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
            http_build_query($data));

// receive server response ...lo
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec ($ch);
        $error = curl_error($ch);
        curl_close ($ch);
        if($error){
            echo $error;    die;
            return ;
        }
        return $server_output;
    }
}