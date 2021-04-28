@extends ('layouts.layout')

@section('content')
<div class="flex container py-6 justify-center">
    <div class="text-center px-2 py-2 bg-blue-200 shadow-xl  border border-indigo-200 rounded-xl">
      <div class="grid grid-cols-3 bg-blue-100 ">
        <div class="flex-1">ID</div>
        <div class="flex-1 col-span-2">Date</div>
      </div>

                @foreach ($games as $game)

                    <a class="flex hover:text-white transition duration-150 ease-in-out" href="/games/{{$game->id}}">
                        <div class="bg-blue-100">
                            <div class="ml-5 px-2 w-8 ">
                                {{ $game->id}}
                            </div>
                        </div>
                        <div class="bg-blue-100">
                            <div class="px-2 ml-2 w-40">
                                {{$game->created_at->format('M, d, Y')}}
                            </div>
                        </div>
                    </a>


                @endforeach

        </div>
    </div>
</div>
@endsection
