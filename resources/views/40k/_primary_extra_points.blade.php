<div class="mt-4 text-base">
    <div class="flex justify-between w-full py-2 pb-4 border-b border-blue-800">
        <label class="block md:pt-3 lg:pt-3 xl:pt-3 pt-4 mb-2 text-medium font-bold tracking-wide text-indigo-400 uppercase" for="grid-grandstrat">
        Extra Scenario Points
        </label>
          <div class="flex items-center m-2">
            <div class="ml-2 lg:px-4">
              <button
                class="px-4 py-3 mr-2 lg:mr-6 font-bold text-white bg-red-500 border border-blue-700 rounded hover:bg-red-600"
                @click.prevent="if({{$count_id}}>0) {{$count_id}}-=1"
              ></button>
              <button
                class="px-4 py-3 mr-2 lg:mr-6 font-bold text-white bg-green-500 border border-blue-700 rounded hover:bg-green-600"
                @click.prevent="if({{$count_id}}<25){{$count_id}}+=1"
                @click.prevent="passvalues()"
              ></button>
            </div>
            <div x-text="{{$count_id}}" class="w-8 pr-4 font-bold text-right" id="{{$count_id}}" ></div>
          </div>
        </div>
      </div>