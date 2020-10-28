@extends ('layouts\layout')

@section('content')
    <form>
        @include ('_scenario_select')
        <div>
            <textarea class="textarea" name="player1_name" id="player1_name">{{$game->player1_name}}</textarea>
            <textarea class="textarea" name="player1_army" id="player1_army">{{$game->player1_army}}</textarea>
            <textarea class="textarea" name="player1_primary" id="player1_primary">{{$game->player1_primary}}</textarea>
            <textarea class="textarea" name="player1_secondary" id="player1_secondary">{{$game->player1_secondary}}</textarea>
            <textarea class="textarea" name="player1_score" id="player1_score">{{$game->player1_score}}</textarea>
        </div>
        <div>
            <textarea class="textarea" name="player2_name" id="player2_name">{{$game->player2_name}}</textarea>
            <textarea class="textarea" name="player2_army" id="player2_army">{{$game->player2_army}}</textarea>
            <textarea class="textarea" name="player2_primary" id="player2_primary">{{$game->player2_primary}}</textarea>
            <textarea class="textarea" name="player2_secondary" id="player2_secondary">{{$game->player2_secondary}}</textarea>
            <textarea class="textarea" name="player2_score" id="player2_score">{{$game->player2_score}}</textarea>

        </div>
    </form>

@endsection
