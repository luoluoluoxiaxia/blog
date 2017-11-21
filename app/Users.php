<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name', 'email', 'password','user_head'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //通过uid获取用户信息
    public static function getUserInfo($uid,$select){
        $userInfo = self::where('id',$uid)->select($select)->first();

        if(empty($userInfo)){
            return [];
        }else{
            return $userInfo;
        }
    }
}
