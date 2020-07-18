<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include ('layouts.partials._head')
    </head>
    <body class="bg-gray-900">
        <div class="relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6">
                <div class="flex justify-between items-center py-6 md:justify-start md:space-x-10">
                    <div class="lg:w-0 lg:flex-1">
                        <a href="#" class="flex focus:outline-none">
                            <svg 
                                class="h-12 text-blue-500 fill-current" 
                                xmlns="http://www.w3.org/2000/svg" 
                                viewBox="0 0 400 400"
                            >
                                <path 
                                    d="M153.62 301.59c94.34 0 145.94-78.16 145.94-145.94 0-2.22 0-4.43-.15-6.63A104.36 104.36 0 00325 122.47a102.38 102.38 0 01-29.46 8.07 51.47 51.47 0 0022.55-28.37 102.79 102.79 0 01-32.57 12.45 51.34 51.34 0 00-87.41 46.78A145.62 145.62 0 0192.4 107.81a51.33 51.33 0 0015.88 68.47A50.91 50.91 0 0185 169.86v.65a51.31 51.31 0 0041.15 50.28 51.21 51.21 0 01-23.16.88 51.35 51.35 0 0047.92 35.62 102.92 102.92 0 01-63.7 22 104.41 104.41 0 01-12.21-.74 145.21 145.21 0 0078.62 23" 
                                />
                            </svg>
                        </a>
                    </div>

                    <div class="md:flex items-center justify-end space-x-8 md:flex-1 lg:w-0">
                        <a href="{{ route('login') }}" class="whitespace-no-wrap text-base leading-6 font-medium text-white hover:text-gray-200 focus:outline-none focus:text-gray-400">
                            Sign in
                        </a>

                        <span class="inline-flex rounded-md shadow-sm">
                            <a href="{{ route('register') }}" class="whitespace-no-wrap inline-flex items-center justify-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700 transition ease-in-out duration-150">
                                Sign up
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>