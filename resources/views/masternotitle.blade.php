<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Matt Morgan</title>
        <link rel="stylesheet" href="/css/bootstrap.min.css" media="screen" charset="utf-8">
        <link rel="stylesheet" href="{{ elixir('css/app.css') }}" media="screen" charset="utf-8">
        <script src="/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
        <link rel="shortcut icon" href="/images/logofav.ico">
        <link rel="icon" href="/images/logofav.ico">
        @yield('headspace')
    </head>
    <body>
        @yield('header')

        @yield('content')

        @yield('footer')
    </body>
    <script src="/js/custom.js" charset="utf-8"></script>
</html>
