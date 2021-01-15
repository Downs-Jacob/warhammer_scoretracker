@extends ('layouts.layout')

@section('content')

@if (session('message'))
<div class="mt-2 text-green-500">
    {{ session('message')}}
</div>
@endif
<div class="flex bg-gray-100 py-2 px-4">

    <div class="flex-1 px-4 py-2 m-2 text-center text-gray-700 bg-white">
        <h1 class="font-bold">Game Id: {{ $game->id}}</h1>
        Date : {{$game->created_at}}
        <br>
        Scenario: {{ $game->scenario}}
        <br>

        @if ($game->player1_primary + $game->player1_secondary > $game->player2_primary + $game->player2_secondary)
            Player 1 Victory
        @elseif ($game->player1_primary + $game->player1_secondary === $game->player2_primary + $game->player2_secondary)
            The Game was a Tie
        @else
            Player 2 Victory
        @endif

    </div>
    <div class="flex-1 px-4 py-2 m-2 text-center text-gray-700 bg-white">
        Player 1 Name: {{ $game->player1_name}}
        <br>
        Player 1 Army: {{ $game->player1_army}}
        <br>
        Player 1 Primary Score: {{ $game->player1_primary}}
        <br>
        Player 1 Secondary Score: {{ $game->player1_secondary}}
        <br>
        Player 1 Total Score: {{ $game->player1_primary + $game->player1_secondary }}
    </div>
    <div class="flex-1 px-4 py-2 m-2 text-center text-gray-700 bg-white">
        Player 2 Name: {{ $game->player2_name}}
        <br>
        Player 2 Army: {{ $game->player2_army}}
        <br>
        Player 2 Primary Score: {{ $game->player2_primary}}
        <br>
        Player 2 Secondary Score: {{ $game->player2_secondary}}
        <br>
        Player 2 Total Score: {{ $game->player2_primary + $game->player2_secondary }}
    </div>
</div>
<div class="flex px-4 pb-2 bg-gray-100">
    <div class="flex-1 px-4 py-2 m-2 text-center text-gray-700 bg-white">
        Description: {{ $game->description}}
    </div>
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
