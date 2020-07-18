@extends('layouts.app')

@section('title')Create an account - @endsection

@section('content')
    <div class="w-full lg:w-6/12 px-6 lg:px-0 mx-auto h-screen flex flex-col justify-center">
        <h1 class="text-center text-2xl font-semibold my-5 text-white">Sign up</h1>

        <form action="{{ route('register') }}" method="POST" class="p-5 w-full rounded-sm bg-gray-800">
            @csrf

            <div class="space-y-5">
                <div>
                    <input type="text" name="name" id="name" placeholder="Name" value="{{ old('name') }}" class="form-input w-full rounded bg-gray-900 border-0">

                    @if ($errors->has('name'))
                        <span class="mt-2 block text-xs font-medium text-red-500">
                            {{ $errors->first('name') }}
                        </span>
                    @endif
                </div>
                <div>
                    <div class="flex items-center justify-center">
                        <div class="bg-gray-900 rounded-l border-r border-gray-800 w-10 h-10 flex justify-center items-center">
                            <span class="text-gray-500 select-none">@</span>
                        </div>

                        <input type="text" name="username" id="username" placeholder="Username" value="{{ old('username') }}" class="form-input w-full rounded bg-gray-900 border-0 rounded-l-none">
                    </div>
                
                    @if ($errors->has('username'))
                        <span class="mt-2 block text-xs font-medium text-red-500">
                            {{ $errors->first('username') }}
                        </span>
                    @endif
                </div>
                <div>
                    <input type="text" name="email" id="email" placeholder="Email address" value="{{ old('email') }}" class="form-input w-full rounded bg-gray-900 border-0">
                
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
                        Sign up
                    </button>
                </div>
            </div>
        </form>

        <a href="{{ route('login') }}" class="mt-5 text-sm text-center text-blue-500">Sign in instead</a>
    </div>
@endsection
