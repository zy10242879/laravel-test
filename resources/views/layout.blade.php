<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        .header{height:100px;background: lightcoral;}
        .middle{height:300px;background: lightgreen;}
        .footer{height:100px;background: lightblue;}
    </style>
</head>
<body>
@include('layouts.header',['page'=>'主页'])<!--注意：这里可以传参，清楚传参的写法-->
<div class="middle">页面中部</div>
@include('layouts.footer')
</body>
</html>