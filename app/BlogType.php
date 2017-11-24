<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogType extends Model
{
    protected $table = 'blog_type';
    //获取用户的博客类型
    public static function getUserType($uId){
        return self::select('id','type_name')
            ->where('user_id',$uId)
            ->orderBy('created_at','desc')
            ->get()->toarray();
    }
}
