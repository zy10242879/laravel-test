<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index(){
      echo 123;
    }

    public function store(){
      //此方法可以用postman来进行调试
      echo 234;
    }
}
