<?php

namespace App\Http\Controllers;

use App\Models\project;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('index');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $game = \DB::table('games')->where('slug', $slug)->first();

        return view('game', [
            'game'=>$game
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, project $project)
    {
        //
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
