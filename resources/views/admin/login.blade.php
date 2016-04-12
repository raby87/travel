@extends("layouts.master")

@section("title","登录")

@section("sidebar")

@stop

@section("content")
    <h1 class="page-header">登 录</h1>
    <form action="{{ URL::to('reset/publish') }}" method="post" class="form-horizontal">
        <div class="form-group">
            <div class="col-sm-5">
                <input type="text" class="form-control" name="uid"     placeholder="请输入用户名"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-5">
                <input type="password" class="form-control" name="content" placeholder="请输入密码"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-5">
                <button class="btn-primary" type="submit">登 录</button>
            </div>
        </div>
    </form>
@stop