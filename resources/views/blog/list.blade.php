@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">博客列表</div>
                <div class="panel-body">
                    <div class="list">
                        @foreach ($blogList as $key =>$val)
                            <div class="list-group" id="blog-list-{{$val['id']}}">
                                <a href="/blog/{{$val['id']}}" class="list-group-item">
                                    <h4 class="list-group-item-heading"> {{$val['blog_title']}}</h4>
                                    <p class="list-group-item-text text-right">用户名：{{$val['user_name']}}</p>
                                    <p class="list-group-item-text text-right">创建时间：{{$val['created_at']}}</p>
                                    @if (Route::has('login'))
                                            @auth
                                                @if (Auth::user()->id == $val['user_id'])
                                            @endif
                                            @endauth
                                    @endif
                                </a>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
</script>
@endsection