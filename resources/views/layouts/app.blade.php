<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset(mix('_cdn/assets-admin/css/main.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('_cdn/assets-admin/css/iconfont.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('_cdn/assets-admin/css/material-icons/material-icons.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('_cdn/assets-admin/css/vuesax.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('_cdn/assets-admin/css/prism-tomorrow.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('_cdn/assets-admin/css/app.css')) }}">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('_cdn/assets-admin/images/logo/favicon.png') }}">
</head>
<body>
    <div id="app">
        Aguarde...
    </div>
    <!-- Scripts -->
    <script src="{{ asset('_cdn/assets-admin/js/app.js') }}" defer></script>
</body>
</html>
