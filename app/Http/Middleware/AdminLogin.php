<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

//后台登录验证的中间件
class AdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    //用于判断登录时session的值，如果session中有登录标识就登录到页面，如果没有就跳转到登录页（简单实现）
    public function handle($request, Closure $next)
    {
      if(session('isLogin')!=1){
          return redirect('admin/login');
        }
        return $next($request);
    }
}
