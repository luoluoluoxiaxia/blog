<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Users;
class BlogContent extends Model
{
    use SoftDeletes;
    //
    protected $table = 'blog_content';

    const TAKE = 10;

    //获取用户博客列表
    public static function getBlogList($uId,$page){
        //获取用户名称
        $userInfo = Users::getUserInfo($uId,'user_name');
        if(empty($userInfo)){
            //如果查不到用户名，则认为该用户被删，直接返回空数据
            return [];
        }else{
            $userName = $userInfo['user_name'];
        }

        //查询数据
        $blogList = self::where('user_id',$uId)
            ->select('id','user_id','blog_title','created_at')
            ->orderBy('created_at','desc')
            ->skip($page - 1)
            ->take(self::TAKE)
            ->get()->toarray();
        if(empty($blogList)){
            return [];
        }

        //组合数据
        foreach($blogList as $key => &$val){
            $val['user_name'] = $userName;
        }

        return $blogList;
    }


}
