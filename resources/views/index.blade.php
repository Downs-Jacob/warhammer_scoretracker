@extends ('layouts.layout')

@section('content')
<div class="pt-4 mx-24 large:mr-20 large:ml-20">
    <div class="ml-10 mr-10 px-2 py-2 bg-blue-200 shadow-xl border border-indigo-200 rounded-xl">
      <div class="grid grid-cols-4 bg-blue-100 ">
        <div class="text-center underline">ID</div>
        <div class="text-center underline">Date</div>
        <div class="col-span-2 text-center underline">Armies</div>
      </div>
     

                @foreach ($games as $game)

                    <a class="grid grid-cols-4 text-center hover:text-gray-400 transition duration-150 ease-in-out" href="/games/{{$game->id}}">
                        <div class="bg-blue-100">
                            <div class="">
                                {{ $game->id}}
                            </div>
                        </div>
                        <div class="bg-blue-100">
                            <div class="">
                                {{$game->created_at->format('M, d, Y')}}
                            </div>
                        </div>
                        <div class="col-span-2 bg-blue-100"> 
                            <div class="">
                                {{$game->player1_faction}} vs {{$game->player2_faction}}
                            </div>
                        </div>
                    </a>


                @endforeach

        </div>
    </div>
</div>
@endsection
