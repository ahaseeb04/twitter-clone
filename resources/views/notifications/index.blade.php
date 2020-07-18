@extends ('layouts.app')

@section('title')Notifications - @endsection

@section ('content')
    <div class="flex justify-center min-h-screen">
        <div class="md:w-4/12 hidden md:block">
            <div class="p-4">
                Lorem, ipsum.
            </div>
        </div>

        <div class="w-full md:w-8/12 border border-gray-800 border-t-0 border-b-0">
            <app-notifications />
        </div>
    </div>
@endsection
