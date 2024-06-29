<div class='' x-data="{
  show: false,
  selection_secondary: '{{ old($player.'_secondary') ?? '' }}',
  secondarys: [
    {
      name: '10th Edition CORE RULEBOOK',
      options: [
        'Area Denial',
        'Assassination',
        'Behind Enemy Lines',
        'Bring it Down',
        'Cleanse',
        'Command Insertion',
        'Defend Stronghold',
        'Containment',
        'Cull the Horde',
        'Engage on All Fronts',
        'Establish Locus',
        'Extend Battlelines',
        'Marked for Death',
        'No Prisoners',
        'Overwhelming Force',
        'Recover Assets',
        'Sabatoge',
        'Secure No Man's Land',
        'Shatter Cohesion',
        'Storm Hostile Objective',
        'Unbroken Wall',
        'War of Attrition'


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
