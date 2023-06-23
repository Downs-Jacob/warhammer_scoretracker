@extends('layouts.layout')

@section('content')
    <div class="flex justify-center mt-10">
        <div class="w-full sm:w-2/3 md:w-1/2 lg:w-1/3">
            <form method="POST" action="/ten/{{$ten->id}}">
                @csrf
                @method('PUT')

                <div class="px-6 py-3 mb-4 border-8 border-gray-300">
                    @include('40k10e._10e_primary_mission_select', ['scenario'=>$ten->scenario, 'selected'=>$ten->scenario_select])
                    @include('40k10e._10e_deployment_select', ['deployment'=>$ten->deployment, 'selected'=>$ten->deployment_select])
                    @include('40k10e._10e_mission_rule_select', ['rule'=>$ten->rule, 'selected'=>$ten->rule_select])
                </div>

                <div class="px-6 py-3 mb-4 border-8 border-gray-300">
                    <div class="text-xs font-bold tracking-wide text-indigo-400 uppercase mb-2">Description of Games</div>
                    <textarea class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" name='description' rows="4">{{$ten->description10e}}</textarea>
                </div>

                <div class="px-6 py-3 mb-4 border-8 border-gray-300">
                    <div class="text-xs font-bold tracking-wide text-indigo-400 uppercase mb-2">Player 1 Information</div>
                    <div class="flex">
                        <textarea class="py-0 text-center flex-1" name="player1_name" id="player1_name">{{$ten->player1_name}}</textarea>
                        <textarea class="py-0 text-center flex-1" name="player1_faction" id="player1_faction">{{$ten->player1_faction}}</textarea>
                        <textarea class="py-0 text-center flex-1" name="player1_score" id="player1_score">{{$ten->player1_score}}</textarea>
                    </div>
                </div>

                <div class="px-6 py-3 mb-4 border-8 border-gray-300">
                    <div class="text-xs font-bold tracking-wide text-indigo-400 uppercase mb-2">Player 2 Information</div>
                    <div class="flex">
                        <textarea class="py-0 text-center flex-1" name="player2_name" id="player2_name">{{$ten->player2_name}}</textarea>
                        <textarea class="py-0 text-center flex-1" name="player2_faction" id="player2_faction">{{$ten->player2_faction}}</textarea>
                        <textarea class="py-0 text-center flex-1" name="player2_score" id="player2_score">{{$ten->player2_score}}</textarea>
                    </div>
                </div>

                <div class="flex justify-center">
                    <button class="w-40 px-4 py-2 m-2 font-bold text-sm text-white bg-blue-500 rounded-full shadow-xl hover:bg-blue-700 text-center" type="submit">Submit</button>
                    <a href="/ten/{{$ten->id}}" class="w-40 px-4 py-2 m-2 font-bold text-sm text-white bg-blue-500 rounded-full shadow-xl hover:bg-blue-700 text-center">Return to Game</a>
                    <a href="{{route('index10e')}}" class="w-40 px-4 py-2 m-2 font-bold text-sm text-white bg-blue-500 rounded-full shadow-xl hover:bg-blue-700 text-center">Return to Archive</a>
                </div>


        </div>
    </form>
@endsection
