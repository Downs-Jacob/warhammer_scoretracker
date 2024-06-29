<div id="page" class="">
    <div id="content">
        <div class="box2">

              <div class='' x-data="{

                    show: false,
                    selection_scenario: '{{ old('scenario') ?? '' }}',
                    scenarios: [
                        {
                        name: 'CORE RULES 10th Edition',
                        options: [
                            'Burden of Trust',
                            'Linchpin',
                            'Purge the Foe',
                            'The Ritual',
                            'Scorched Earth',
                            'Supply Drop',
                            'Take and Hold',
                            'Terraform',
                            'Unexploded Ordinance',
                            ]
                        },
                    ],
                    }"
                  <br>



                <div class="w-auto">
                    <label class="flex-1 block mb-2 text-xs font-bold tracking-wide text-indigo-400 uppercase" for="grid-first-name">
                        primary mission
                    </label>
                    
                    <select class="px-4 py-2 border rounded" x-model="selection_scenario" name='scenario'>
                        <option value='option'>--</option>
                        <template x-for="scenario in scenarios">
                            <optgroup :label="scenario.name">
                                <template x-for="item in scenario.options" :key="item">
                                    <option x-text="item" :value="item" :selected="item === selection_scenario"></option>
                                </template>
                            </optgroup>
                        </template>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>




