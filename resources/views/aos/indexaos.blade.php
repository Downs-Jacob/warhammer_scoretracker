@extends ('layouts.layout')

@section('content')
<div class="pt-4 mx-24 large:mr-20 large:ml-20">
    <div class="ml-10 mr-10 px-2 py-2 bg-yellow-200 shadow-xl border border-indigo-200 rounded-xl">
      <div class="grid grid-cols-4 bg-yellow-100 ">
        <div class="text-center underline">ID</div>
        <div class="text-center underline">Date</div>
        <div class="col-span-2 text-center underline">Armies</div>
      </div>

@foreach ($aosgames as $aosgame)


<a class="grid grid-cols-4 text-center hover:text-gray-400 transition duration-150 ease-in-out" href="/aos/{{$aosgame->id}}">
    <div class="bg-yellow-100">
        <div class="">
            {{ $aosgame->id}}
    </div>
    <div class="bg-yellow-100">
        <div class="">
            {{$aosgame->created_at->format('M, d, Y')}}
        </div>
    </div>
    <div class="col-span-2 bg-yellow-100"> 
        <div class="">
            {{$aosgame->player1_faction}} vs {{$aosgame->player2_faction}}
        </div>
    </div>
</a>


@endforeach

        </div>
    </div>
</div>
@endsection