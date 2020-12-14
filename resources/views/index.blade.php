@extends ('layouts.layout')

@section('content')

    @foreach ($games as $game)
        <div class="content">
            <div class="id">
                <h2>
                    <a href="/games/{{ $game->id }}">
                        {{ $game->id }} : {{$game->created_at}}
                    </a>
                </h2>
            </div>
        </div>
    @endforeach

@endsection
