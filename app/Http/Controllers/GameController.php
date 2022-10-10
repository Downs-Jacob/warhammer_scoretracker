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
                'name'=>'PURGE THE ENEMY',
                'options'=> [
                    'Assassination',
                    'Bring it Down',
                    'Slay the Heretic - Adepta Sororitas',
                    'Codex Warfare - Adeptus Astartes',
                    'Auric Mortalis - Adeptus Custodes',
                    'Accretion of Knowledge - Adeptus Mechanicus',
                    'By Lasgun and Bayonet - Astra Militarum',
                    'Bathe Your Blade in the Blood - Black Templars',
                    'Blade of Sanguinius - Blood Angels',
                    'Martial Interdiction - Dark Angels',
                    'Cull Order - Deathwatch',
                    'Destroy the Daemon - Grey Knights',
                    'Grudge Match - Leagues of Votann',
                    'Heroic Challenge - Space Wolves',
                    'Glory Kills - Space Wolves',
                    'Lightning Strike - White Scares',
                    'Duel of Honour - Imperial Knights',
                    'Yield No Ground - Imperial Knights',
                    'A Fitting Challenge - Chaos Knights',
                    'Rise to Glory - Chaos Space Marines',
                    'Specimens for the Spider - Creations of Bile',
                    'Sorcerous Prowess - Thousand Sons',
                    'Skulls for the Skull Throne - World Eaters',
                    'Take Them Alive! - Drukhari',
                    'Beasts for the Arenas - Drukhari',
                    'Ambush - Genestealer Cults',
                    'The Treasures of Aeons - Necrons',
                    'Da Biggest and Da Best - Orks',
                    'Cranial Feasting - Tyranids'
                    ]
            ],[
                'name'=>'NO MERCY, NO RESPITE',
                'options'=> [
                    'Grind Them Down',
                    'No Prisoners',
                    'A Leap of Faith - Adepta Sororitas',
                    'Oaths of Moment - Adeptus Astartes',
                    'Might of Terra - Adeptus Custodes',
                    'Eradication of Flesh - Adeptus Mechanicus',
                    'Inflexible Command - Astra Militarum',
                    'Carry Out Your Vows - Black Templars',
                    'Fury of the Lost - Blood Angels',
                    'Death From Above - Blood Angels',
                    'Death on the Wind - Dark Angels',
                    'Suffer Not the Alien - Deathwatch',
                    'Teleport Assault - Grey Knights',
                    'Honour of the House - Imperial Knights',
                    'Cold Fury - Iron Hands',
                    'The Ancestors Are Watching - Leagues of Votann',
                    'The Promethean Creed - Salamanders',
                    'A Mighty Saga - Space Wolves',
                    'Nourished by Terror - Chaos Daemons',
                    'Paths of Destruction - Chaos Knights',
                    'The Long War - Chaos Space Marines',
                    'Fleeing Vectors - Death Guard',
                    'Adorn the Canvas Eclectic - Emperor\'s Children',
                    'Sow the Seeds, Reap the Fear - Night Lords',
                    'Wrath of Magnus - Thousand Sons',
                    'Wrath of Khaine - Asuryani/Ynnari',
                    'Fear and Terror - Drukhari',
                    'A Deadly Performance - Harlequins',
                    'Code of Combat - Necrons',
                    'Stomp em Good - Orks',
                    'A Clean Victory - T\'au Empire',
                    'Synaptic Insight - Tyranids'
                    ]
            ],[
                'name'=>'BATTLEFIELD SUPREMACY',
                'options'=> [
                    'Behind Enemy Lines',
                    'Engage on all Fronts',
                    'Defend the Shrine - Adepta Sororitas',
                    'Shock Tactics - Adeptus Astartes',
                    'Stand Vigil - Adeptus Custodes',
                    'Uncharted Sequencing - Adeptus Mechanicus',
                    'Hidden Archeovault - Adeptus Mechanicus',
                    'Boots on the Ground - Astra Militarum',
                    'Allow Not the Worship of Unclean Idols - Black Templars',
                    'Relentless Assault - Blood Angels',
                    'Stubborn Defiance - Dark Angels',
                    'The Long Vigil - Deathwatch',
                    'Lay Claim - Leagues of Votann',
                    'Warrior Pride - Space Wolves',
                    'Yield No Ground - Imperial Knights',
                    'Ruthless Tyranny - Chaos Knights',
                    'Despoiled Ground - Death Guard',
                    'Reality Rebels - Chaos Daemons',
                    'The Hidden Path - Asuryani/Ynnari',
                    'Herd the Prey - Drukhari',
                    'Take Your Places - Harlequins',
                    'Broodswarm - Genestealer Cults',
                    'Purge the Vermin - Necrons',
                    'Green Tide - Orks',
                    'Decisive Action - T\'au Empire'
                     ]
            ],[
                'name'=>'SHADOW OPERATIONS',
                'options'=> [
                    'Raise the Banners High',
                    'Retrieve Nephilim Data',
                    'Sacred Grounds - Adepta Sororitas',
                    'Special Order - Astra Militarum',
                    'Renew the Oaths - Imperial Knights',
                    'Storm of Darkness - Chaos Knights',
                    'Spread the Sickness - Death Guard',
                    'Cripple Stronghold - Deathwatch',
                    'Bolster Barricades - Imperial Fists',
                    'Prospects of Wealth - Leagues of Votann',
                    'For the Dark Gods - Chaos Space Marines',
                    'Infiltrate and Subvert - Alpha Legion',
                    'Despoil Dominions - Black Legion',
                    'Masters of Demolition - Iron Warriors',
                    'Burn Empires - Thousand Sons',
                    'Raid and Reave - Red Corsairs',
                    'Exalt the Dark Gods - Shadow Operations',
                    'Secure or Sabatoge - Raven Guard',
                    'Despoilers of Reality - Chaos Daemons',
                    'We March for Macragge - Ultramarines',
                    'Scout the Enemy - Asuryani/Ynnari',
                    'Sabotage Critical Location - Genestealer Cults',
                    'Ancient Machineries - Necrons',
                    'Get Da Good Bitz - Orks',
                    'Aerospace Targeting Relays - T\'au Empire',
                    'Spore Nodes - Tyranids'
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
}