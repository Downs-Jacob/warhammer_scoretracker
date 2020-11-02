@extends ('layouts\layout')

@section('content')
<div>
<form action="/create" METHOD="POST" id="formid">
    @csrf
    @include('_scenario_select')
    @include('_player_layout',['player_army'=>'player1_army', 'player_name'=>'player1_name', 'player_primary'=>'player1_primary', 'player_secondary'=>'player1_secondary', 'player_score'=>'player1_score'])
    @include('_player_layout',['player_army'=>'player2_army', 'player_name'=>'player2_name', 'player_primary'=>'player2_primary', 'player_secondary'=>'player2_secondary', 'player_score'=>'player2_score'])

</form>

</div>
</div>
<div class=container>
    <div class="title">
        <div class="container flex items-center">
            <div class="flex items-center ml-8 mr-4 py-5">
                <button type="submit" form="formid" value="Submit" class="flex-1 px-4 py-2 font-bold text-white bg-blue-500 rounded-full mr-l hover:bg-blue-700">
                End This Game and Add to Archive
                </button>
            </div>
        </div>
    </div>

@endsection

