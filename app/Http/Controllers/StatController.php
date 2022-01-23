<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class StatController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $count = $user->games->count();
        $victory_count_p1 = $user
            ->games()
            ->where('victory_p1', true)
            ->count();
        $victory_count_p2 = $user
            ->games()
            ->where('victory_p2', true)
            ->count();
        $army_stats_p1 = $user->games()
            ->select(['player1_army', DB::raw('count(*) as army_count'), 'player1_name'])
            ->groupBy('player1_army')
            ->orderBy(DB::raw('count(*)'), 'DESC')
            ->get();
        $army_stats_p2 = $user->games()
            ->select(['player2_army', DB::raw('count(*) as army_count'), 'player2_name'])
            ->groupBy('player2_army')
            ->orderBy(DB::raw('count(*)'), 'DESC')
            ->get();
        $army_wins_p1 = $user->games()
            ->select('player1_army', DB::raw('count(*) as army_wins_p1'), 'player1_name')
            ->where('victory_p1', '=', "1")
            ->groupBy('player1_army')
            ->get();
        $army_wins_p2 = $user->games()
            ->select('player2_army', DB::raw('count(*) as army_wins_p2'), 'player2_name')
            ->where('victory_p2', '=', "1")
            ->groupBy('player2_army')
            ->get();
        $scenario_stats =$user->games()
            ->select('scenario', DB::raw('count(*) as scenario_stats'), 'scenario')
            ->groupBy('scenario')
            ->orderBy(DB::raw('count(*)'), 'DESC')
            ->get();
        $date_stats =$user->games()
            ->select('created_at', DB::raw('count(*) as date_count'), 'created_at')
            ->whereYear('created_at', 2021)
            ->get();
        $faction_stats_p1 = $user->games()
            ->select(['player1_faction', DB::raw('count(*) as faction_count'), 'player1_name'])
            ->groupBy('player1_faction')
            ->orderBy(DB::raw('count(*)'), 'DESC')
            ->get();
        $faction_stats_p2 = $user->games()
            ->select(['player2_faction', DB::raw('count(*) as faction_count'), 'player2_name'])
            ->groupBy('player2_faction')
            ->orderBy(DB::raw('count(*)'), 'DESC')
            ->get();
        $faction_wins_p1 = $user->games()
            ->select('player1_faction', DB::raw('count(*) as faction_wins_p1'), 'player1_name')
            ->where('victory_p1', '=', "1")
            ->groupBy('player1_faction')
            ->get();
        $faction_wins_p2 = $user->games()
            ->select('player2_faction', DB::raw('count(*) as faction_wins_p2'), 'player2_name')
            ->where('victory_p2', '=', "1")
            ->groupBy('player2_faction')
            ->get();
        $faction_loses_p2 = $user->games()
            ->select('player2_faction', DB::raw('count(*) as faction_loses_p2'), 'player2_name')
            ->where('victory_p2', '=', "0")
            ->groupBy('player2_faction')
            ->get();
    
        return view('/40k.stats',[
            'games'=>auth()->user()->games(),
            'count'=>$count,
            'p1_stats'=>$army_stats_p1,
            'p2_stats'=>$army_stats_p2,
            'p1_faction'=>$faction_stats_p1,
            'p2_faction'=>$faction_stats_p2,
            'victory_count_p1'=>$victory_count_p1,
            'victory_count_p2'=>$victory_count_p2,
            'army_wins_p1'=>$army_wins_p1,
            'army_wins_p2'=>$army_wins_p2,
            'faction_wins_p1'=>$faction_wins_p1,
            'faction_wins_p2'=>$faction_wins_p2,
            'faction_loses_p2'=>$faction_loses_p2,
            'scenario_stats'=>$scenario_stats,
            'date_stats'=>$date_stats

            ]);
    }
}
