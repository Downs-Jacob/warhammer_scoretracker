<div id="page" class=" lg:flex lg:justify-center lg:mx-auto">
    <div id="content">
        <div class="box2">
            <style>
                .turngrid {
                  grid-template-columns: 50px 1fr 1fr 1fr 50px;
                  grid-template-rows: 50px;
                  grid-gap: 3px;
                  margin-bottom: 3px;
                }

              </style>

                    <div class='px-6 py-3 m-2 border-8 border-gray-300' x-data="{
                        show: false,
                        selection_scenario: '{{ old('scenario') ?? '' }}',
                        scenarios: [
                            {
                                name:'2023 GENERALS HANDBOOK',
                                options: [
                                    'Border War',
                                    'Focal Points',
                                    'Starstrike',
                                    'Shifting Objectives',
                                    'Feral Foray',
                                    'The Jaws of Gallet',
                                    'Battle For the pass',
                                    'Scorched Earth',
                                    'The Better Part of Valour',
                                    'The Vice',
                                    'Close to the Chest',
                                    'Limited Resources'
                                    
                                ]
                            }
                        ]
                    }">
                        <br>


                    <div class="grid grid-cols-2 w-auto">
                        <label class="mr-2 flex-1 block mb-2 text-xs font-bold tracking-wide text-indigo-400 uppercase" for="grid-first-name">
                            scenario
                        </label>

                        <label class="mr-2 flex-1 block mb-2 text-xs font-bold tracking-wide text-indigo-400 uppercase" for="grid-first-name">
                            point limit
                        </label>
                        
                        <select class="mr-2 px-4 py-2 border rounded" x-model="selection_scenario" name='scenario'>
                            <option value='option'>--</option>
                            <template x-for="scenario in scenarios">
                                <optgroup :label="scenario.name">
                                    <template x-for="item in scenario.options" :key="item">
                                        <option x-text="item" :value="item" :selected="item === selection_scenario"></option>
                                    </template>
                                </optgroup>
                            </template>
                        </select>

                        <input class="mr-2 block w-full px-4 py-3 leading-tight text-indigo-400 bg-gray-100 border border-blue-500 rounded appearance-none focus:outline-none focus:bg-white"
                        name='pointlimit'
                        type="text"
                        placeholder="750 - 2000"
                        value="{{ old('pointlimit') }}"
                        >

                        

                    </div>
                  </div>


