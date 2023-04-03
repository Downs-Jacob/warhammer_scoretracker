
              <div class='' x-data="{

show: false,
selection_faction: '{{ old($player.'_faction') ?? '' }}',
factions: [
  {
    name: 'ORDER',
    options: [
      'Cities of Sigmar',
      'Daughters of Khaine',
      'Fyreslayers',
      'Idoneth Deepkin',
      'Kharadron Overlords',
      'Lumineth Realm Lords',
      'Seraphon',
      'Stormcast Eternals',
      'Sylvaneth'
      ]
  },
  {
    name: 'CHAOS',
    options: [
      'Beasts of Chaos',
      'Blades of Khorne',
      'Disciples of Tzeentch',
      'Hedonites of Slaanesh',
      'Maggotkin of Nurgle',
      'Skaven',
      'Slaves to Darkness'
      ]
  },
  {
    name: 'DEATH',
    options: [
      'Flesh-eater Courts',
      'Nighthaunt',
      'Ossiarch Bonereapers',
      'Soulblight Gravelords'
      ]
  },
  {
    name: 'DESTRUCTION',
    options: [
      'Gloomspite Gitz',
      'Ogor Mawtribes',
      'Orruk Warclans',
      'Sons of Behmat'
      ]
  }
  
],
}"
<br>

<div class="w-full mb-2">
    <label class="flex-1 block mb-2 text-xs font-bold tracking-wide text-indigo-400 uppercase" for="grid-first-name">
      {{$player}} Faction
    </label>
    <select class="px-4 py-2 border rounded" x-model="selection_faction" name='{{$player}}_faction'>
        <option value=''>--</option>
        <template x-for="faction in factions">
            <optgroup :label="faction.name">
                <template x-for="item in faction.options" :key="item">
                    <option x-text="item" :value="item" :selected="item === selection_faction"></option>
                </template>
            </optgroup>
        </template>
    </select>
    <label>

</div>
</div>


