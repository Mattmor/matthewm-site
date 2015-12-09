<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>{{ $pagetitle }}</title>
        <link rel="stylesheet" href="/css/bootstrap.min.css" media="screen" charset="utf-8">
        <link rel="stylesheet" href="{{ elixir('css/app.css') }}" media="screen" charset="utf-8">
        <link rel="shortcut icon" href="/img/logofav.ico">
        <link rel="icon" href="/img/logofav.ico">
    </head>
    <body>
        @yield('header')

        @yield('content')

        @yield('footer')
    </body>
    <script src="/js/custom.js" charset="utf-8"></script>
</html>
