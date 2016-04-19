@extends("layouts.master")

@section("title","登录")

@section("sidebar")

@stop

@section("content")
    <script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=1817611297&debug=true" type="text/javascript" charset="utf-8"></script>
    <h1 class="page-header">登 录</h1>
    <div id="wb_connect_btn"></div>
    <script type="application/javascript" >
        WB2.anyWhere(function (W) {
        W.widget.connectButton({
        id: "wb_connect_btn",
        type: '3,2',
        callback: {
        login: function (o) { //登录后的回调函数
        alert("login: " + o.screen_name)
        },
        logout: function () { //退出后的回调函数
        alert('logout');
        }
        }
        });
        });
    </script>
@stop