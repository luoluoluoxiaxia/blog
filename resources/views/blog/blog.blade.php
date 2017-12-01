@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 ">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1>{{$blogInfo['blog_title']}}</h1>
                        <div class="jumbotron">
                           {!! $blogInfo['blog_content'] !!}
                        </div>
                    </div>
                    <div class="panel-heading text-right ">
                        <span style="font-size: 10px">创建时间：{{$blogInfo['created_at']}}</span>
                    </div>
                    <div class="panel-heading text-right">
                        <span>分类名：{{$blogInfo['blog_type_name']}}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="col-md-8 list-group text-center" >
                        <a href="/list/{{$userInfo['id']}}" class="list-group-item">
                        <img src="{{$userInfo['user_head']}}">
                        <h4 class=" ">用户名：{{$userInfo['user_name']}}</h4>
                        </a>
                </div>

            </div>
        </div>
    </div>
@endsection