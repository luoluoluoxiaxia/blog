@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <script id="container" name="content" type="text/plain">
                            这里写你的初始化内容
                        </script>

                    {{--<div class="panel-heading text-right">--}}
                        {{--<span>分类名：111</span>--}}
                    {{--</div>--}}
                        <div class="col-md-12" >
                                <div class="col-md-1">
                                    <span >分类选择</span>
                                </div>
                                <div class="btn-group" data-toggle="buttons" style="float: left">
                                    @foreach( $typeList as $val)
                                        <label class="btn btn-primary">
                                            <input type="radio" name="options" id="option1" value="{{$val['id']}}">{{$val['type_name']}}
                                        </label>
                                    @endforeach
                                </div>

                            <div class="col-md-1" style="float: left">
                                <button type="button" class="btn btn-primary"
                                        data-toggle="button" id="addType" v-on:click="greet"> 新增
                                </button>
                            </div>
                            <div class="input-group input-group-sm col-md-1 hidden">
                                <input type="text" class="form-control" placeholder="新增" id="addInput">
                            </div>
                        </div>
                </div>
                </div>

            </div>
        </div>
    </div>
    <script type="text/javascript">
        var ue = UE.getEditor('container');
        ue.ready(function() {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
        });
    </script>
    <script type="text/javascript">
        var addType = new Vue({
            el: '#addType',
            data: {
                name: 'Vue.js'
            },
            // 在 `methods` 对象中定义方法
            methods: {
                greet: function (event) {
                    // `this` 在方法里指向当前 Vue 实例
                    alert('Hello ' + this.name + '!')
                    // `event` 是原生 DOM 事件
                    if (event) {
                        alert(event.target.tagName)
                    }
                }
            }
        })
    </script>

@endsection