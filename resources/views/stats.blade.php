@extends ('layouts.layout')

@section('content')

<div class="flex-1 px-4 py-2 m-2 text-center text-gray-700 bg-blue-200">
    Your Statistics:
        <h1 class="font-extrabold"> Number of Games Played: {{$count}}</h1>
        <h1 class="font-bold"> Number of Games Won:  {{$victory_count_p1}}</h1>
        <h1 class="font-bold"> Percent Victory:  {{round($victory_count_p1/$count * 100, 2)}}%</h1>
            @foreach($p1_stats as $p1_stats)
                <div class="flex-1 px-4 py-2 m-2 text-center text-gray-700 bg-blue-100">Games played as {{$p1_stats->player1_army}} : {{$p1_stats->army_count}}</div>
            @endforeach
</div>
<br>
<div class="flex-1 px-4 py-2 m-2 text-center text-gray-700 bg-blue-200">
    Opponent Statistics:

        <h1 class="font-bold"> Number of Games Won:  {{$victory_count_p2}}</h1>
        <h1 class="font-bold"> Percent Victory:  {{round($victory_count_p2/$count * 100,2)}}%</h1>
            @foreach($p2_stats as $p2_stats)
                <div class="flex-1 px-4 py-2 m-2 text-center text-gray-700 bg-blue-100">Games played as {{$p2_stats->player2_army}} : {{$p2_stats->army_count}}</div>
            @endforeach
</div>

@endsection
