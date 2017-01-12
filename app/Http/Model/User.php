<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //要设定表名（默认为加s的users）
    protected $table = 'user';
    //如果用到主键，要设置主键（默认为id）
    protected $primaryKey = 'user_id';
    //如果要创建和更新，那要么数据库中加入created_at及updated_at
    //默认自动增加以上的更新时间，或通过以下设置来屏蔽
    public $timestamps = false;
}
