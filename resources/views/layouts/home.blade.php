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
<div class="header">页面头部</div>
<!--------注意：此处页面的写法---------->
@section('content')
    <p>公共部份的section里面内容，想在子页面中显示需要使用parent</p>
    @show
<div class="footer">页面底部</div>
</body>
</html>