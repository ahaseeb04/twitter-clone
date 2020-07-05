<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }}</title>
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script>window.User = {!! json_encode(optional(auth()->user())->only('id', 'name', 'username', 'avatar')) !!}</script>
    </head>
    <body class="antialiased overflow-y-scroll bg-gray-900 text-gray-300">
        <div id="app">
            <div class="max-w-4xl mx-auto">
                @yield('content')

                <modals-container /> 
            </div>
        </div>

        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
