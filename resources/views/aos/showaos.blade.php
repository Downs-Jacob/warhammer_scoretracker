@extends('layouts.layout')
@section('content')

@if (session('message'))
    <div class="mt-2 text-green-500">{{ session('message') }}</div>
@endif

<div class="lg:flex ml-2 mr-2 mt-4 bg-yellow-200 py-2 px-4">
    <div class="flex-1 px-4 py-2 m-2 text-center text-gray-700 bg-yellow-100 rounded-xl">
        <h1 class="font-bold">Game Id: {{ $aos->id }}</h1>
        Date: {{ $aos->created_at }}<br>
        Scenario: {{ $aos->scenario }}<br>
        Point Total: {{ $aos->pointlimit }}<br>
        <div class="font-bold text-green-700">
            @if ($aos->player1_score > $aos->player2_score)
                Player 1 Major Victory
            @elseif ($aos->player1_score === $aos->player2_score)
                The Game was a Tie
            @else
                Player 2 Major Victory
            @endif
        </div>
    </div>
    <div class="flex-1 px-4 py-2 m-2 text-center text-gray-700 bg-yellow-100 rounded-xl">
        Player 1 Name: {{ $aos->player1_name }}<br>
        Player 1 Faction: {{ $aos->player1_faction }}<br>
        Player 1 Total Score: {{ $aos->player1_score }}
    </div>
    <div class="flex-1 px-4 py-2 m-2 text-center text-gray-700 bg-yellow-100 rounded-xl">
        Player 2 Name: {{ $aos->player2_name }}<br>
        Player 2 Faction: {{ $aos->player2_faction }}<br>
        Player 2 Total Score: {{ $aos->player2_score }}
    </div>
</div>

<div class="ml-2 mr-2 flex px-4 pb-2 bg-yellow-200 shadow-xl">
    <div class="flex-1 px-4 py-2 m-2 text-center text-gray-700 bg-yellow-100 rounded-xl">
        Description: {{ $aos->aosdescription }}
    </div>
</div>

<!-- MODAL -->
<div class="mt-6 flex" x-data="{ open: false }" x-show="true">
    <a href="{{ route('indexaos') }}" class="text-center flex-1 shadow-xl px-4 py-2 m-2 font-bold text-white bg-blue-500 rounded-full mr-l hover:bg-blue-700">
        Return to Archive
    </a>
    <a href="{{ route('editaos', ['aos' => $aos]) }}" class="text-center flex-1 shadow-xl px-4 py-2 m-2 font-bold text-white bg-blue-500 rounded-full mr-l hover:bg-blue-700">
        Edit This Game
    </a>
    <button class="text-center flex-1 shadow-xl px-4 py-2 m-2 font-bold text-white bg-blue-500 rounded-full mr-l hover:bg-blue-700" @click="open = true">
        Delete Game
    </button>
</div>


    <!-- Dialog (full screen) -->

<div
    class="absolute top-0 left-0 flex items-center justify-center w-full h-full"
    style="background-color: rgba(0,0,0,.5);"
    x-show="open">
    <div
        class="h-auto p-4 mx-2 text-center bg-white rounded shadow-xl md:max-w-xl md:p-6 lg:p-8 md:mx-0"
        @click.away="open = false">
        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
            <h3 class="text-lg text-center font-medium leading-6 text-gray-900"> Game Removal </h3>
            <div class="mt-2">
                <p class="text-center text-sm leading-5 text-gray-500"> By clicking 'Confirm Removal' you will remove this record permanently </p>
                <p class="text-center text-sm leading-5 text-gray-500"> Are you sure you want to continue? </p>
            </div>
        </div>
        <div class="mt-5 sm:mt-6">
            <span class="flex w-full rounded-md shadow-sm">
                <button @click="open = false"
                    class="shadow-xl flex-1 px-3 py-2 m-2 font-bold text-white bg-blue-500 rounded-full mr-l hover:bg-blue-700">
                    Return
                </button>
                <button
                    class="shadow-xl flex-1 px-4 py-2 m-2 font-bold text-white bg-red-500 rounded-full mr-l hover:bg-red-700"
                    onclick ="window.location='{{route('removeaos', ['aos' => $aos])}}'">
                    &#9888; Confirm Removal
                </button>
            </span>
        </div>
    </div>
</div>

@endsection
