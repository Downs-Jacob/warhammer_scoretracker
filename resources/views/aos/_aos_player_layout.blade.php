<div id="page" class="xl:flex xl:flex-wrap ">
  
    <div id="content">
        <div class="mx-auto">
            <style>
                .turngrid {
                  grid-template-columns: 50px 1fr 1fr 1fr 1fr 50px;
                  grid-template-rows: 50px;
                  grid-gap: 3px;
                  margin-bottom: 3px;
                }

              </style>

              <div class='px-6 py-3 m-2 border-8 border-gray-300' x-data="{
                    getprimaryTotal(turn) {
                      let total = 0;
                      if (turn.primaries.hold) {
                        total += 1;
                      }
                      if (turn.primaries.hold_many) {
                        total += 1;
                      }

                      if (turn.primaries.hold_more) {
                        total += 1;
                      }
                      if (turn.primaries.battle_tactic) {
                        total += 2;
                      }
                      if (turn.primaries.grand_strat) {
                        total += 3;
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
                            hold_more: false,
                            battle_tactic: false
                          }
                        },{
                          primaries: {
                            hold: false,
                            hold_many: false,
                            hold_more: false,
                            battle_tactic: false
                          }
                        },{
                          primaries: {
                            hold: false,
                            hold_many: false,
                            hold_more: false,
                            battle_tactic: false
                          }
                        },{
                          primaries: {
                            hold: false,
                            hold_many: false,
                            hold_more: false,
                            battle_tactic: false
                          }
                        },{
                          primaries: {
                            hold:false,
                            hold_many:false,
                            hold_more:false,
                            battle_tactic:false
                          }

                          }
                      ],
                    show: false,


                    show: false,
                    selection_1: null,
                    selection_2: null,
                    selection_3: null,
                    selection_4: null,

                          count:0,
                          counta:0,
                          countb:0,
                          countc:0,
                          getsecondaryTotal() {
                              return this.count + this.counta + this.countb + this.countc;
                          },
                          getTotal() {
                            return this.primaryTotal() + this.getsecondaryTotal();
                        }
                    }"
                  <br>
                    @include('aos._aos_army_select')
                    @include("aos._aos_grandstrat_select")

                  <div class="flex md:flex-wrap mt-4 lg:flex-wrap mb-6 ">
                 
                    <div class="">
                    @if (auth()->check())
                    </div>
                    <div class="w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-indigo-400 uppercase" name="name">
                         {{$player}} name
                        </label>
                        <input class="block w-full px-4 py-3 mb-3 leading-tight text-indigo-400 bg-gray-100 border border-indigo-500 rounded appearance-none focus:outline-none focus:bg-white"
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
                  <div class="pt-3 text-xs md:text-xl xl:text-xl font-bold text-center text-white bg-yellow-500 border">Turn</div>
                  <div class="pt-3 text-xs md:text-xl xl:text-xl lg:text-xl font-bold text-center text-white bg-yellow-500 border">Hold</div>
                  <div class="pt-3 text-xs md:text-xl xl:text-xl lg:text-xl font-bold text-center text-white bg-yellow-500 border">Many</div>
                  <div class="pt-3 text-xs md:text-xl xl:text-xl lg:text-xl font-bold text-center text-white bg-yellow-500 border">More</div>
                  <div class="pt-3 text-xs md:text-xl xl:text-xl lg:text-xl font-bold text-center text-white bg-yellow-500 border">Tactic</div>
                  <div class="pt-3 text-xs md:text-xl xl:text-xl font-bold text-center text-white bg-yellow-500 border">Total</div>
                </div>
                  <template x-for="(turn, index) in turns" :key="index">
                    <div class="grid turngrid">
                      <div class="p-2 text-center text-white bg-yellow-500 border" x-text="index+1"></div>
                      <div class="p-2 text-center text-white border" @click="turn.primaries.hold = !turn.primaries.hold" :class="{
                          'bg-green-400': turn.primaries.hold,
                          'bg-yellow-500': !turn.primaries.hold
                        }"></div>
                      <div class="p-2 text-center text-white border" @click="turn.primaries.hold_many = !turn.primaries.hold_many" :class="{
                          'bg-green-400': turn.primaries.hold_many,
                          'bg-yellow-500': !turn.primaries.hold_many
                        }"></div>
                      <div class="p-2 text-center text-white border" @click="turn.primaries.hold_more = !turn.primaries.hold_more" :class="{
                          'bg-green-400': turn.primaries.hold_more,
                          'bg-yellow-500': !turn.primaries.hold_more
                        }"></div>
                      <div class="p-2 text-center text-white border" @click="turn.primaries.battle_tactic = !turn.primaries.battle_tactic" :class="{
                          'bg-green-500': turn.primaries.battle_tactic,
                          'bg-yellow-500': !turn.primaries.battle_tactic
                        }"></div>
                      <div class="p-2 text-center text-white bg-yellow-500 border" x-text="getprimaryTotal(turn);"></div>
                    </div>
                  </template>
                  
                <div>
                    <div class="w-full pb-4">
                        
                      <input type="hidden" name="selection_1" :value="selection_1">
                    </div>
                  </div>
                  @include("aos._grandstrat_success", ['categories'=>$categories, 'selection_id'=>'selection_1', 'count_id'=>"count"])
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
    