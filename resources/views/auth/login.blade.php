@extends('layouts.layout')
    @section('content')
        <div class="container flex justify-center mx-auto">
            <div class="px-12 py-8 bg-gray-300 border border-gray-300 rounded-xl">
                <div class="col-md-8">

                    <div class="mb-4 text-lg font-bold">{{ __('Login') }}</div>


                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class='mb-6'>
                            <label class="block mb-2 text-xs font-bold uppercase text-gray-700" for="email">
                                Email
                            </label>
                            <input class="w-full p-2 border border-gray-400" type="text" name="email" id="email"
                                autocomplete="email" value="{{ old('email') }}" required>

                            @error('email')
                                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class='mb-6'>
                            <label class="block mb-2 text-xs font-bold uppercase text-grey-700" for="password">
                                Password
                            </label>
                            <input class="w-full p-2 border border-gray-400" type="password" name="password" id="password"
                                autocomplete="current-password" required>

                            @error('password')
                                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class='mb-6'>
                            <div>
                                <input class="mr-1" type="checkbox" name="remember" id="remember" {{old('remember') ? 'checked' : ''}}>
                                <label class='text-xs font-bold text-gray-700 uppercase' for="remember"> Remember Me </label>
                            </div>


                            @error('remember')
                                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" class="px-4 py-2 mr-2 text-white bg-blue-400 rounded hover:bg-blue-500">
                                Submit
                            </button>

                            <a href="{{ route('password.request') }}"> Forgot Your Password </a>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    @endsection
