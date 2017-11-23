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
        //查询数据
        $blogList = self::select('id','user_id','blog_title','created_at')
            ->where('user_id',$uId)
            ->orderBy('created_at','desc')
            ->skip($page - 1)
            ->take(self::TAKE)
            ->get()->toarray();
        if(empty($blogList)){
            return [];
        }

        return self::_formatBlog($blogList);

    }


    //获取博客详情
    public static function getBlog($blogId){
        $blogInfo = self::select('id','user_id','blog_content','blog_title','blog_type_id','blog_type_name','created_at')
            ->where('id',$blogId)
            ->get()->toarray();
        return current(self::_formatBlog($blogInfo));
    }

    //组合数据
    private static function _formatBlog($blogList){
        if(empty($blogList)){
            return [];
        }
        //组合数据
        foreach($blogList as $key => &$val){
            if(!empty($val['user_id'])){
                //获取用户名称
                $userInfo = Users::getUserInfo($val['user_id'],['user_name','user_head']);
                if(empty($userInfo)){
                    //如果查不到用户名，则认为该用户被删，直接返回空数据
                    unset($blogList[$key]);
                }else{
                    $val['user_name'] = $userInfo['user_name'];
                    $val['user_head'] = $userInfo['user_head'];
                }
            }
        }
        return $blogList;
    }
}
