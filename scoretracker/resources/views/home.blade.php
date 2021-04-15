@extends('layouts.layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


                <div class="px-12 py-8 bg-gray-200 border border-gray-300 shadow-xl rounded-xl text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are already logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
