
@if ($errors->any())
        <p class="text-center mt-2 text-xs text-red-500">{{ "Please make sure that the Scenario, Point Limit, and Player Faction Names, and Player Names have all been added" }}</p>
    @endif

    <div id="page" class="sm:flex items-center justify-center">
        <div id="content" class="mx-auto">
            <div class="px-6 py-3 m-2 border-8 border-gray-300" x-data="{
                show: false,
                selection_1: null,
                selection_2: null,
                selection_3: null,
                selection_4: null,
                count: 0,
                counta: 0,
                countb: 0,
                countc: 0,
                countd: 0,
                counte: 0,
                getprimaryTotal() {
                    return this.count + this.counta + this.countb + this.countc + this.countd + this.counte;
                },
                countf: 0,
                countg: 0,
                getsecondaryTotal() {
                    return this.countf + this.countg;
                },
                getTotal() {
                    return this.getprimaryTotal() + this.getsecondaryTotal();
                }
            }">

                <div class="flex flex-col space-y-4">
                    @include('40k._faction_select')
                    @include('40k10e._10e_player_name')

                    @include("40k10e._10e_point_counters", ['count_id'=>"counta", 'turn_id'=> "Turn 1"])
                    @include("40k10e._10e_point_counters", ['count_id'=>"countb", 'turn_id'=> "Turn 2"])
                    @include("40k10e._10e_point_counters", ['count_id'=>"countc", 'turn_id'=> "Turn 3"])
                    @include("40k10e._10e_point_counters", ['count_id'=>"countd", 'turn_id'=> "Turn 4"])
                    @include("40k10e._10e_point_counters", ['count_id'=>"counte", 'turn_id'=> "Turn 5"])

                    <!-- Primary Score -->
                    <div class="mb-10 flex justify-between my-4 mr-4 text-2xl text-indigo-400 w-fullp-2 flex-between border-b border-blue-800">
                        Primary Score
                        <label x-text="getprimaryTotal()" class="mr-2"></label>
                        <input type="hidden" :value="getprimaryTotal()">
                    </div>
                    <!-- Secondary Score -->
                    @include("40k10e._10e_secondary_counters", ['count_id'=>"countf"])
                    @include("40k10e._10e_secondary_counters", ['count_id'=>"countg"])
                    <div class="mb-10 flex justify-between my-4 mr-4 text-2xl text-indigo-400 w-fullp-2 flex-between border-b border-blue-800">
                      Secondary Score
                      <label x-text="getsecondaryTotal()" class="mr-2"></label>
                      <input
                          type="hidden"
                          :value="getsecondaryTotal()">
                    </div>
                    <!-- Total Score -->
                    <div class="flex justify-between my-4 mr-4 text-2xl text-indigo-400 w-fullp-2 flex-between">
                      TOTAL
                      <label x-text="getTotal()" class="mr-2"></label>
                      <input
                        type="hidden"
                        name="{{$player_score}}"
                        :value="getTotal()">
                    </div>
              </div>
            </div>
        
          </body>
</div>

    