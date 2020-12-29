@extends ('layouts.layout')

@section('content')

    <div>Number of Games Played: {{$count}}</div>
        @foreach ($games as $game)
            @if($game->player1_army === 'Necon')
                1
            @endif
        @endforeach
        @foreach ($games as $game)
            <div>{{$game->player1_army}}</div>
        @endforeach

@endsection
