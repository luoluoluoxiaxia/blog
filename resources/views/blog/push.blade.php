@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <form action="/add_blog" id="postForm">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="input-group input-group-lg col-md-12">
                                <input type="text" class="form-control" name="blog_title" placeholder="博客标题"  v-model="blogTitle">
                            </div>
                            <script id="container" name="blog_content" type="text/plain" v-model="blogContent">
                            </script>
                            <div class="col-md-12"  >
                                    <div class="col-md-1">
                                        <span >分类选择</span>
                                    </div>
                                    <div class="btn-group" data-toggle="buttons" style="float: left">
                                        {{--@foreach( $typeList as $val)--}}
                                            <label class="btn btn-primary" v-for="r in blogTypeList">
                                                <input  type="radio" name="blog_type_id" id="@{{r.id}}" value="@{{r.id}}" v-model="blogTypeId">@{{r.type_name}}
                                            </label>
                                        {{--@endforeach--}}
                                    </div>

                                <div class="col-md-2" style="float: left">
                                    <button type="button" class="btn btn-primary col-md-6"
                                            data-toggle="button"  v-on:click="greet"> 新增
                                    </button>
                                    <div class="input-group input-group-sm col-md-6" v-show="isShow">
                                        <input type="text"  v-model="message"  class="form-control" placeholder="新增" id="addInput" v-on:blur="changeCount">
                                    </div>
                                </div>
                            </div>
                            <div class="input-group input-group-lg col-md-12">
                                <button v-on:click="postForm" type="submit" class="btn btn-default text-center" style="display: block;margin-left: auto;margin-right: auto;" >baocun</button>
                            </div>
                        </div>
                    </div>
                </form>
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
            el: '#postForm',
            data: {
                name: 'Vue.js',
                isShow:false,
                message:null,
                blogTypeList:@json($typeList),
                blogTitle:'',
                blogContent:'',
                blogTypeId:'',
            },
            methods: {
                greet: function (event) {
                    this.isShow = true
                },
                changeCount: function (value){
                    if( this.message == '' || this.message == null){
                        //可以获取ue编辑器的内容 alert(ue.getContent());
                        alert("请输入分类");
                        return;
                    }
                    //得到新的分类，将他通过ajax插入到数据库中
                    let data = [
                        ["type", this.message],
                    ];
                    let url_params = new URLSearchParams(data);
                    axios.post('/add_type', url_params).then((response) => {
                        if(response.data.status == 1){
                            this.blogTypeList.push({"id":response.data.id,"type_name":this.message})

                        }
                    }).catch(function (error) {
                    });
                }
            }
        })
//        var postForm = new Vue({
//            el: '#',
//            data:{
//
//            },
//            postForm : function (){
//                alert(this.blog_type_id);
//            }
//        })
    </script>

@endsection