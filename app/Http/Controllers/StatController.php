<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class StatController extends Controller
{
    public function index()
    {
        $games = Game::latest()->get();
        $count = Game::latest('id')->count();
        $victory_count_p1 = Game::where('victory_p1', true)->count();
        $victory_count_p2 = Game::where('victory_p2', true)->count();
        $army_stats_p1 = Game::query()
            ->select(['player1_army', DB::raw('count(*) as army_count'), 'player1_name'])
            ->groupBy('player1_army')
            ->orderBy(DB::raw('count(*)'), 'DESC')->get();
        $army_stats_p2 = Game::query()
            ->select(['player2_army', DB::raw('count(*) as army_count'), 'player2_name'])
            ->groupBy('player2_army')
            ->orderBy(DB::raw('count(*)'), 'DESC')->get();
        $army_wins_p1 = Game::query()
            ->select('player1_army', DB::raw('count(*) as army_wins_p1'), 'player1_name')
            ->where('victory_p1', '=', "1")
            ->groupBy('player1_army')
            ->get();
        $army_wins_p2 = Game::query()
            ->select('player2_army', DB::raw('count(*) as army_wins_p2'), 'player2_name')
            ->where('victory_p2', '=', "1")
            ->groupBy('player2_army')
            ->get();


        return view('/stats',[
            'games'=>$games,
            'count'=>$count,
            'p1_stats'=>$army_stats_p1,
            'p2_stats'=>$army_stats_p2,
            'victory_count_p1'=>$victory_count_p1,
            'victory_count_p2'=>$victory_count_p2,
            'army_wins_p1'=>$army_wins_p1,
            'army_wins_p2'=>$army_wins_p2,

            ]);
    }

#laravel collections
}
