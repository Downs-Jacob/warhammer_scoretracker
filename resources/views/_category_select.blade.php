
<div class="mt-4 text-base">
    <div class="flex justify-between w-full py-2 pb-4 border-b border-blue-800">
        <select class="px-4 py-2 border rounded" x-model="{{$selection_id}}">
            <option value="">--</option>
            @foreach($categories as $category)
                <optgroup label="{{$category['name']}}">
                    @foreach($category['options'] as $option)
                        <option value="{{$option}}">{{$option}}</option>
                    @endforeach
                </optgroup>
            @endforeach
        </select>
          <div class="flex items-center m-2">
            <div class="px-4">
              <button
                class="px-4 py-3 mr-6 font-bold text-white bg-red-500 border border-blue-700 rounded hover:bg-red-600"
                @click.prevent="if({{$count_id}}>0) {{$count_id}}--"
              ></button>
              <button
                class="px-4 py-3 mr-6 font-bold text-white bg-green-500 border border-blue-700 rounded hover:bg-green-600"
                @click.prevent="if({{$count_id}}<15){{$count_id}}++"
                @click.prevent="passvalues()"
              ></button>
            </div>
            <div x-text="{{$count_id}}" class="w-8 pr-4 font-bold text-right" id="{{$count_id}}"></div>
          </div>
        </div>
      </div>

