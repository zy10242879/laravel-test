<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 24px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                {{--<div class="title">载入视图成功</div>--}}
                <!-- 注意注释方法，容易出现错误
                传参方式：一　二　种可用写法
                <div class="title"><?//=$name;?>！</div>
                <div class="title"><?//=$age;?>！</div>
                传参方式：三　的写法
                <div class="title"><?//=$data['name'];?></div>
                <div class="title"><?//=$data['age'];?></div>
                <div class="title"><?//=$title;?></div>-->
                <!--使用blade模板引擎-->
                <div class="title">---------blade模板引擎———基本输出使用方法-----------</div>
                <div class="title">{{$title}}－－@{{$title}}普通变量</div>
                <div class="title">{{$data['name']}}－－@{{$data['name']}}数组</div>
                <div class="title">@{{$data['name']}}－－@屏蔽blade模板引擎</div>
                <div class="title">{{$str or '默认值'}}－－@{{$str or 默认值}}$str为空时加上默认值的写法</div>
                <div class="title">{{isset($a)?$a:'xxx'}}－－@{{isset($a)?$a:'xxx'}}三元写法</div>
                <div class="title">{{$script}}－－@{{$script}}会被转意</div>
                <div class="title">{!!$script!!}－－@{!!$script!!}不转意方法</div>
                <div class="title">---------blade模板引擎———流程控制使用方法-----------</div>
                <h2>if的写法--@@if($data['score']>=60)及格@@else不及格@@endif</h2>
                    @if($data['score']>=60)
                    <h3>及格</h3>
                    @else
                    <h3>不及格</h3>
                    @endif
                <h2>unless(除非)的写法--@@unless($data['score']<60)及格@@endunless</h2>
                    @unless($data['score']<60)
                    <h3>除非小于60，否则就及格</h3>
                    @endunless
                <h2>for的写法--@@for($i=0;$i<=$data['num'];$i++)@{{$i }}@@endfor</h2>
                    @for($i=0;$i<=$data['num'];$i++)
                    {{$i }}
                    @endfor
                <h2>foreach的写法--@@foreach($data['article'] as $k=>$v)@{{$k}}=>@{{$v}}@@endforeach</h2>
                    @foreach($data['article'] as $k=>$v)
                    {{$k}}=>{{$v}}
                    @endforeach
                <h2>forelse的写法--@@forelse($data['news'] as $v)@{{$v}}@@empty没有数据@@endforelse</h2>
                    @forelse($data['news'] as $v)
                         {{$v}}
                    @empty
                         没有数据
                    @endforelse
                <h2>while的写法（基本不用）--@@while(true)@{{$title}}@@endwhile</h2>
                    @while(false)
                        {{$title}}
                    @endwhile
                <h2>-----多语句嵌套在此不详解，用法为相同------</h2>
            </div>
        </div>
    </body>
</html>
