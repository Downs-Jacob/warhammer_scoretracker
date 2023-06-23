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
                'name'=>'PURGE THE ENEMY',
                'options'=> [
                    'Assassination',
                    'Bring it Down',
                    'Codex Warfare - Adeptus Astartes',
                    'Auric Mortalis - Adeptus Custodes',
                    'Accretion of Knowledge - Adeptus Mechanicus',
                    'By Lasgun and Bayonet - Astra Militarum',
                    'Cull Order - Deathwatch',
                    'Destroy the Daemon - Grey Knights',
                    'Lightning Strike - White Scares',
                    'Rise to Glory - Chaos Space Marines',
                    'Specimens for the Spider - Creations of Bile',
                    'Sorcerous Prowess - Thousand Sons',
                    'Blood for the Blood God - World Eaters',
                    'Take Them Alive! - Drukhari',
                    'Ambush - Genestealer Cults',
                    'The Treasures of Aeons - Necrons',
                    'Stomp em Good - Orks',
                    'Cranial Feasting - Tyranids'
                    ]
            ],[
                'name'=>'NO MERCY, NO RESPITE',
                'options'=> [
                    'Grind Them Down',
                    'No Prisoners',
                    'Oaths of Moment - Adeptus Astartes',
                    'Carry Out Your Vows - Black Templars',
                    'Cold Fury - Iron Hands',
                    'The Promethean Creed - Salamanders',
                    'A Leap of Faith - Adepta Sororitas',
                    'Might of Terra - Adeptus Custodes',
                    'Eradication of Flesh - Adeptus Mechanicus',
                    'Inflexible Command - Astra Militarum',
                    'Honour of the House - Imperial Knights',
                    'Teleport Assault - Grey Knights',
                    'The Long War - Chaos Space Marines',
                    'Adorn the Canvas Eclectic - Emperor\'s Children',
                    'Sow the Seeds, Reap the Fear - Night Lords',
                    'The Blood God\'s Due - World Eaters',
                    'Fleeing Vectors - Death Guard',
                    'Paths of Destruction - Chaos Knights',
                    'Nourished by Terror - Chaos Daemons',
                    'Wrath of Khaine - Asuryani/Ynnari',
                    'Fear and Terror - Drukhari',
                    'A Deadly Performance - Harlequins',
                    'Synaptic Insight - Tyranids',
                    'Treasures of Aeon - Necrons',
                    'A Clean Victory - T\'au Empire',
                    'The Ancestors Are Watching - Leagues of Votann',
                    ]
            ],[
                'name'=>'BATTLEFIELD SUPREMACY',
                'options'=> [
                    'Behind Enemy Lines',
                    'Engage on all Fronts',
                    'Shock Tactics - Adeptus Astartes',
                    'Relentless Assault - Blood Angels',
                    'Stubborn Defiance - Dark Angels',
                    'Warrior Pride - Space Wolves',
                    'Defend the Shrine - Adepta Sororitas',
                    'Stand Vigil - Adeptus Custodes',
                    'Hidden Archeovault - Adeptus Mechanicus',
                    'Boots on the Ground - Astra Militarum',
                    'Yield No Ground - Imperial Knights',
                    'Pile the Skulls - World Eaters',
                    'Despoiled Ground - Death Guard',
                    'Ruthless Tyranny - Chaos Knights',
                    'Herd the Prey - Drukhari',
                    'Take Your Places - Harlequins',
                    'Broodswarm - Genestealer Cults',
                    'Purge the Vermin - Necrons',
                    'Green Tide - Orks',
                    'Decisive Action - T\'au Empire',
                    'Lay Claim - Leagues of Votann'
                     ]
            ],[
                'name'=>'SHADOW OPERATIONS',
                'options'=> [
                    'Raise the Banners High',
                    'Retrieve Battlefield Data',
                    'Bolster Barricades - Imperial Fists',
                    'Secure or Sabatoge - Raven Guard',
                    'We March for Macragge - Ultramarines',
                    'Sacred Grounds - Adepta Sororitas',
                    'Renew the Oaths - Imperial Knights',
                    'For the Dark Gods - Chaos Space Marines',
                    'Infiltrate and Subvert - Alpha Legion',
                    'Despoil Dominions - Black Legion',
                    'Masters of Demolition - Iron Warriors',
                    'Raid and Reave - Red Corsairs',
                    'Exalt the Dark Gods - Word Bearers',
                    'Spread the Sickness - Death Guard',
                    'Burn Empires - Thousand Sons',
                    'Storm of Darkness - Chaos Knights',
                    'Despoilers of Reality - Chaos Daemons',
                    'Scout the Enemy - Asuryani/Ynnari',
                    'Spore Nodes - Tyranids',
                    'Sabotage Critical Location - Genestealer Cults',
                    'Ancient Machineries - Necrons',
                    'Get Da Good Bitz - Orks',
                    'Aerospace Targeting Relays - T\'au Empire',
                    'Prospects of Wealth - Leagues of Votann'
                    ]
            ],[
                'name'=>'WARPCRAFT',
                'options'=> [
                    'Abhor the Witch',
                    'Warp Ritual',
                    'Psychic Interrogation',
                    'Purifying Ritual - Grey Knights',
                    'Mutate Landscape - Thousand Sons',
                    'Scry Futures - Asuryani/Ynnari',
                    'Weave Veil - Harlequins'
                     ]
            ],
            [
                    'name'=>'ARMY SPECIFIC',
                    'options'=> [
                        'Army Specific Secondary'
                        ]
                ],[
                    'name'=>'OTHER',
                    'options'=> [
                        'Other Secondary'
                        ]
                ],[
                    'name'=>'TEMPEST OF WAR',
                    'options'=> [
                        'Area Denial',
                        'Assassination',
                        'Battlefield Supremacy',
                        'Behind Enemy Lines',
                        'Blood and Guts',
                        'Bring it Down',
                        'Capture Enemy Outpost',
                        'Defend Stronghold',
                        'Deploy Teleport Homer',
                        'Extend Battle Lines',
                        'Grind Them Down',
                        'Hold the Line',
                        'Investigate Site',
                        'No Prisoners',
                        'No Retreat, No Surrender',
                        'Overwhelming Firepower',
                        'Raise Banner',
                        'Secure No Mans Land' ,
                        'Storm Hostile Objective',
                        'A Tempting Target',

                        ]
                ]
        ];

        return view('40k.create', [
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
    public function editionselect()
    {
        return view('edition');
    }
    public function editionselectindex()
    {
        return view('editionselectindex');
    }
    public function editionselectstatistics()
    {
        return view('editionselectstatistics');
    }
}