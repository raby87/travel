@extends("layouts.master")

@section("title","登录")

@section("sidebar")

@stop

@section("content")
    <script type="text/javascript"
            src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js"
            data-appid="101309385" data-redirecturi="http://www.kcdlife.com/" charset="utf-8">
    </script>

    <span id="qqLoginBtn"></span>
    <script type="text/javascript">
        QC.Login({
            btnId:"qqLoginBtn"	//插入按钮的节点id
        });
    </script>
@stop