
              <div class='' x-data="{

                    show: false,
                    selection_faction: '{{ old($player.'_faction') ?? '' }}',
                    factions: [
                      {
                        name: 'SPACE MARINES',
                        options: [
                          'Black Templar',
                          'Blood Angels',
                          'Dark Angels',
                          'Deathwatch',
                          'Grey Knights',
                          'Imperial Fists',
                          'Iron Hands',
                          'Raven Guard',
                          'Salamanders',
                          'Space Wolves',
                          'Ultramarines',
                          'White Scars'
                          ]
                      },
                      {
                        name: 'ARMIES OF THE IMPERIUM',
                        options: [
                          'Adepta Sororitas',
                          'Adeptus Custodes',
                          'Adeptus Mechanicus',
                          'Astra Militarum',
                          'Imperial Knights',
                          'Inquisition',
                          'Leagues of Votann',
                          'Officio Assassinorum',
                          'Sisters of Silence'
                          ]
                      },
                      {
                        name: 'ARMIES OF CHAOS',
                        options: [
                          'Chaos Daemons',
                          'Chaos Knights',
                          'Chaos Space Marines',
                          'Death Guard',
                          'Thousand Sons'
                          ]
                      },
                      {
                        name: 'XENOS ARMIES',
                        options: [
                          'Craftworlds',
                          'Drukhari',
                          'Genestealer Cults',
                          'Harlequins',
                          'Necrons',
                          'Orks',
                          'Tau Empire',
                          'Tyranids',
                          'Ynnari'
                          ]
                      }
                      
                  ],
              }"
                  <br>

                 
    <div class="w-auto">
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
    </div>
</div>

