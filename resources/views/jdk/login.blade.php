@extends("layouts.master")

@section("title","登录")

@section("sidebar")

@stop

@section("content")
    <span id="qqLoginBtn" class="btn btn-success">QQ登录</span>
    <script type="text/javascript">
        $( "#qqLoginBtn" ).click(function() {
            var url = "https://graph.qq.com/oauth2.0/authorize?response_type=code&" +
                    "client_id=101309385&redirect_uri=http://www.kcdlife.com/?type=qq&scope=do_like";

            window.location.href=url;
        });
    </script>

    <span id="weiboLoginBtn" class="btn btn-success">weibo登录</span>
    <script type="text/javascript">
        $( "#weiboLoginBtn" ).click(function() {
            var url = "https://api.weibo.com/oauth2/authorize?client_id=3453585210&" +
                    "redirect_uri=http://www.kcdlife.com?type=weibo&response_type=code";

            window.location.href=url;
        });
    </script>
@stop