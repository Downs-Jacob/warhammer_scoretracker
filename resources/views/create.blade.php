@extends ('layouts\layout')

@section('content')
<div>
<form action="/create" METHOD="POST" id="formid">
    @csrf
    @include("player1")
    @include("player2")
</form>
</div>


@endsection

