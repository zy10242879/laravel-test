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
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">载入视图成功！</div>
                <!-- 注意注释方法，容易出现错误
                传参方式：一　二　种可用写法
                <div class="title"><?//=$name;?>！</div>
                <div class="title"><?//=$age;?>！</div>
                传参方式：三　的写法-->
                <div class="title"><?=$data['name'];?></div>
                <div class="title"><?=$data['age'];?></div>
                <div class="title"><?=$title;?></div>
            </div>
        </div>
    </body>
</html>
