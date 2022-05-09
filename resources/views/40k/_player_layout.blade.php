<div id="page" class="xl:flex xl:flex-wrap ">
  
    <div id="content">
        <div class="mx-auto">
            <style>
                .turngrid {
                  grid-template-columns: 50px 1fr 1fr 1fr 50px;
                  grid-template-rows: 50px;
                  grid-gap: 3px;
                  margin-bottom: 3px;
                }

              </style>

              <div class='px-6 py-3 m-2 border-8 border-gray-300' x-data="{
                    getprimaryTotal(turn) {
                      let total = 0;
                      if (turn.primaries.hold) {
                        total += 5;
                      }
                      if (turn.primaries.hold_many) {
                        total += 5;
                      }

                      if (turn.primaries.hold_more) {
                        total += 5;
                      }
                      return total;
                    },
                    primaryTotal() {
                      let total = 0;
                        this.turns.map((turn) => {
                        total += this.getprimaryTotal(turn);
                      })
                      return total;
                    },

                    turns: [
                        {
                         
                          primaries: {
                            hold: false,
                            hold_many: false,
                            hold_more: false
                          }
                        },{
                          primaries: {
                            hold: false,
                            hold_many: false,
                            hold_more: false
                          }
                        },{
                          primaries: {
                            hold: false,
                            hold_many: false,
                            hold_more: false
                          }
                        },{
                          primaries: {
                            hold: false,
                            hold_many: false,
                            hold_more: false
                            }
                          }
                      ],
                    show: false,


                    show: false,
                    selection_1: null,
                    selection_2: null,
                    selection_3: null,

                          count:0,
                          counta:0,
                          countb:0,
                          getsecondaryTotal() {
                              return this.count + this.counta + this.countb;
                          },
                          getTotal() {
                            return this.primaryTotal() + this.getsecondaryTotal();
                        }
                    }"
                  <br>
                    @include('40k._faction_select')

                  <div class="flex md:flex-wrap mt-4 lg:flex-wrap mb-6 ">
                 
                    <div class="w-1/2">
                    @if (auth()->check())
                        <label class="block mb-2 text-xs font-bold tracking-wide text-indigo-400 uppercase border-blue-300" name="army">
                         Sub-Faction
                        </label>
                        
                      <input class="block w-full px-4 py-3 mb-3 leading-tight text-indigo-400 bg-gray-100 border border-blue-500 rounded appearance-none focus:outline-none focus:bg-white"
                            name='{{$player_army}}'
                            type="text"
                            placeholder="sub-faction name"
                            value="{{ old($player_army) }}"
                            >
                    
                    
                    </div>
                    <div class="w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-indigo-400 uppercase" name="name">
                         {{$player}} name
                        </label>
                        <input class="block w-full px-4 py-3 mb-3 leading-tight text-indigo-400 bg-gray-100 border border-blue-500 rounded appearance-none focus:outline-none focus:bg-white"
                            name='{{$player_name}}'
                            type="text"
                            placeholder="{{$player}} name"
                            value="{{ old($player_name) }}"
                            >
                    @endif
                    </div>
                    
                  </div>
                <br>
                <div class="grid bg-white turngrid">
                  <div class="text-xl font-bold text-center text-white bg-[#5c2d69] border">Turn</div>
                  <div class="text-xl font-bold text-center text-white bg-[#5c2d69] border">Hold</div>
                  <div class="text-xl font-bold text-center text-white bg-[#5c2d69] border">Many</div>
                  <div class="text-xl font-bold text-center text-white bg-[#5c2d69] border">More</div>
                  <div class="text-xl font-bold text-center text-white bg-[#5c2d69] border">Total</div>
                </div>
                  <template x-for="(turn, index) in turns" :key="index">
                    <div class="grid turngrid">
                      <div class="p-2 text-center text-white bg-[#5c2d69] border" x-text="index+2"></div>
                      <div class="p-2 text-center text-white border" @click="turn.primaries.hold = !turn.primaries.hold" :class="{
                          'bg-blue-400': turn.primaries.hold,
                          'bg-[#5c2d69]': !turn.primaries.hold
                        }"></div>
                      <div class="p-2 text-center text-white border" @click="turn.primaries.hold_many = !turn.primaries.hold_many" :class="{
                          'bg-blue-400': turn.primaries.hold_many,
                          'bg-[#5c2d69]': !turn.primaries.hold_many
                        }"></div>
                      <div class="p-2 text-center text-white border" @click="turn.primaries.hold_more = !turn.primaries.hold_more" :class="{
                          'bg-blue-400': turn.primaries.hold_more,
                          'bg-[#5c2d69]': !turn.primaries.hold_more
                        }"></div>
                      <div class="p-2 text-center text-white bg-[#5c2d69] border" x-text="getprimaryTotal(turn);"></div>
                    </div>
                  </template>
                  <div class="flex justify-between my-4 mr-4 text-xl lg:text-2xl text-indigo-400 w-fullp-2 flex-between">
                    PRIMARY TOTAL
                    <label x-text="primaryTotal()" class="mr-2"></label>
                    <input
                        type="hidden"
                        name='{{$player_primary}}'
                        :value="primaryTotal()">
                  </div>
                <div>
                    <div class="w-full pb-4">
                      <div
                        class="flex text-xl justify-between my-4 mr-4 lg:text-2xl text-indigo-400 border-b w-fullp-2 flex-between">
                        SECONDARY OBJECTIVES
                        <span x-text="getsecondaryTotal()" class="mr-2"></span>
                        <input
                            type="hidden"
                            name="{{$player_secondary}}"
                            :value="getsecondaryTotal()">
                      </div>
                        @include("40k._category_select", ['categories'=>$categories, 'selection_id'=>'selection_1', 'count_id'=>"count"])
                        @include("40k._category_select", ['categories'=>$categories, 'selection_id'=>'selection_2', 'count_id'=>"counta"])
                        @include("40k._category_select", ['categories'=>$categories, 'selection_id'=>'selection_3', 'count_id'=>"countb"])
                      <input type="hidden" name="selection_1" :value="selection_1">
                    </div>
                  </div>
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
    