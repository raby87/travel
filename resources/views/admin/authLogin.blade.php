@extends("layouts.master")

@section("title","登录")

@section("sidebar")

@stop

@section("content")
    <script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=1817611297&debug=true" type="text/javascript" charset="utf-8"></script>
    <h1 class="page-header">登 录</h1>
    <div id="wb_connect_btn1" onclick="login()">登录</div>
    <script type="application/javascript" >
        //https://api.weibo.com/oauth2/authorize?client_id=1817611297&
        // redirect_uri=http://run.51094.com&response_type=code
        function login(){
           window.location.href="https://api.weibo.com/oauth2/authorize?client_id=1817611297&redirect_uri=http://run.51094.com&response_type=code";
        }
    </script>
@stop