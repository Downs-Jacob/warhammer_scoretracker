<div class="w-full">
    @if (auth()->check())
        <label class="block mb-2 text-xs font-bold tracking-wide text-indigo-400 uppercase" name="name">
            {{$player}} name
        </label>
        <input class="block w-full px-4 py-3 mb-3 leading-tight text-indigo-400 bg-gray-100 border border-indigo-500 rounded appearance-none focus:outline-none focus:bg-white"
            name='{{$player_name}}'
            type="text"
            placeholder="{{$player}} name"
            value="{{ old($player_name) }}"/>
    @endif
</div>