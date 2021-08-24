<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\aos;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\QueryException;
use Illuminate\Notifications\Notifiable;


class AosController extends Controller
{
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

    public function store()
    {
        request()->validate([
            'scenario'=>'required',
            'player1_faction'=>'required',
            'player2_faction'=>'required',
        ]);

        $aosgame = new Aosgame();

        $aosgame->scenario = request('scenario');
        $aosgame->pointlimit = request('pointlimit');
        $aosgame->user_id = auth()->id();
        $aosgame->player1_name = request('player1_name');
        $aosgame->player1_faction = request('player1_faction');
        $aosgame->player1_grandstrat = request('player1_grandstrat');
        $aosgame->player1_score = request('player1_primary')+request('player1_secondary');
        $aosgame->player2_name = request('player2_name');
        $aosgame->player2_faction = request('player2_faction');
        $aosgame->player2_grandstrat = request('player2_grandstrat');
        $aosgame->player2_score = request('player2_primary')+request('player2_secondary');
        $aosgame->aosdescription = request('aosdescription');
        

        if($aosgame->player1_score > $aosgame->player2_score){
            $aosgame->victory_p1 = true;
            $aosgame->victory_p2 = false;
        } elseif($aosgame->player1_score === $aosgame->player2_score) {
            $aosgame->victory_p1 = false;
            $aosgame->victory_p2 = false;
        } else {
            $aosgame->victory_p2 = true;
            $aosgame->victory_p1 = false;
        };
        $aosgame->save();
        return redirect('/createaos');
    }
}
