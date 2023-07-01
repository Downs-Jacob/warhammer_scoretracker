<?php

namespace App\Http\Controllers;

use App\Models\ten;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;


class TenEdController extends Controller
{
    use HasFactory, Notifiable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index10e()
    {
        return view('40k10e.index10e', [
            'tengames' => auth()->user()->ten
        ]);
    }

    public function create10e()
    {
        return view('40k10e.10e_score_card');
    }

    public function store10e()
    {
        request()->validate([
            'scenario' => 'required',
            'deployment' => 'required',
            'rule' => 'required',
            'player1_faction' => 'required',
            'player2_faction' => 'required',

        ]);

        $ten = new Ten();

        $ten->user_id = auth()->id();
        $ten->scenario = request('scenario');
        $ten->deployment = request('deployment');
        $ten->rule = request('rule');
        $ten->pointlimit = request('pointlimit');
        $ten->description10e = request('description');

        $ten->player1_name = request('player1_name');
        $ten->player1_faction = request('player1_faction');
        $ten->player1_score = request('player1_score');

        $ten->player2_name = request('player2_name');
        $ten->player2_faction = request('player2_faction');
        $ten->player2_score = request('player2_score');

        if ($ten->player1_score > $ten->player2_score) {
            $ten->victory_p1 = true;
            $ten->victory_p2 = false;
        } elseif ($ten->player1_score === $ten->player2_score) {
            $ten->victory_p1 = false;
            $ten->victory_p2 = false;
        } else {
            $ten->victory_p2 = true;
            $ten->victory_p1 = false;
        }

        $ten->save();
        return redirect('/create10e');
    }
    public function show10e($id)
    {
        $ten = Ten::find($id);
        return view('40k10e.show10e', ['ten' => $ten]);
    }

    public function edit10e($id)
    {
        $ten = Ten::find($id);
        return view('40k10e.edit10e', ['ten' => $ten]);
    }

    public function update10e($id) 
    {
        $ten = Ten::find($id);

        $ten->scenario = request('scenario');
        $ten->deployment = request('deployment');
        $ten->rule = request('rule');
        $ten->pointlimit = request('pointlimit');
        $ten->description10e = request('description10e');

        $ten->player1_name = request('player1_name');
        $ten->player1_faction = request('player1_faction');
        $ten->player1_score = request('player1_score');

        $ten->player2_name = request('player2_name');
        $ten->player2_faction = request('player2_faction');
        $ten->player2_score = request('player2_score');

        $ten->description10e = request('description');

        if ($ten->player1_score > $ten->player2_score) {
            $ten->victory_p1 = true;
            $ten->victory_p2 = false;
        } elseif ($ten->player1_score === $ten->player2_score) {
            $ten->victory_p1 = false;
            $ten->victory_p2 = false;
        } else {
            $ten->victory_p2 = true;
            $ten->victory_p1 = false;
        }

        $ten->save();
        return redirect('/ten/'.$ten->id)->with('message', 'Game Updated');
    }

    public function destroy10e($id)
    {
        $ten = Ten::find($id);
        $ten->delete();
        return view('40k10e.index10e', ['games10e' => auth()->user()->ten]);
    }

    public function stats10e()
    {
        $user = auth()->user();
        $count = $user->ten->count();
        $victory_count_p1 = $user
            ->ten()
            ->where('victory_p1', true)
            ->count();
        $victory_count_p2 = $user
            ->ten()
            ->where('victory_p2', true)
            ->count();
        $scenario_stats = $user->ten()
            ->select('scenario', DB::raw('count(*) as scenario_stats'), 'scenario')
            ->groupBy('scenario')
            ->orderBy(DB::raw('count(*)'), 'DESC')
            ->get();
        $current_year = date('Y');
        $date_stats = $user->ten()
            ->select(DB::raw('YEAR(created_at) as year'), DB::raw('count(*) as date_count'))
            ->whereYear('created_at', '<=', $current_year)
            ->groupBy('year')
            ->orderBy('year', 'ASC')
            ->get();
        $faction_stats_p1 = $user->ten()
            ->select(['player1_faction', DB::raw('count(*) as faction_count'), 'player1_name'])
            ->groupBy('player1_faction')
            ->orderBy(DB::raw('count(*)'), 'DESC')
            ->get();
        $faction_stats_p2 = $user->ten()
            ->select(['player2_faction', DB::raw('count(*) as faction_count'), 'player2_name'])
            ->groupBy('player2_faction')
            ->orderBy(DB::raw('count(*)'), 'DESC')
            ->get();
        $faction_wins_p1 = $user->ten()
            ->select('player1_faction', DB::raw('count(*) as faction_wins_p1'), 'player1_name')
            ->where('victory_p1', '=', "1")
            ->groupBy('player1_faction')
            ->get();
        $faction_wins_p2 = $user->ten()
            ->select('player2_faction', DB::raw('count(*) as faction_wins_p2'), 'player2_name')
            ->where('victory_p2', '=', "1")
            ->groupBy('player2_faction')
            ->get();
        $faction_loses_p2 = $user->ten()
            ->select('player2_faction', DB::raw('count(*) as faction_loses_p2'), 'player2_name')
            ->where('victory_p2', '=', "0")
            ->groupBy('player2_faction')
            ->get();

        return view('40k10e.statistics10e' , [
            'ten'=>auth()->user()->ten(),
            'count'=>$count,
            'victory_count_p1'=>$victory_count_p1,
            'victory_count_p2'=>$victory_count_p2,
            'scenario_stats'=>$scenario_stats,
            'date_stats'=>$date_stats,
            'player1_faction'=>$faction_stats_p1,
            'player2_faction'=>$faction_stats_p2,
            'faction_wins_p1'=>$faction_wins_p1,
            'faction_wins_p2'=>$faction_wins_p2,
            'faction_loses_p2'=>$faction_loses_p2,
        ]
        );
    }

    public function showrules()
    {
        return view('40k10e.specialrules');
    }
}