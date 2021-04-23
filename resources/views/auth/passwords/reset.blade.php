@extends('layouts.layout')

@section('content')
<div class="container pt-12 flex justify-center mx-auto">
    <div class="px-12 py-8 bg-gray-200 border border-gray-300 shadow-xl rounded-xl">
        <div class="col-md-8">
            <div class="block mb-2 text-xs font-bold uppercase text-gray-700">{{ __('Reset Password') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="pb-2 w-full p-2 border border-gray-400 @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="fpb-2 w-full p-2 border border-gray-400 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="pb-2 w-full p-2 border border-gray-400" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="mb-0 form-group row">
                            <div class="pt-4 ol-md-6 offset-md-4">
                                <button type="submit" class="px-4 py-2 mr-2 text-white bg-blue-400 rounded-xl hover:bg-blue-500">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
