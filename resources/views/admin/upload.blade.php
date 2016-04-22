@extends("layouts.master")

@section("title","登录")

@section("sidebar")

@stop

@section("content")
    <h1 class="page-header">登 录</h1>
    <form action="{{ URL::to('doUpload') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="form-group">
            <div class="col-sm-5">
                <input type="text" class="form-control" name="name"     placeholder="请输入用户名"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-5">
                <input type="file" class="form-control" name="photo" placeholder="file" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-5">
                <button class="btn-primary" type="submit">登 录</button>
            </div>
        </div>
    </form>
@stop