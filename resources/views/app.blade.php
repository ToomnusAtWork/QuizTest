<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="content">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Siam Global Quiz</title>

        <script
            src="https://code.jquery.com/jquery-3.7.1.slim.js"
            integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc="
            crossorigin="anonymous"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        @vite('resources/css/app.css')
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-whiteselection:bg-red-500 selection:text-white">
            @yield('content')
        </div>
    </body>
</html>
