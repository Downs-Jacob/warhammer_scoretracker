@extends ('layouts.layout')

@section('content')

<div class="container lg:flex justify-center mx-auto">
    <div class="flex-2 shadow-xl px-4 py-2 m-2 text-center text-gray-700 bg-yellow-200 border border-yellow-200 rounded-lg">
        <h3 class="font-extrabold text-2xl">Your Statistics:</h3>
            <h1 class="font-extrabold"> Number of Games Played: {{$count}}</h1>
            <h1 class="font-bold"> Number of Games Won:  {{$victory_count_p1}}</h1>
            @if ($count>0)
                <h1 class="font-bold"> Percent Victory:  {{round($victory_count_p1/$count * 100, 2)}}%</h1>
            @endif
                @foreach($player1_faction as $player1_faction)
                    <div class="flex-1 px-4 py-2 m-2 text-center text-gray-700 bg-yellow-100">Games played as {{$player1_faction->player1_faction}} : {{$player1_faction->faction_count}}</div>
                @endforeach
    </div>
    <div class="flex-2 shadow-xl px-4 py-2 m-2 text-center text-gray-700 bg-yellow-200  border border-yellow-200  rounded-lg">
        <h3 class="font-extrabold text-2xl">Opponent Statistics: </h3>
            <h1 class="font-extrabold"> Number of Games Played: {{$count}} </h1>
            <h1 class="font-bold"> Number of Games Won:  {{$victory_count_p2}}</h1>
            @if ($count>0)
                <h1 class="font-bold"> Percent Victory:  {{round($victory_count_p2/$count * 100,2)}}%</h1>
            @endif
                @foreach($player2_faction as $player2_faction)
                    <div class="flex-1 px-4 py-2 m-2 text-center text-gray-700 bg-yellow-100">Games played as {{$player2_faction->player2_faction}} : {{$player2_faction->faction_count}}</div>
                @endforeach
    </div>
</div>
<div class="container lg:flex justify-center mx-auto">
    <div class="flex-2 shadow-xl px-4 py-2 m-2 text-center text-gray-700 bg-yellow-200 border border-yellow-200 rounded-lg">
            <h1 class="font-extrabold"> Player 1 Army <br> Victory Breakdown</h1>
                    @foreach($faction_wins_p1 as $faction_wins_p1)
                        <div class="flex-1 px-4 py-2 m-2 text-center text-gray-700 bg-yellow-100">{{$faction_wins_p1->player1_faction}} : {{$faction_wins_p1->faction_wins_p1}}</div>
                    @endforeach
    </div>
    <div class="flex-2 shadow-xl px-4 py-2 m-2 text-center text-gray-700 bg-yellow-200 border border-yellow-200 rounded-lg">
        <h1 class="font-extrabold"> Player 2 Army <br> Victory Breakdown</h1>


            @foreach($faction_wins_p2 as $faction_wins_p2)
                <div class="flex-1 px-4 py-2 m-2 text-center text-gray-700 bg-yellow-100">{{$faction_wins_p2->player2_faction}} : {{$faction_wins_p2->faction_wins_p2}}</div>  
            @endforeach

    </div>
    <div class="flex-2 shadow-xl px-4 py-2 m-2 text-center text-gray-700 bg-yellow-200 border border-yellow-200 rounded-lg">
        <h1 class="font-extrabold">Scenario <br> Breakdown</h1>
                @foreach($scenario_stats as $scenario_stats)
                    <div class="flex-1 px-4 py-2 m-2 text-center text-gray-700 bg-yellow-100">{{$scenario_stats->scenario}} : {{$scenario_stats->scenario_stats}}</div>
                @endforeach
                
    </div>
    <div class="flex-2 shadow-xl px-4 py-2 m-2 text-center text-gray-700 bg-yellow-200 border border-yellow-200 rounded-lg">
        <h1 class="font-extrabold">Yearly Breakdown</h1>
                @foreach($date_stats as $date_stats)
                    <div class="flex-1 px-4 py-2 m-2 text-center text-gray-700 bg-yellow-100">Games played in 2023 : {{$date_stats->date_count}}</div>
                @endforeach
    </div>

</div>

@endsection