<div class='' x-data="{
  show: false,
  selection_secondary: '{{ old($player.'_secondary') ?? '' }}',
  secondarys: [
    {
      name: '10th Edition CORE RULEBOOK',
      options: [
        'Behind Enemy Lines',
        'Assassination',
        'Bring it Down',
        'Engage on All Fronts',
        'Storm Hostile Objectibe',
        'Cleanse',
        'Deploy Teleport Homer',
        'Investigate Signals',
        'No Prisoners',
        'Extend Battlelines',
        'Defend Stronghold',
        'Overwhelming Force',
        'Secure No Mans Land',
        'Area Denial',
        'A Tempting Target',
        'Capturing Enemy Outpost'
      ]
    }
  ]
}">
  <div class="flex items-center">
    <div class="w-full">
      <select class="py-2 border rounded sm:w-auto text-xs" x-model="selection_secondary" name='{{$player}}_secondary'>
        <option value="">--</option>
        <template x-for="secondary in secondarys">
          <optgroup :label="secondary.name">
            <template x-for="item in secondary.options" :key="item">
              <option x-text="item" :value="item"></option>
            </template>
          </optgroup>
        </template>
      </select>
    </div>
  </div>
</div>
