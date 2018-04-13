<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {width:100%;height:100%;overflow:hidden;margin:0;padding:0;font-family:'Raleway',sans-serif;font-size:16px}
        body {background:url('/404.png') top right no-repeat #fff}
        .title {font-size:36px;padding:20px;}
        .content {width:100%;text-align:center;position:absolute;bottom:10%;left:0;}
        .content a {display:inline-block;text-decoration:none;font-size:14px;color:#2225e4;}
        .content a:hover {color:#d02c2a;}
        @media only screen and (max-width: 460px), screen and (max-height: 700px) {
            .content {position:static;}
            .content a {display:block;width:100%;height:100%;position:absolute;top:0;left:0;font-size:0;opacity:0;}
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title">@yield('message')</div>
        <a href="/">{{__('messages.pokes')}}</a>
    </div>
</div>
</body>
</html>