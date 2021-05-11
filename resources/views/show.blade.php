
@extends ('layouts.layout')
@section('content')

@if (session('message'))
    <div class="mt-2 text-green-500"> {{ session('message')}} </div>
@endif

<div class="flex bg-blue-200 py-2 px-4">
    <div class="flex-1 px-4 py-2 m-2 text-center text-gray-700 bg-blue-100 rounded-xl">
        <h1 class="font-bold">Game Id: {{ $game->id}}</h1> Date : {{$game->created_at}}
        <br>
        Scenario: {{ $game->scenario}}
        <br>
        @if ($game->player1_primary + $game->player1_secondary > $game->player2_primary + $game->player2_secondary)
            Player 1 Victory
        @elseif ($game->player1_primary + $game->player1_secondary === $game->player2_primary + $game->player2_secondary)
            The Game was a Tie
        @else Player 2 Victory
        @endif
    </div>
    <div class="flex-1 px-4 py-2 m-2 text-center text-gray-700 bg-blue-100 rounded-xl"> Player 1 Name: {{ $game->player1_name}}
        <br>
        Player 1 Army: {{ $game->player1_army}}
        <br>
        Player 1 Primary Score: {{ $game->player1_primary}}
        <br>
        Player 1 Secondary Score: {{ $game->player1_secondary}}
        <br>
        Player 1 Total Score: {{ $game->player1_primary + $game->player1_secondary }}
     </div>
     <div class="flex-1 px-4 py-2 m-2 text-center text-gray-700 bg-blue-100 rounded-xl">
         Player 2 Name: {{ $game->player2_name}}
         <br>
         Player 2 Army: {{ $game->player2_army}}
         <br>
         Player 2 Primary Score: {{ $game->player2_primary}}
         <br>
         Player 2 Secondary Score: {{ $game->player2_secondary}}
         <br>
         Player 2 Total Score: {{ $game->player2_primary + $game->player2_secondary }}
     </div>
</div>
<div class=" flex px-4 pb-2 bg-blue-200 shadow-xl">
    <div class="flex-1 px-4 py-2 m-2 text-center text-gray-700 bg-blue-100 rounded-xl">
        Description: {{ $game->description}}
    </div>
</div>

<!--MODAL -->
<div
    class="mt-6"
    x-data="{ open: false }"
    x-show=true>

    <a
        href="{{route('archive')}}"
        class="shadow-xl flex-1 px-4 py-2 m-2 font-bold text-white bg-blue-500 rounded-full mr-l hover:bg-blue-700"> Return to Archive
    </a>
    <a
        href="{{route('edit', ['game' => $game])}}"
        class="shadow-xl flex-1 px-4 py-2 m-2 font-bold text-white bg-blue-500 rounded-full mr-l hover:bg-blue-700"> Edit Game
    </a>
    <button
        class="shadow-xl flex-1 px-4 py-2 m-2 font-bold text-white bg-blue-500 rounded-full mr-l hover:bg-blue-700"
        @click="open = true"> Delete Game
    </button>

    <!-- Dialog (full screen) -->
    <div
        class="absolute top-0 left-0 flex items-center justify-center w-full h-full"
        style="background-color: rgba(0,0,0,.5);"
        x-show="open">
        <div
            class="h-auto p-4 mx-2 text-center bg-white rounded shadow-xl md:max-w-xl md:p-6 lg:p-8 md:mx-0"
            @click.away="open = false">
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3 class="text-lg text-center font-medium leading-6 text-gray-900"> Game Removal </h3>
                <div class="mt-2">
                    <p class="text-center text-sm leading-5 text-gray-500"> By clicking 'Confirm Removal' you will remove this record permanently </p>
                    <p class="text-center text-sm leading-5 text-gray-500"> Are you sure you want to continue? </p>
                </div>
            </div>
            <div class="mt-5 sm:mt-6">
                <span class="flex w-full rounded-md shadow-sm">
                    <button @click="open = false"
                        class="shadow-xl flex-1 px-3 py-2 m-2 font-bold text-white bg-blue-500 rounded-full mr-l hover:bg-blue-700">
                        Return
                    </button>
                    <button
                        class="shadow-xl flex-1 px-4 py-2 m-2 font-bold text-white bg-red-500 rounded-full mr-l hover:bg-red-700"
                        onclick ="window.location='{{route('remove', ['game' => $game])}}'">
                        &#9888; Confirm Removal
                    </button>
                </span>
            </div>
        </div>
    </div>
 </div>
</div>

@endsection
