<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/gilroy-ultralight.css">
    <title>@yield('title')</title>
</head>

<body>
    <div class="all_wrap">
        @include('includes.header')

        @yield('content')

        @include('includes.footer')
    </div>
</body>

</html>
