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
        $army_stats = Game::query()
            ->select(['player1_army', DB::raw('count(*) as army_count')])
            ->groupBy('player1_army')
            ->orderBy(DB::raw('count(*)'), 'DESC')->get();

        dd($army_stats->toArray());
        return view('/stats',['games'=>$games, 'count'=>$count, 'army_stats'=>$army_stats]);
    }

#laravel collections
}
