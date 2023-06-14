@extends('layouts.layout')

@section('content')

    @if ($errors->any())
        <p class="text-center mt-2 text-xs text-red-500">{{ "Please make sure that the Scenario, Point Limit, and Player Faction Names, and Player Names have all been added" }}</p>
    @endif

    <div id="page" class="flex items-center justify-center">
        <div>
            <form action="/create10e" novalidate method="POST" id="formid">
                {{ csrf_field() }}

                <!-- @if (auth()->check())
                    @include('aos._aos_description')
                @endif -->
                <div class="py-3 my-4 mx-4 bg-gray-100 rounded-lg shadow-lg">
                    <div class="flex flex-col space-y-4">
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-1/2 px-4">
                                <div class="flex">
                                    <div class="w-1/2">
                                        @include('40k10e._10e_primary_mission_select')
                                    </div>
                                    <div class="w-1/2">
                                        @include('40k10e._10e_deployment_select')
                                    </div>
                                </div>
                            </div>
                            <div class="w-full lg:w-1/2 px-4">
                                <div class="flex">
                                    <div class="w-1/2">
                                        @include('40k10e._10e_mission_rule_select')
                                    </div>
                                    <div class="w-1/2">
                                        @include('40k10e._10e_point_total')
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="w-full px-4">
                                @include('40k10e._10e_game_description')
                            </div>
                        </div>
                    </div>
                </div>


                <div class="flex flex-col space-y-4 mt-4">
                    @include('40k10e._10e_player_layout', [
                        'id' => 'player1',
                        'player' => 'player1',
                        'player_faction' => 'player1_faction',
                        'player_name' => 'player1_name',
                        'player_score' => 'player1_score'
                    ])
                    @include('40k10e._10e_player_layout', [
                        'id' => 'player2',
                        'player' => 'player2',
                        'player_faction' => 'player2_faction',
                        'player_name' => 'player2_name',
                        'player_score' => 'player2_score'
                    ])
                </div>

            </form>
        </div>
    </div>

@endsection
