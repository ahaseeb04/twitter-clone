@extends ('layouts.app')

@section('title')Sign in - @endsection

@section ('content')
    <div class="w-full lg:w-6/12 px-6 lg:px-0 mx-auto h-screen flex flex-col justify-center">
        <h1 class="text-center text-2xl font-semibold my-5 text-white">Sign in</h1>

        <form action="{{ route('login') }}" method="POST" class="p-5 w-full rounded-sm bg-gray-800">
            @csrf

            <div class="space-y-5">
                <div>
                    <input type="text" name="email" id="email" placeholder="Email address" class="form-input w-full rounded bg-gray-900 border-0">
                
                    @if ($errors->has('email'))
                        <span class="mt-2 block text-xs font-medium text-red-500">
                            {{ $errors->first('email') }}
                        </span>
                    @endif
                </div>
                <div>
                    <input type="password" name="password" id="password" placeholder="Password" class="form-input w-full rounded bg-gray-900 border-0">
                
                    @if ($errors->has('password'))
                        <span class="mt-2 block text-xs font-medium text-red-500">
                            {{ $errors->first('password') }}
                        </span>
                    @endif
                </div>
                <div>
                    <button type="submit" class="w-full py-2 text-sm font-medium leading-normal text-center rounded bg-blue-500 text-white focus:outline-none focus:shadow-outline-blue hover:bg-blue-600 transition-colors ease-in duration-75">
                        Sign in
                    </button>
                </div>
            </div>
        </form>

        <a href="{{ route('register') }}" class="mt-5 text-sm text-center text-blue-500">Create a new account</a>
    </div>
@endsection
