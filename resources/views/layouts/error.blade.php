<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="57x57" href="/fav/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/fav/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/fav/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/fav/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/fav/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/fav/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/fav/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/fav/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/fav/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/fav/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="144x144"  href="/fav/android-icon-144x144.png">
    <link rel="icon" type="image/png" sizes="36x36"  href="/fav/android-icon-36x36.png">
    <link rel="icon" type="image/png" sizes="48x48"  href="/fav/android-icon-48x48.png">
    <link rel="icon" type="image/png" sizes="72x72"  href="/fav/android-icon-72x72.png">
    <link rel="icon" type="image/png" sizes="96x96"  href="/fav/android-icon-96x96.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/fav/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/fav/favicon-16x16.png">
    <link rel="icon" type="image/vnd.microsoft.icon" sizes="32x32" href="/fav/favicon-32x32.png">
    <link rel="icon" type="image/vnd.microsoft.icon" sizes="48x48" href="/fav/android-icon-48x48.png">
    <link rel="icon" sizes="128x128" href="/fav/favicon.png.icns">
    <link rel="shortcut icon" href="/fav/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/fav/favicon.ico" type="image/x-icon">
    <link rel="manifest" href="/fav/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/fav/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

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

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter48503996 = new Ya.Metrika({
                        id:48503996,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true
                    });
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/48503996" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title">@yield('message')</div>
        <a href="/">{{__('messages.pokes')}}</a>
    </div>
</div>

    <!— Begin of Chaport Live Chat code —>
    <script type="text/javascript">
        (function(w,d,v2){
            w.chaport = { app_id : '5ad7113bd8419725663a6233' };

            v2=w.chaport;v2._q=[];v2._l={};v2.q=function(){v2._q.push(arguments)};v2.on=function(e,fn){if(!v2._l[e])v2._l[e]=[];v2._l[e].push(fn)};var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://app.chaport.com/javascripts/insert.js';var ss=d.getElementsByTagName('script')[0];ss.parentNode.insertBefore(s,ss)})(window, document);
    </script>
    <!— End of Chaport Live Chat code —>

</body>
</html>