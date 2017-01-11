@extends('layouts.home')  <!--继承公共模板-->
@section('content')        <!--写入自己页面的内容-->
    @parent <!--@parent用于显示公共部份的页面内容，如果不写公共模板的section中的内容将不显示-->
    <div class="middle">首页中间部分</div>
    @endsection

<!--------------注意：固定写法------->