<?php

namespace App\Http\Controllers;

use App\BlogContent;
use App\BlogType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($blogId)
    {
        if (empty($blogId)) {
            return view('prompt', ['mess' => '请输入blog_id']);
        }

        //获取博客
        $blogInfo = BlogContent::getBlog($blogId);

        if(empty($blogInfo)){
            return view('prompt', ['mess' => '用户不存在']);
        }

        //获取评论
        return view('blog.blog', ['blogInfo'=>$blogInfo]);

    }
    public function push(Request $request){

        if (!$request->user()) {
            //登录
            return Redirect::route('login');
        }

        //得到用户id
        $userInfo = $request->user()->toarray();
        //获取已有分类
        $typeList = BlogType::getUserType($userInfo['id']);

        return view('blog.push',['typeList'=>$typeList]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */


    public function show(Blog $blog)
    {
        //
        $blogInfo = self::where('id',$blog)
            ->first();

        return view('blog.list',compact('blogInfo'));
//        return current(self::_formatBlog($blogInfo));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
