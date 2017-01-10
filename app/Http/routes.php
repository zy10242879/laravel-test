<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    });

});
//-----------基础控制器的创建和路由的操作----------
//****手动创建***
//Http/Controllers/创建控制器名IndexController　已使用控制器分文件夹
Route::get('index','Admin\IndexController@index');
//********自动创建（推荐）********
//使用shell进入虚拟机项目目录中，使用artisan命令来完成
//[root@localhost laravel]# php artisan make:controller UserController

//-----------控制器分文件夹--------
//在Http/Controllers下创建Admin文件夹
//注意修改：①路由要修改如下　②User控制器中的命名空间 ③控制器use引入Controller
Route::get('user','Admin\UserController@user');


//---------建立6个基础路由，及2个多重路由，并通过postman进行调试----------
//使用方法　laravel.app/request 选择get/post...
//主要了解 **get** **post** **any**
Route::get('request',function (){
  return 'get';
});

Route::post('request',function (){
  return 'post';
});

Route::put('request',function (){
  return 'put';
});

Route::delete('request',function (){
  return 'delete';
});

Route::patch('request',function (){
  return 'patch';
});

Route::options('request',function (){
  return 'options';
});
    //match 匹配后面的请求方法，以上6个都可以写入
Route::match(['get','post'],'requests',function (){
  return 'match';
});

Route::any('requests_all',function (){
  return 'requests_all_any';
});
//-----------------路由参数(必选参数)------------------------
               //{id}路由参数(实参)  ↓形参
Route::get('user/{id}', function ($id) {
  return 'User '.$id;
});
    //注意：路由参数↓连接的 / 不能包含 - 字符，需要的话可以使用 _ 替代
Route::get('posts/{post}/comments/{comment}', function ($postId, $commentId) {
  return $commentId;
});
//-----------------路由参数(可选参数)------------------------
//{?}内部多了个问号，在不写入参数的情况下，设置默认参数后↓↓，可以
Route::get('user/{name?}', function ($name = 'John') {
  return $name;
});
//如果post传参的话，访问url为：http://laravel.app/posts/comments 以下代码会报错，由于路由无法分辨参数
Route::get('posts/{post?}/comments/{comment?}', function ($postId=0, $commentId=null) {
  return $postId.'--'.$commentId;        //此种情况下，一般可选参数仅设置为最后一个参数
});
//-----------------参数正则筛选(主要为参数的类型限制)-------------
Route::get('user/{id}', function ($id) {
  return 'UserID  '.$id;
})->where('id', '[0-9]+');//*******正则筛选id仅为数字******
//**********用途为防攻击　sql注入等　较为重要********
//-------------全局正则配置---------
//在app/Providers/RouteServiceProvider.php中进行配置，用途不大，可查看配置方法
//一旦模式被定义，将会自动应用到所有包含该参数名的路由中