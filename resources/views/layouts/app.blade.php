<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include ('layouts.partials._head')
    </head>
    <body class="antialiased bg-gray-900 text-gray-300">
        <div id="app">
            <div class="max-w-4xl mx-auto">
                @yield('content')

                <modals-container /> 
            </div>
        </div>

        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
