<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Portfolio') }}</title>

        <!-- Fonts -->
        @vite('resources/css/app.css')
    </head>
    <body class="dark:bg-gray-900">
        @include('includes._navigation')
        @yield('content')
    </body>
</html>
