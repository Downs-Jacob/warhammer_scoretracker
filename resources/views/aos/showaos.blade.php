@extends('layouts.layout')

@section('content')
    @if (session('message'))
        <div class="mt-2 text-green-500">{{ session('message') }}</div>
    @endif

    <div class="grid grid-cols-1 gap-4 mt-4 lg:grid-cols-3">
        <div class="bg-yellow-200 py-2 px-4 rounded-xl">
            <h1 class="font-bold">Game Id: {{ $aos->id }}</h1>
            <p>Date: {{ $aos->created_at }}</p>
            <p>Scenario: {{ $aos->scenario }}</p>
            <p>Point Total: {{ $aos->pointlimit }}</p>
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

        <div class="bg-yellow-200 py-2 px-4 rounded-xl">
            <p>Player 1 Name: {{ $aos->player1_name }}</p>
            <p>Player 1 Faction: {{ $aos->player1_faction }}</p>
            <p>Player 1 Total Score: {{ $aos->player1_score }}</p>
        </div>

        <div class="bg-yellow-200 py-2 px-4 rounded-xl">
            <p>Player 2 Name: {{ $aos->player2_name }}</p>
            <p>Player 2 Faction: {{ $aos->player2_faction }}</p>
            <p>Player 2 Total Score: {{ $aos->player2_score }}</p>
        </div>

        <div class="bg-yellow-200 py-2 px-4 col-span-3 rounded-xl">
            <p>Description: {{ $aos->aosdescription }}</p>
        </div>
    </div>

    <div class="mt-6 flex justify-between">
        <a href="{{ route('indexaos') }}"
           class="shadow-xl px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700">
            Return to Archive
        </a>

        <a href="{{ route('editaos', ['aos' => $aos]) }}"
           class="shadow-xl px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700">
            Edit This Game
        </a>

        <button @click="open = true"
                class="shadow-xl px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700">
            Delete Game
        </button>
    </div>

    <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full"
         style="background-color: rgba(0,0,0,.5);"
         x-show="open">
        <div class="bg-white rounded shadow-xl p-6 md:p-8 lg:p-10" @click.away="open = false">
            <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4 text-center">Game Removal</h3>
            <p class="text-sm leading-5 text-gray-500 mb-4 text-center">
                By clicking 'Confirm Removal' you will remove this record permanently.
                Are you sure you want to continue?
            </p>
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
