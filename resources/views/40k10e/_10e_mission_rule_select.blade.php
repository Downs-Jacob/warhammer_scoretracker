<div id="page" class=" lg:flex lg:justify-left lg:mx-auto">
    <div id="content">
        <div class="box2">

              <div class='' x-data="{

                    show: false,
                    selection_rule: '{{ old('rule') ?? '' }}',
                    rules: [
                        {
                        name: 'CORE RULES 10th Edition',
                        options: [
                            'Adapt of Die',
                            'Fog of War',
                            'Hidden Supplies',
                            'Inspired Leadership',
                            'Prepared Positions',
                            'Raise Banners',
                            'Rapid Escalation',
                            'Smoke and Mirrors',
                            'Stalwarts',
                            'Swift Action'
                            ]
                        },
                    ],
                    }"
                  <br>



                <div class="w-auto">
                    <label class="flex-1 block mb-2 text-xs font-bold tracking-wide text-indigo-400 uppercase" for="grid-first-name">
                        mission rule
                    </label>
                    
                    <select class="px-4 py-2 border rounded" x-model="selection_rule" name='rule'>
                        <option value='option'>--</option>
                        <template x-for="rule in rules">
                            <optgroup :label="rule.name">
                                <template x-for="item in rule.options" :key="item">
                                    <option x-text="item" :value="item" :selected="item === selection_rule"></option>
                                </template>
                            </optgroup>
                        </template>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>




