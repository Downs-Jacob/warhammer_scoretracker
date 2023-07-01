@extends ('layouts.layout')

@section('content')
<div class="pt-4 mx-2 sm:mx-24">
    <div class="ml-2 mr-2 sm:mr-10 sm:ml-10 px-2 py-2 bg-slate-300 shadow-xl border border-indigo-200 rounded-xl">
        <div class="grid grid-cols-4 sm:grid-cols-4 bg-slate-200">
            <div class="text-center underline">ID</div>
            <div class="text-center underline">Date</div>
            <div class="col-span-2 text-center underline">Armies</div>
        </div>

        @foreach ($tengames as $ten)
        <a class="grid grid-cols-4 sm:grid-cols-4 text-center hover:text-gray-400 transition duration-150 ease-in-out" href="/ten/{{$ten->id}}">
            <div class="bg-slate-200">
                <div class="">
                    {{$ten->id}}
                </div>
            </div>
            <div class="bg-slate-200">
                <div class="">
                    {{$ten->created_at->format('M, d, Y')}}
                </div>
            </div>
            <div class="col-span-2 bg-slate-200"> 
                <div class="">
                    {{$ten->player1_faction}} vs {{$ten->player2_faction}}
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection
