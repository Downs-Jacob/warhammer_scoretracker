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
        $aos->player1_score = request('player1_primary')+request('player1_secondary');
        $aos->player2_name = request('player2_name');
        $aos->player2_faction = request('player2_faction');
        $aos->player2_grandstrat = request('player2_grandstrat');
        $aos->player2_score = request('player2_primary')+request('player2_secondary');
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
}
