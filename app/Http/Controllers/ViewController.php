<?php

namespace App\Http\Controllers;

use App\Http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;


class ViewController extends Controller
{
    public function view(){
      //return view('view');//载入视图
      //传参方式一：不常用（原因为仅传递一个参数）
//      $name = '小王';
//      return view('view')->with('name',$name);
      //以上方式两个参数的传递方法(此方法较难看)
//      $name = '小张';
//      $age = 30;
//      return view('view')->with('name',$name)->with('age',$age);
      //传参方式二：使用不多
        $data=[
          'name'=>'小王',
          'age'=>'25',
          'score'=>60,
          'num'=>10,
          'article'=>[
            'news 1',
            'news 2',
            'news 3',
            'news 4',
          ],
          'news'=>[],
        ];
      $str = null;
      $script = '<script>document.write("laravel不错")</script>';
//      return view('view',$data);
      //方式二中：如果加入以下内容，将$title数据压入$data中是不合理的
      $title = '正在使用laravel';
      //传参方式三：常用方式（需要修改视图文件中的参数写法，以数组进行写入）
      return view('view',compact('data','title','str','script'));
    }

  public function index(){
    //查看配置项内容的方法
          //这个配置是自己刚刚添加的前缀，打印出来看下
    echo config('database.connections.mysql.prefix'),'<br />';
    echo config('app.debug'),'<br />';//这个配置就是.env中是否开启调试模式
    return view('index');
    }

  public function layout(){
    //用以下代码测试数据库是否连接成功
//    $pdo = DB::connection()->getPdo();
//    dd($pdo);
    //使用数据库进行数据查询
//    $users = DB::table('user')->where('user_id','>',2)->get();
//    dd($users);
    $user = User::find(1);
    dd($user);

    return view('layout');
  }
}
