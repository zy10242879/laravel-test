<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

class UserController extends Controller
{
    public function user(){
      echo '欢迎您！';
    }
}
