<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
class IndexController extends Controller {
  public function index(){
    return view('welcome');
  }

  public function login(){
    echo '登录界面！';
  }
}