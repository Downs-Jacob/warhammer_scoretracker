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

    public function splash()
    {
        return view('welcome');
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
                    'Assassination',
                    'Titan Hunters',
                    'Bring it Down'
                    ]
            ],[
                'name'=>'NO MERCY, NO RESPITE',
                'options'=> [
                    'No Prisoners',
                    'Grind Them Down',
                    'To The Last'
                    ]
            ],[
                'name'=>'BATTLEFIELD SUPREMACY',
                'options'=> [
                    'Engage on all Fronts',
                    'Behind Enemy Lines',
                    'Stranglehold'
                     ]
            ],[
                'name'=>'SHADOW OPERATIONS',
                'options'=> [
                    'Raise the Banners High',
                    'Investigate Signal',
                    'Retrieve Octarius Data',
                    'Deploy Teleport Homers'
                    ]
            ],[
                'name'=>'WARPCRAFT',
                'options'=> [
                    'Abhor the Witch',
                    'Warp Ritual',
                    'Pierce the Veil',
                    'Psychic Interrogation'
                     ]
            ],[
                'name'=>'MISSION SPECIFIC',
                'options'=> [
                    'Ascend',
                    'Center Ground',
                    'Data Intercept',
                    'Direct Assault',
                    'Encircle',
                    'Forward Push',
                    'Hold the Center',
                    'Inload Data-Psalm',
                    'Lines of Demarcation',
                    'Minimise Loses',
                    'Outflank',
                    'Overrun',
                    'Priority Targets',
                    'Raid Supply Lines',
                    'Ransack',
                    'Raze',
                    'Recon Sweep',
                    'Siphon Power',
                    'Search for the Portal',
                    'Secure No Mans Land',
                    'Secure Landing Sites',
                    'Strategic Scan',
                    'Surgical Assault',
                    'Survey',
                    'Surround Them',
                    'Test Their Line',
                    'Vital Ground'

                    ]
                ],[
                    'name'=>'ARMY SPECIFIC',
                    'options'=> [
                        'Army Specific Secondary'
                        ]
                ],[
                    'name'=>'OTHER',
                    'options'=> [
                        'Other Secondary'
                        ]
                ]
        ];

        return view('40k.create', [
            'categories'=>$categories

        ]);
    }
    public function createsigmar()
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
            'player1_faction'=>'required',
            'player1_army'=>'required',
            'player2_faction'=>'required',
            'player2_army'=>'required',
        ]);

        $game = new Game();

        $game->scenario = request('scenario');
        $game->user_id = auth()->id();
        $game->player1_name = request('player1_name');
        $game->player1_faction = request('player1_faction');
        $game->player1_army = request('player1_army');
        $game->player1_primary = request('player1_primary');
        $game->player1_secondary = request('player1_secondary');
        $game->player1_score = request('player1_primary')+request('player1_secondary');
        $game->player2_name = request('player2_name');
        $game->player2_faction = request('player2_faction');
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
        return view('40k.edit', ['game' => $game]);
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

        $game = Game::find($id);

        $game->scenario = request('scenario');

        $game->player1_name = request('player1_name');
        $game->player1_army = request('player1_army');
        $game->player1_faction = request('player1_faction');
        $game->player1_primary = request('player1_primary');
        $game->player1_secondary = request('player1_secondary');
        $game->player1_score = request('player1_primary')+request('player1_secondary');

        $game->player2_name = request('player2_name');
        $game->player2_army = request('player2_army');
        $game->player2_faction= request('player2_faction');
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
    public function destroy($id)
    {
        $game = Game::find($id);
        $game->delete();
        return view('index', [
            'games'=> auth()->user()->games]);
    }
    public function faq()
    {
        return view('faq');
    }
    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('contact');
    }
    public function simpletrack()
    {
        return view('simpletrack');
    }
}