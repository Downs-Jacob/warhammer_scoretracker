
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
                count1sa: 0,
                count1sb: 0,
                count1sc: 0,
                count2sa: 0,
                count2sb: 0,
                count2sc: 0,
                count3sa: 0,
                count3sb: 0,
                count3sc: 0,
                count4sa: 0,
                count4sb: 0,
                count4sc: 0,
                count5sa: 0,
                count5sb: 0,
                count5sc: 0,
              

                getsecondaryTotal() {
                    return this.count1sa + this.count1sb + this.count1sc + this.count2sa + this.count2sb + this.count2sc + this.count3sa + this.count3sb + this.count3sc + this.count4sa + this.count4sb + this.count4sc + this.count5sa + this.count5sb + this.count5sc;
                },
                getTotal() {
                    return this.getprimaryTotal() + this.getsecondaryTotal();
                }
            }">

              <div class="flex flex-col space-y-4">
                      @include('40k._faction_select')
                      @include('40k10e._10e_player_name')
                      <div class="flex justify-end">
                      <div class="flex justify-end">
                      <div class="flex justify-end">
             </div>
                      </div>

                      </div>

                  <div class="mb-10 justify-between my-4 mr-4 text-2xl w-fullp-2 flex-between border-b border-blue-800">
                      @include("40k10e._10e_point_counters", ['count_id'=>"counta", 'turn_id'=> "Turn 1"])
                    <label class="block mb-2 text-xs font-bold tracking-wide text-indigo-400 uppercase">
                      Turn 1 Secondaries
                      @include("40k10e._10e_secondary_counters", ['count_id'=>"count1sa", 'turn_id'=> "Turn 1"])
                      @include("40k10e._10e_secondary_counters", ['count_id'=>"count1sb", 'turn_id'=> "Turn 1"])
                      <!-- <div id="secondaryCountersContainer_{{$player}}"></div> -->
                    </label>
                  </div>
                  <div class="mb-10 justify-between my-4 mr-4 text-2xl w-fullp-2 flex-between border-b border-blue-800">
                      @include("40k10e._10e_point_counters", ['count_id'=>"countb", 'turn_id'=> "Turn 2"])
                    <label class="block mb-2 text-xs font-bold tracking-wide text-indigo-400 uppercase">
                      Turn 2 Secondaries
                      @include("40k10e._10e_secondary_counters", ['count_id'=>"count2sa", 'turn_id'=> "Turn 2"])
                      @include("40k10e._10e_secondary_counters", ['count_id'=>"count2sb", 'turn_id'=> "Turn 2"])
                    </label>
                  </div>
                  <div class="mb-10 justify-between my-4 mr-4 text-2xl w-fullp-2 flex-between border-b border-blue-800">
                      @include("40k10e._10e_point_counters", ['count_id'=>"countc", 'turn_id'=> "Turn 3"])
                    <label class="block mb-2 text-xs font-bold tracking-wide text-indigo-400 uppercase">
                      Turn 3 Secondaries
                      @include("40k10e._10e_secondary_counters", ['count_id'=>"count3sa", 'turn_id'=> "Turn 3"])
                      @include("40k10e._10e_secondary_counters", ['count_id'=>"count3sb", 'turn_id'=> "Turn 3"])
                    </label>
                  </div>
                  <div class="mb-10 justify-between my-4 mr-4 text-2xl w-fullp-2 flex-between border-b border-blue-800">
                      @include("40k10e._10e_point_counters", ['count_id'=>"countd", 'turn_id'=> "Turn 4"])
                    <label class="block mb-2 text-xs font-bold tracking-wide text-indigo-400 uppercase">
                      Turn 4 Secondaries
                      @include("40k10e._10e_secondary_counters", ['count_id'=>"count4sa", 'turn_id'=> "Turn 4"])
                      @include("40k10e._10e_secondary_counters", ['count_id'=>"count4sb", 'turn_id'=> "Turn 4"])
                    </label>
                  </div>
                  <div class="mb-10 justify-between my-4 mr-4 text-2xl w-fullp-2 flex-between border-b border-blue-800">
                      @include("40k10e._10e_point_counters", ['count_id'=>"counte", 'turn_id'=> "Turn 5"])
                    <label class="block mb-2 text-xs font-bold tracking-wide text-indigo-400 uppercase">
                      Turn 5 Secondaries
                      @include("40k10e._10e_secondary_counters", ['count_id'=>"count5sa", 'turn_id'=> "Turn 5"])
                      @include("40k10e._10e_secondary_counters", ['count_id'=>"count5sb", 'turn_id'=> "Turn 5"])
                    </label>
                  </div>

                  <!-- Primary Score -->
                  <div class="mb-10 flex justify-between my-4 mr-4 text-2xl text-indigo-400 w-fullp-2 flex-between border-b border-blue-800">
                    <span class="mr-auto">Primary Score</span>
                    <div class="flex items-center">
                        <label class="mr-2" x-text="getprimaryTotal()"></label>
                        <input type="hidden" :value="getprimaryTotal()">
                        <span>/ 50</span>
                    </div>
                  </div>

                  <!-- Secondary Score -->

                  <div class="mb-10 flex justify-between my-4 mr-4 text-2xl text-indigo-400 w-fullp-2 flex-between border-b border-blue-800">
                    <span class="mr-auto">Secondary Score</span>
                    <div class="flex items-center">
                        <label class="mr-2" x-text="getsecondaryTotal()"></label>
                        <input type="hidden" :value="getsecondaryTotal()">
                        <span>/ 40</span>
                    </div>
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

<!-- The below script is first attempt to dynamically add the third secondary -->
<!-- <script>
    // Other JavaScript code here

    function addSecondaryCounters(player) {
        // Find the container element where the secondary counters will be added
        const container = document.getElementById(`secondaryCountersContainer_${player}`);

        // Create a new div element to hold the secondary counters
        const newSecondaryCounters = document.createElement('div');

        // Generate the HTML code for the secondary counters
        const html = `@include("40k10e._10e_secondary_counters", ['count_id'=>"count1sc", 'turn_id'=> "Turn 1"])`;

        // Set the HTML code as the content of the new div element
        newSecondaryCounters.innerHTML = html;

        // Append the new div element to the container
        container.appendChild(newSecondaryCounters);
    }
</script> -->


