
            
<div id="page" class=" lg:flex lg:justify-left lg:mx-auto">
    <div id="content">
        <div class="box2"><div class='' x-data="{

                show: false,
                selection_deployment: '{{ old('deployment') ?? '' }}',
                deployments: [
                    {
                    name: 'CORE RULES 10th Edition',
                    options: [
                        'Search and Destroy',
                        'Dawn of War',
                        'Sweeping Engagement',
                        'Crucible of Battle',
                        'Hammer and Anvil',
                        'Tipping Point'
                        ]
                    },
                ],
                }"
                <br>



                <div class="w-auto">
                    <label class="flex-1 block mb-2 text-xs font-bold tracking-wide text-indigo-400 uppercase" for="grid-first-name">
                        Deployment
                    </label>
                    
                    <select class="px-4 py-2 border rounded" x-model="selection_deployment" name='deployment'>
                        <option value='option'>--</option>
                        <template x-for="deployment in deployments">
                            <optgroup :label="deployment.name">
                                <template x-for="item in deployment.options" :key="item">
                                    <option x-text="item" :value="item" :selected="item === selection_deployment"></option>
                                </template>
                            </optgroup>
                        </template>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>


