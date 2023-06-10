<div class="text-base">
    <div class="flex justify-between items-center w-full">
        <div class="flex items-center">
            <label class="block md:pt-3 lg:pt-3 xl:pt-3 mb-2 text-medium font-bold tracking-wide text-indigo-400 uppercase" for="grid-grandstrat">
                Secondary
            </label>
        </div>
        <div class="flex items-center m-2">
            <div class="ml-2 lg:px-4 flex items-center">
                <button class="px-6 py-6 mr-2 lg:mr-4 font-bold text-white bg-red-500 border border-blue-700 rounded hover:bg-red-600"
                    @click.prevent="if({{$count_id}}>0) {{$count_id}}-=1">
                </button>
                <button class="px-6 py-6 mr-2 lg:mr-4 font-bold text-white bg-green-500 border border-blue-700 rounded hover:bg-green-600"
                    @click.prevent="if({{$count_id}}<25){{$count_id}}+=1"
                    @click.prevent="passvalues()">
                </button>
            </div>
            <div x-text="{{$count_id}}" class="w-8 pr-4 font-bold text-right" id="{{$count_id}}"></div>
        </div>
    </div>
</div>
