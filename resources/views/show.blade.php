@extends ('layouts.layout')

@section('content')

@if (session('message'))
<div class="text-green-500 mt-2">
    {{ session('message')}}
</div>
@endif
<div class="flex bg-gray-100">

    <div class="flex-1 text-gray-700 text-center bg-blue-200 px-4 py-2 m-2">
        <h1 class="font-bold">Game Id: {{ $game->id}}</h1>
        <br>
        Date : {{$game->created_at}}
        <br>
        Scenario: {{ $game->scenario}}
    </div>
    <div class="flex-1 text-gray-700 text-center bg-blue-200 px-4 py-2 m-2">
        Player 1 Name: {{ $game->player1_name}}
        <br>
        Player 1 Army: {{ $game->player1_army}}
        <br>
        Player 1 Primary Score: {{ $game->player1_primary}}
        <br>
        Player 1 Secondary Score: {{ $game->player1_secondary}}
        <br>
        Player 1 Score: {{ $game->player1_score}}
    </div>
    <div class="flex-1 text-gray-700 text-center bg-blue-200 px-4 py-2 m-2">
        Player 2 Name: {{ $game->player2_name}}
        <br>
        Player 2 Army: {{ $game->player2_army}}
        <br>
        Player 2 Primary Score: {{ $game->player2_primary}}
        <br>
        Player 2 Secondary Score: {{ $game->player2_secondary}}
        <br>
        Player 2 Score: {{ $game->player2_score}}
    </div>
</div>
    <div class="flex-1 text-gray-700 text-center bg-blue-200 px-4 py-2 m-2">
        Description: {{ $game->description}}
    </div>
<div class="py-4">
    <a href="{{route('archive')}}" class="flex-1 px-4 py-2 m-2 font-bold text-white bg-blue-500 rounded-full mr-l hover:bg-blue-700">
        Return to Archive
    </a>
    <a href="{{route('edit', ['game' => $game])}}" class="flex-1 px-4 py-2 m-2 font-bold text-white bg-blue-500 rounded-full mr-l hover:bg-blue-700">
        Edit Game
    </a>
</div>


@endsection
