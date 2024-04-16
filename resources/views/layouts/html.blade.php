<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('tittle')</title>
    <link rel="icon" href="{{ asset('img/selloLiga.ico') }}" type="image/x-icon">
    @yield('imports')
    <style>
        body::-webkit-scrollbar{
            width: 0;
        }
    </style>
</head>

<body class="hidden">
    @yield('content')
</body>

</html>
