<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Notifications\Notifiable;

class GameController extends Controller
{
    use HasFactory, Notifiable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('index', [
            'games'=> auth()->user()->games]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = [
            [
                'name'=>'PURGE',
                'options'=> [
                    'Assassinate',
                    'Bring it Down',
                    'Titan Slayers',
                    'Slay the Warlord'
                    ]
            ],[
                'name'=>'NO MERCY, NO RESPITE',
                'options'=> [
                    'Thin Their Ranks',
                    'Attrition',
                    'While We Stand We Fight',
                    'First Strike'
                    ]
            ],[
                'name'=>'BATTLEFIELD SUPREMACY',
                'options'=> [
                    'Engage on all Fronts',
                    'Linebreaker',
                    'Domination'
                     ]
            ],[
                'name'=>'SHADOW OPERATIONS',
                'options'=> [
                    'Investigate Sites',
                    'Repair Teleport Homer',
                    'Raise the Banners High'
                    ]
            ],[
                'name'=>'WARPCRAFT',
                'options'=> [
                    'Mental Interrogation',
                    'Psychic Ritual',
                    'Abhor the Witch'
                     ]
            ],[
                'name'=>'MISSION SPECIFIC',
                'options'=> [
                    'Surgical Assault',
                    'Survey',
                    'Encircle',
                    'Lines of Demarcation',
                    'Outflank',
                    'Center Ground',
                    'Forward Push',
                    'Ransack',
                    'Test Their Line',
                    'Minimise Loses',
                    'Vital Ground',
                    'Siphon Power',
                    'Secure No Mans Land',
                    'Raze',
                    'Data Intercept',
                    'Hold the Center',
                    'Surround Them',
                    'Search for the Portal'
                    ]
            ]

        ];

        return view('create', [
            'categories'=>$categories

        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        request()->validate([
            'scenario'=>'required',
            'player1_name'=>'required',
            'player1_army'=>'required',
            'player2_name'=>'required',
            'player2_army'=>'required',
            'description'=>'required'
        ]);


        $game = new Game();

        $game->scenario = request('scenario');
        $game->user_id = auth()->id();
        $game->player1_name = request('player1_name');
        $game->player1_army = request('player1_army');
        $game->player1_primary = request('player1_primary');
        $game->player1_secondary = request('player1_secondary');
        $game->player1_score = request('player1_primary')+request('player1_secondary');
        $game->player2_name = request('player2_name');
        $game->player2_army = request('player2_army');
        $game->player2_primary = request('player2_primary');
        $game->player2_secondary = request('player2_secondary');
        $game->player2_score = request('player2_primary')+request('player2_secondary');
        $game->description = request('description');

        if($game->player1_score > $game->player2_score){
            $game->victory_p1 = true;
            $game->victory_p2 = false;
        } elseif($game->player1_score === $game->player2_score) {
            $game->victory_p1 = false;
            $game->victory_p2 = false;
        } else {
            $game->victory_p2 = true;
            $game->victory_p1 = false;
        };



        $game->save();
        return redirect('/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $game = Game::find($id);
        return view('/show', ['game' => $game]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $game = Game::find($id);
        return view('edit', ['game' => $game]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        request()->validate([
            'scenario'=>'required',
            'player1_name'=>'required',
            'player1_army'=>'required',
            'player2_name'=>'required',
            'player2_army'=>'required',
            'description'=>'required'
        ]);

        $game = Game::find($id);

        $game->scenario = request('scenario');

        $game->player1_name = request('player1_name');
        $game->player1_army = request('player1_army');
        $game->player1_primary = request('player1_primary');
        $game->player1_secondary = request('player1_secondary');
        $game->player1_score = request('player1_primary')+request('player1_secondary');

        $game->player2_name = request('player2_name');
        $game->player2_army = request('player2_army');
        $game->player2_primary = request('player2_primary');
        $game->player2_secondary = request('player2_secondary');
        $game->player2_score = request('player2_primary')+request('player2_secondary');

        $game->description = request('description');

        if($game->player1_score > $game->player2_score){
            $game->victory_p1 = true;
            $game->victory_p2 = false;
        } elseif($game->player1_score === $game->player2_score) {
            $game->victory_p1 = false;
            $game->victory_p2 = false;
        } else {
            $game->victory_p2 = true;
            $game->victory_p1 = false;
        };

        $game->save();
        return redirect('/games/'.$game->id)
            ->with('message', 'Game Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(project $project)
    {
        //
    }


}
