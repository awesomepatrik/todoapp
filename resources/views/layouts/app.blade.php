<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Todo App</title>

    @livewireStyles
</head>
<body>

    @if(auth()->check())
        @livewire('navbar')
    @endif
    <div class="bg-gray-200 text-gray-800 flex items-center justify-center h-screen">
        @yield('content')
    </div>


    @livewireScripts
</body>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</html>
