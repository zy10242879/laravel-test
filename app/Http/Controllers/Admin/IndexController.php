<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
class IndexController extends Controller {
  public function index(){
    return view('welcome');
  }

  public function login(){
    //此处逻辑为查看session中存的登录状态是否正常
    //通过post提交的用户名和密码查找数据库并进行验证
    //如果数据验证成功就将session中写入数据，同下
    session(['isLogin'=>1]);
    //然后跳转到后台首页
    echo '登录界面！';
  }
}