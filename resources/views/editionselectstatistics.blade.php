@extends('layouts.layout')

@section('content')
<head>
    <title>Archive Edition Selection</title>
</head>
<body>
    <div class="flex flex-col items-center h-screen">
        <div class="bg-gray-200 w-full px-4 py-8 mb-8">
            <p class="text-center text-xl sm:text-3xl font-extrabold">Choose the Edition Archive You Want to View </p>
        </div>
        <div class="flex flex-col sm:flex-row items-center py-16">
            <a href="{{ route('stats10e') }}">
                <div class="w-64 h-64 sm:w-96 sm:h-96 bg-slate-600 rounded-lg shadow-lg flex justify-center items-center mb-4 sm:mb-0 sm:mr-4 font-extrabold">
                    <h2 class="text-white text-lg sm:text-3xl">10th Edition</h2>
                </div>
            </a>
            <a href="{{ route('index') }}">
                <div class="w-64 h-64 sm:w-96 sm:h-96 bg-violet-500 rounded-lg shadow-lg flex justify-center items-center font-extrabold">
                    <h2 class="text-white text-lg sm:text-3xl">9th Edition</h2>
                </div>
            </a>
        </div>
    </div>
</body>

<div class="mt-20">
    @include('_footer')
</div>

@endsection
