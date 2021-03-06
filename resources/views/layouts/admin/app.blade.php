<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>@yield('title', 'Page Title')</title>
</head>
<body class="w-full overflow-x-hidden bg-gray-50">

    @include('components.admin.nav')

    @yield('content')

</body>
<script src="{{ mix('js/app.js') }}"/>
</html>
