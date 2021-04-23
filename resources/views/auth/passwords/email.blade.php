@extends('layouts.layout')

@section('content')
<div class="container pt-12 flex justify-center mx-auto">
    <div class="px-12 py-8 bg-gray-200 border border-gray-300 shadow-xl rounded-xl">
        <div class="col-md-8">
            <div class="mb-4 text-lg font-bold">{{ __('Reset Password') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label class="block mb-2 text-xs font-bold text-gray-700 uppercase" for="email">{{ __('E-Mail Address') }}</label>

                            <div class="mx-auto col-md-6">
                                <input class="w-full p-2 border border-gray-400" type="text" name="email" id="email"
                                autocomplete="email" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="mb-0 ml-4 form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="px-4 py-2 mt-4 mr-2 text-white bg-blue-400 rounded hover:bg-blue-500">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    @error('email')
                    <span class="mx-12 text-red-500" role="alert">
                        <strong>No Account Found</strong>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

@enderror
@endsection
