<!DOCTYPE html>
<html>
<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <meta charset="UTF-8">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="application-name" content="Megatex">
    <meta name="apple-mobile-web-app-title" content="Megatex">
    <meta name="theme-color" content="#1C1C1C">
    <meta name="msapplication-navbutton-color" content="#1C1C1C">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="msapplication-starturl" content="/">

    <style>
        .cart-mini form, .user-block__wrap, .ul-2 {
            opacity: 0;
        }

        .burger-block__close, .burger-block__inner {
            opacity: 0;
            transform: translateX(-100%);
        }
    </style>

    <base href="/"/>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="apple-touch-icon" sizes="57x57" href="../images/fav/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../images/fav/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../images/fav/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../images/fav/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../images/fav/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../images/fav/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../images/fav/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../images/fav/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../images/fav/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../images/fav/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../images/fav/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/fav/favicon-16x16.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}"/>

</head>
<body class="user">
<div id="app">
    <router-view></router-view>
</div>

<script src="{{asset('js/app.js')}}"></script>

</body>
</html>
