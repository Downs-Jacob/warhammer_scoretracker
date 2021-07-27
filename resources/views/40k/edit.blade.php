@extends ('layouts.layout')

@section('content')
    <form method="POST" action="/games/{{$game->id}}">
        @csrf
        @method('PUT')
       
        @include ('40k._scenario_select', ['scenario'=>$game->scenario])
        

        <div class= "px-6 py-3 m-2 border-8 border-gray-300">
            <div class="">
                <label class="flex-1 block mb-2 text-xs font-bold tracking-wide text-indigo-400 uppercase" for="grid-first-name">
                Description of Game
                </label>
                <textarea class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" name='description' rows="4">{{$game->description}}</textarea>
            </div>
        </div>
       
        <div class='px-6 py-3 m-2 border-8 border-gray-300'>
            <div class="flex-1 block mb-2 text-xs font-bold tracking-wide text-indigo-400 uppercase"> Player 1 Information</div>
            <div class="flex">
                <textarea class="py-0 text-center" name="player1_name" id="player1_name">{{$game->player1_name}}</textarea>
                <textarea class="py-0 text-center" name="player1_faction" id="player1_faction">{{$game->player1_faction}}</textarea>
                <textarea class="py-0 text-center" name="player1_primary" id="player1_primary">{{$game->player1_primary}}</textarea>
                <textarea class="py-0 text-center" name="player1_secondary" id="player1_secondary">{{$game->player1_secondary}}</textarea>
            </div>
        </div>
        <div class='px-6 py-3 m-2 border-8 border-gray-300'>
        <div class="flex-1 block mb-2 text-xs font-bold tracking-wide text-indigo-400 uppercase"> Player 2 Information</div>
            <div class="flex">
                <textarea class="py-0 text-center" name="player2_name" id="player2_name">{{$game->player2_name}}</textarea>
                <textarea class="py-0 text-center" name="player2_faction" id="player2_faction">{{$game->player2_faction}}</textarea>
                <textarea class="py-0 text-center" name="player2_primary" id="player2_primary">{{$game->player2_primary}}</textarea>
                <textarea class="py-0 text-center" name="player2_secondary" id="player2_secondary">{{$game->player2_secondary}}</textarea>
            </div>
        </div>
        <div class="flex control">
            <button class="text-center shadow-xl flex-1 px-4 py-2 m-2 font-bold text-white bg-blue-500 rounded-full mr-l hover:bg-blue-700" type="submit">Submit</button>
            <a
            href="/games/{{$game->id}}"
            class="text-center shadow-xl flex-1 px-4 py-2 m-2 font-bold text-white bg-blue-500 rounded-full mr-l hover:bg-blue-700"> Return to Game
            </a>
            <a
            href="{{route('archive')}}"
            class="text-center shadow-xl flex-1 px-4 py-2 m-2 font-bold text-white bg-blue-500 rounded-full mr-l hover:bg-blue-700"> Return to Archive
            </a>
        </div>
    </form>

@endsection
