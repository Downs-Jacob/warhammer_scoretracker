@extends ('layouts\layout')

@section('content')

<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<div class="title">
                <h2>Game Id: {{ $game->id}}</h2>
                    Date : {{$game->created_at}}
                    <br>
                    Scenario: {{ $game->scenario}}
                    <br>
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
        </div>
    </div>
</div>
    <div class="py-4">
        <a href="{{route('archive')}}" class="flex-1 px-4 py-2 font-bold text-white bg-blue-500 rounded-full mr-l hover:bg-blue-700">
            Return to Archive
        </a>
    </div>


@endsection
