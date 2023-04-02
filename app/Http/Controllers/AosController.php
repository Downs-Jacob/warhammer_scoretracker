<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\aos;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\QueryException;
use Illuminate\Notifications\Notifiable;

class AosController extends Controller
{
    use HasFactory, Notifiable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexaos()
    {
        //
        return view('aos.indexaos', [
            'aosgames'=> auth()->user()->aos]);
    }

    public function createaos()
    {
        $categories = [
            [   
                'name'=>'CORE RULEBOOK',
                'options'=> [
                    'Break Their Spirit',
                    'Broken Ranks',
                    'Conquer',
                    'Repel',
                    'Seize the Center',
                    'Slay the Warlord'
                    ]
            ]
        ];

        return view('aos.createaos', [
            'categories'=>$categories

        ]);
    }

    public function storeaos()
    {
        request()->validate([
            'scenario'=>'required',
            'pointlimit'=>'required',
            'player1_faction'=>'required',
            'player2_faction'=>'required',
            'player1_name'=>'required',
            'player2_name'=>'required'
        ]);

        $aos = new Aos();

        $aos->scenario = request('scenario');
        $aos->pointlimit = request('pointlimit');
        $aos->user_id = auth()->id();
        $aos->player1_name = request('player1_name');
        $aos->player1_faction = request('player1_faction');
        $aos->player1_grandstrat = request('player1_grandstrat');
        $aos->player1_score = request('player1_score');

        $aos->player2_name = request('player2_name');
        $aos->player2_faction = request('player2_faction');
        $aos->player2_grandstrat = request('player2_grandstrat');
        $aos->player2_score = request('player2_score');
        $aos->aosdescription = request('aosdescription');
        

        if($aos->player1_score > $aos->player2_score){
            $aos->victory_p1 = true;
            $aos->victory_p2 = false;
        } elseif($aos->player1_score === $aos->player2_score) {
            $aos->victory_p1 = false;
            $aos->victory_p2 = false;
        } else {
            $aos->victory_p2 = true;
            $aos->victory_p1 = false;
        };
        $aos->save();
        return redirect('/createaos');
    }

    public function showaos($id)
    {
        $aos = Aos::find($id);
        return view('aos.showaos', ['aos' => $aos]);
    }

    public function editaos($id)
    {
        $aos = Aos::find($id);
        return view('aos.editaos', ['aos' => $aos]);
    }

    public function updateaos($id)
    {

        $aos = Aos::find($id);

        $aos->scenario = request('scenario');
        $aos->pointlimit = request('pointlimit');

        $aos->player1_name = request('player1_name');
        $aos->player1_faction = request('player1_faction');
        $aos->player1_score = request('player1_score');

        $aos->player2_name = request('player2_name');
        $aos->player2_faction= request('player2_faction');
        $aos->player2_score = request('player2_score');

        $aos->aosdescription = request('description');

        if($aos->player1_score > $aos->player2_score){
            $aos->victory_p1 = true;
            $aos->victory_p2 = false;
        } elseif($aos->player1_score === $aos->player2_score) {
            $aos->victory_p1 = false;
            $aos->victory_p2 = false;
        } else {
            $aos->victory_p2 = true;
            $aos->victory_p1 = false;
        };

        $aos->save();
        return redirect('/aos/'.$aos->id)
            ->with('message', 'Game Updated');
    }
    public function destroyaos($id)
    {
        $aos = Aos::find($id);
        $aos->delete();
        return view('aos.indexaos', [
            'aosgames'=> auth()->user()->aos]);
    }

    public function stats()
    {
        $user = auth()->user();
        $count = $user->aos->count();
        $victory_count_p1 = $user
            ->aos()
            ->where('victory_p1', true)
            ->count();
        $victory_count_p2 = $user
            ->aos()
            ->where('victory_p2', true)
            ->count();
        $scenario_stats =$user->aos()
            ->select('scenario', DB::raw('count(*) as scenario_stats'), 'scenario')
            ->groupBy('scenario')
            ->orderBy(DB::raw('count(*)'), 'DESC')
            ->get();
        $current_year = date('Y');
        $date_stats = $user->aos()
            ->select(DB::raw('YEAR(created_at) as year'), DB::raw('count(*) as date_count'))
            ->whereYear('created_at', '<=', $current_year)
            ->groupBy('year')
            ->orderBy('year', 'ASC')
            ->get();
        $faction_stats_p1 = $user->aos()
            ->select(['player1_faction', DB::raw('count(*) as faction_count'), 'player1_name'])
            ->groupBy('player1_faction')
            ->orderBy(DB::raw('count(*)'), 'DESC')
            ->get();
        $faction_stats_p2 = $user->aos()
            ->select(['player2_faction', DB::raw('count(*) as faction_count'), 'player2_name'])
            ->groupBy('player2_faction')
            ->orderBy(DB::raw('count(*)'), 'DESC')
            ->get();
        $faction_wins_p1 = $user->aos()
            ->select('player1_faction', DB::raw('count(*) as faction_wins_p1'), 'player1_name')
            ->where('victory_p1', '=', "1")
            ->groupBy('player1_faction')
            ->get();
        $faction_wins_p2 = $user->aos()
            ->select('player2_faction', DB::raw('count(*) as faction_wins_p2'), 'player2_name')
            ->where('victory_p2', '=', "1")
            ->groupBy('player2_faction')
            ->get();
        $faction_loses_p2 = $user->aos()
            ->select('player2_faction', DB::raw('count(*) as faction_loses_p2'), 'player2_name')
            ->where('victory_p2', '=', "0")
            ->groupBy('player2_faction')
            ->get();
            

        return view('aos.statisticsaos', [
            'aos'=>auth()->user()->aos(),
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
}
