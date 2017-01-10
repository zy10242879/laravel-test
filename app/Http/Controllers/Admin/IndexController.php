<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
class IndexController extends Controller {
  public function index(){
    echo '<h1>路由命名</h1><br />';
    echo '用于获得路由地址：'.route('AdminIndex');
  }
}