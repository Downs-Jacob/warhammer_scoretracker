<div class="text-base">
    <div class="flex justify-between w-full">
        <div class="flex items-center">
            <label class="block md:pt-3 lg:pt-3 xl:pt-3 mb-2 text-medium font-bold tracking-wide text-indigo-400 uppercase" for="grid-grandstrat">
                @include("40k10e._10e_secondary_select")
            </label>
        </div>
        <div class="flex items-center m-2">
            <div class="ml-2 lg:px-4 flex flex-wrap">
                <button class="flex-grow-0 flex-shrink-0 px-3 py-3 mr-1 lg:mr-2 font-bold text-white bg-indigo-500 border border-blue-700 rounded hover:bg-indigo-600 sm:px-6 sm:py-6 sm:mr-2 relative"
                    @click.prevent="if({{$count_id}}>0) {{$count_id}}-=1">
                    <span class="absolute inset-0 flex items-center justify-center">-</span>
                </button>
                <button class="flex-grow-0 flex-shrink-0 px-3 py-3 mr-1 lg:mr-2 font-bold text-white bg-slate-500 border border-blue-700 rounded hover:bg-slate-600 sm:px-6 sm:py-6 sm:mr-2 relative"
                    @click.prevent="if({{$count_id}}<25){{$count_id}}+=1"
                    @click.prevent="passvalues()">
                    <span class="absolute inset-0 flex items-center justify-center">+</span>
                </button>
            </div>
            <div x-text="{{$count_id}}" class="w-8 pr-4 font-bold text-right" id="{{$count_id}}"></div>
        </div>
    </div>
</div>
