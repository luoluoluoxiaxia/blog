<?php

namespace App\Http\Controllers;

use App\BlogType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class BlogTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $type = $request->input('type');

        if(empty($type)){
            return response()->json([
                'status' => 2
            ]);
        }
        //判断是否登录
        if (!$request->user()) {
            //登录
            return Redirect::route('login');
        }

        //得到用户id
        $userInfo = $request->user()->toarray();

        $uId = $userInfo['id'];

        //插入数据库中

        $blogType = new BlogType;

        if($id = $blogType->insertGetId(['user_id'=>$uId,'type_name'=>$type])){
            $array = [
                'status' => 1,
                'id' => $id
            ];
        }else{
            $array = [
                'status' => 0,
            ];
        }
        return response()->json($array);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
