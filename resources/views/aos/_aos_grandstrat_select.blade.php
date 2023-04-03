<div class='' x-data="{
  show: false,
  selection_grandstrat: '{{ old($player.'grandstrat') ?? '' }}',
  grandstrats: [
    {
      name: 'GENERALS HANDBOOK 2023',
      options: [
        'Tame the Land',
        'Defend Whats Ours',
        'Take Whats Theirs',
        'Stake a Claim',
        'Survivors Instinct',
        'The Day is Ours',
        'Army Specific'
      ]
    }
  ]
}">
  <div class="w-full">
    <label class="block mb-2 text-xs font-bold tracking-wide text-indigo-400 uppercase" for="grid-grandstrat">
      {{$player}} grandstrat
    </label>
    <select class="px-4 py-2 border rounded" x-model="selection_grandstrat" name='{{$player}}_grandstrat'>
      <option value="option">--</option>
      <template x-for="grandstrat in grandstrats">
        <optgroup :label="grandstrat.name">
          <template x-for="item in grandstrat.options" :key="item" :selected="item === selection_grandstrat">
            <option x-text="item" :value="item"></option>
          </template>
        </optgroup>
      </template>
    </select>
  </div>
</div>
