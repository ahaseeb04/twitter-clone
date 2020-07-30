@extends ('layouts.app')

@section ('content')
    <div class="flex justify-center min-h-screen">
        <div class="md:w-4/12 hidden md:block">
            <div class="p-4">
                Lorem, ipsum.
            </div>
        </div>

        <div class="w-full md:w-8/12 md:border md:border-gray-800 md:border-t-0 md:border-b-0">
            @yield ('main')
        </div>
    </div>
@endsection
