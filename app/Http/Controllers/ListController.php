<?php

namespace App\Http\Controllers;

use App\BlogContent;
use Illuminate\Http\Request;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($uid = 1 ,$page = 1)
    {
        //获取用户uid
        $uId = $uid;
        //获取要看哪一页
        $page = $page;

        $BlogList = BlogContent::getBlogList($uId,$page);

        return view('blog.list', ['blogList' => $BlogList]);
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
     * @param  \App\blog_content  $blog_content
     * @return \Illuminate\Http\Response
     */
    public function show(blog_content $blog_content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\blog_content  $blog_content
     * @return \Illuminate\Http\Response
     */
    public function edit(blog_content $blog_content)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\blog_content  $blog_content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, blog_content $blog_content)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\blog_content  $blog_content
     * @return \Illuminate\Http\Response
     */
    public function destroy(blog_content $blog_content)
    {
        //
    }
}
