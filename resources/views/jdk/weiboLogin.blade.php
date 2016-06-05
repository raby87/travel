@extends("layouts.master")

@section("title","登录")

@section("sidebar")

@stop

@section("content")
    <span id="weiboLoginBtn" class="btn-success">weibo登录</span>
    <script type="text/javascript">
        $( "#weiboLoginBtn" ).click(function() {
            var url = "https://api.weibo.com/oauth2/authorize?client_id=3453585210&" +
                    "redirect_uri=http://www.kcdlife.com/response&response_type=code";

            window.location.href=url;
        });
    </script>
@stop