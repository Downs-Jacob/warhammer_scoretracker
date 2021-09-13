@extends ('layouts.layout')

@section('content')
    @if ($errors->any())
        <p class="text-center mt-2 text-xs text-red-500"> {{ "Please make sure that the Scenario, Point Limit, and Player Faction Names, and Player Names have all been added" }}</p>
    @endif

    <form action="/createaos" novalidate METHOD="POST" id="formid">
            {{csrf_field()}}

            @include('aos._aos_scenario_select')
        
            @if (auth()->check())
                @include('aos._aos_description')
            @endif

            @include('aos._aos_player_layout',[
                'player' => 'player1',
                'player_faction'=>'player1_faction',
                'player_name'=>'player1_name',
                'player_grandstrat'=>'player1_grandstrat',
                'player_score'=>'player1_score'
                ])

            @include('aos._aos_player_layout',[
                'player' => 'player2',
                'player_faction'=>'player2_faction',
                'player_name'=>'player2_name',
                'player_grandstrat'=>'player2_grandstrat',
                'player_score'=>'player2_score'
                ])
    </form>
</div>

</div>

@if (auth()->check())

    <div class=container>
        <div class="title">
            <div class="container flex items-center">
                <div class="flex items-center py-5 ml-8 mr-4">
                    <button type="submit" form="formid" value="Submit" class="flex-1 px-4 py-2 font-bold text-white bg-blue-500 rounded-full mr-l hover:bg-blue-700">
                    End This Game and Add to Archive
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection

