@extends ('layouts.layout')

@section('content')
    <form method="POST" action="/aos/{{$aos->id}}">
        @csrf
        @method('PUT')
        
        @include ('aos._aos_scenario_select', ['scenario'=>$aos->scenario, 'selected'=>$aos->scenario_select])


        <div class= "px-6 py-3 m-2 border-8 border-gray-300">
            <label class="block mb-2 text-xs font-bold tracking-wide text-indigo-400 uppercase" for="grid-first-name">
                Description of Game
            </label>
            <textarea class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" name='description' rows="4">{{$aos->aosdescription}}</textarea>
        </div>

        <div class='px-6 py-3 m-2 border-8 border-gray-300'>
            <div class="flex-1 block mb-2 text-xs font-bold tracking-wide text-indigo-400 uppercase"> Player 1 Information</div>
            <div class="flex">
                <textarea class="py-0 text-center" name="player1_name" id="player1_name">{{$aos->player1_name}}</textarea>
                <textarea class="py-0 text-center" name="player1_faction" id="player1_faction">{{$aos->player1_faction}}</textarea>
                <textarea class="py-0 text-center" name="player1_score" id="player1_score">{{$aos->player1_score}}</textarea>
            </div>
        </div>

        <div class='px-6 py-3 m-2 border-8 border-gray-300'>
            <div class="flex-1 block mb-2 text-xs font-bold tracking-wide text-indigo-400 uppercase"> Player 2 Information</div>
            <div class="flex">
                <textarea class="py-0 text-center" name="player2_name" id="player2_name">{{$aos->player2_name}}</textarea>
                <textarea class="py-0 text-center" name="player2_faction" id="player2_faction">{{$aos->player2_faction}}</textarea>
                <textarea class="py-0 text-center" name="player2_score" id="player2_score">{{$aos->player2_score}}</textarea>
            </div>
        </div>

        <div class="flex control">
            <button class="flex-1 px-4 py-2 m-2 font-bold text-white bg-blue-500 rounded-full shadow-xl hover:bg-blue-700" type="submit">Submit</button>
            <a href="/aos/{{$aos->id}}" class="flex-1 px-4 py-2 m-2 font-bold text-white bg-blue-500 rounded-full shadow-xl mr-l hover:bg-blue-700"> Return to Game </a>
            <a href="{{route('indexaos')}}" class="flex-1 px-4 py-2 m-2 font-bold text-white bg-blue-500 rounded-full shadow-xl mr-l hover:bg-blue-700"> Return to Archive </a>
        </div>
    </form>
@endsection
