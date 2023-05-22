@extends ('layouts.layout')

@section('content')
<div class="pt-4 mx-2 sm:mx-24">
    <div class="ml-2 mr-2 sm:mr-10 sm:ml-10 px-2 py-2 bg-[#D5C3ED] shadow-xl border border-indigo-200 rounded-xl">
        <div class="grid grid-cols-4 sm:grid-cols-4 bg-[#EBE2F6]">
            <div class="text-center underline">ID</div>
            <div class="text-center underline">Date</div>
            <div class="col-span-2 text-center underline">Armies</div>
        </div>

        @foreach ($games as $game)
        <a class="grid grid-cols-4 sm:grid-cols-4 text-center hover:text-gray-400 transition duration-150 ease-in-out" href="/games/{{$game->id}}">
            <div class="bg-[#EBE2F6]">
                <div class="">
                    {{ $game->id}}
                </div>
            </div>
            <div class="bg-[#EBE2F6]">
                <div class="">
                    {{$game->created_at->format('M, d, Y')}}
                </div>
            </div>
            <div class="col-span-2 bg-[#EBE2F6]"> 
                <div class="">
                    @if(\Illuminate\Support\Facades\App::isMobile())
                        {{ substr($game->player1_faction, 0, 3) }} vs {{ substr($game->player2_faction, 0, 3) }}
                    @else
                        {{$game->player1_faction}} vs {{$game->player2_faction}}
                    @endif
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection
