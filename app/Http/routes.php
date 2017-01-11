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
//此处为系统默认创建的路由，带中间件
Route::group(['middleware' => ['web']], function () {
    Route::get('admin/login','Admin\IndexController@login');
    Route::get('/', function () { //最简单的路由，直接载入视图
        return view('welcome');
    });

});

//-----------视图（路由->控制器->载入视图<传参>）----------------
//步骤：1.创建路由
Route::get('view','ViewController@view');
//    2.创建控制器 shell  php artisan make:controller ViewController 并在控制器中载入视图用view()
//    3.在resources/views下建立视图view.blade.php  必需加blade由于通过blade模板引擎来进行操作
//    4.查看resources/views/view.blade.php中３种传参的方式
//-----------blade模板引擎的使用---------
Route::get('index','ViewController@index'); //继承模板的使用方法
Route::get('layout','ViewController@layout'); //引入模板的使用方法

//-------------路由群组----由于分文件夹index要加上admin/（不然多个index会载入错误）
//Route::get('admin/index','Admin\IndexController@index');
//Route::get('admin/login','Admin\IndexController@login');
//****将以上↑↑两组路由同样类型的放入到路由群组中去↓↓*****中间件（重要）↓↓↓*************
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['web','admin.login']],function(){
  Route::get('index','IndexController@index'); //web是最基本的中间件↑↑↑引入后才可以使用session及csrf

  //通过php artisan route:list可查看所有路由
  //--------资源路由（重要）同时创建增删改查显示等各种方法------------
  //         创建文章↓↓资源路由，控制器↓↓写法 laravel.app/admin/article/(index,store,create,show,edit...)
  Route::resource('article', 'ArticleController');
  Route::resource('category', 'CategoryController');
  Route::resource('admin', 'AdminController');
  Route::resource('comment', 'CommentController');
});
//--------------***中间件的创建***--------------
//步骤：
//①在Http/Kernel.php文件中定义中间件　例：
  //创建后台登录时要验证session的中间件
  //'admin.login'=>[\App\Http\Middleware\AdminLogin::class,],
//②创建中间件：shell中在项目目录用php artisan make:middleware AdminLogin
//③在中间件写入操作逻辑

//-----子域名绑定(不常用)查看文档即可（以下为用法）------
//Route::group([/*'prefix'=>'admin','namespace'=>'Admin',*/'domain'=>'news.laravel.app'],function(){});
//-----命名路由群见文档（不常用）-------
//Route::group(['as' => 'admin::'], function () {
//  Route::get('dashboard', ['as' => 'dashboard', function () {
    // 路由被命名为 "admin::dashboard"
//  }]);
//});
//------------路由的命名（不常用）-----------
//命名路由为生成 URL 或重定向提供了便利                        名字随意↓↓
//Route::get('index', 'Admin\IndexController@index')->name('AdminIndex');
//通过函数route('AdminIndex')可以显示地址：http://laravel.app/index
//此处需要将下面的手动创建 index　路由注释，不然会运行到下方

//-----------基础控制器的创建和路由的操作----------
//****手动创建***
//Http/Controllers/创建控制器名IndexController　已使用控制器分文件夹
//Route::get('index','Admin\IndexController@index');
//********自动创建（推荐）********
//使用shell进入虚拟机项目目录中，使用artisan命令来完成
//[root@localhost laravel]# php artisan make:controller UserController

//-----------控制器分文件夹--------
//在Http/Controllers下创建Admin文件夹
//注意修改：①路由要修改如下　②User控制器中的命名空间 ③控制器use引入Controller
//Route::get('user','Admin\UserController@user');


//---------建立6个基础路由，及2个多重路由，并通过postman进行调试----------
//使用方法　laravel.app/request 选择get/post...
//主要了解 **get** **post** **any**
//Route::get('request',function (){
//  return 'get';
//});
//
//Route::post('request',function (){
//  return 'post';
//});
//
//Route::put('request',function (){
//  return 'put';
//});
//
//Route::delete('request',function (){
//  return 'delete';
//});
//
//Route::patch('request',function (){
//  return 'patch';
//});
//
//Route::options('request',function (){
//  return 'options';
//});
    //match 匹配后面的请求方法，以上6个都可以写入
//Route::match(['get','post'],'requests',function (){
//  return 'match';
//});
//
//Route::any('requests_all',function (){
//  return 'requests_all_any';
//});
//-----------------路由参数(必选参数)------------------------
               //{id}路由参数(实参)  ↓形参
//Route::get('user/{id}', function ($id) {
//  return 'User '.$id;
//});
    //注意：路由参数↓连接的 / 不能包含 - 字符，需要的话可以使用 _ 替代
//Route::get('posts/{post}/comments/{comment}', function ($postId, $commentId) {
//  return $commentId;
//});
//-----------------路由参数(可选参数)------------------------
//{?}内部多了个问号，在不写入参数的情况下，设置默认参数后↓↓，可以
//Route::get('user/{name?}', function ($name = 'John') {
//  return $name;
//});
//如果post传参的话，访问url为：http://laravel.app/posts/comments 以下代码会报错，由于路由无法分辨参数
//Route::get('posts/{post?}/comments/{comment?}', function ($postId=0, $commentId=null) {
//  return $postId.'--'.$commentId;        //此种情况下，一般可选参数仅设置为最后一个参数
//});
//-----------------参数正则筛选(主要为参数的类型限制)-------------
//Route::get('user/{id}', function ($id) {
//  return 'UserID  '.$id;
//})->where('id', '[0-9]+');//*******正则筛选id仅为数字******
//**********用途为防攻击　sql注入等　较为重要********
//-------------全局正则配置---------
//在app/Providers/RouteServiceProvider.php中进行配置，用途不大，可查看配置方法
//一旦模式被定义，将会自动应用到所有包含该参数名的路由中