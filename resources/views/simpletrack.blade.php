@section('content')
    @if ($errors->any())
        <p class="mt-2 text-xs text-red-500"> {{ "Please make sure Scenario, Description, Player Names, and Army Names have all been added" }}</p>
    @endif
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
                ],[
                    'name'=>'ARMY SPECIFIC',
                    'options'=> [
                        'Army Specific Secondary'
                        ]
                ]
                
<form action="/create" METHOD="POST" id="formid">

        @csrf

        @include('_scenario_select')

        @include('description')

        @include('_player_layout',[
            'player_army'=>'player1_army',
            'player_name'=>'player1_name',
            'player_primary'=>'player1_primary',
            'player_secondary'=>'player1_secondary',
            'player_score'=>'player1_score'
            ])

        @include('_player_layout',[
            'player_army'=>'player2_army',
            'player_name'=>'player2_name',
            'player_primary'=>'player2_primary',
            'player_secondary'=>'player2_secondary',
             'player_score'=>'player2_score'
             ])
</form>
</div>
</div>