<div id="page" class="flex wrap">
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

              <div class='border-8 border-gray-300 py-4 px-6 m-2' x-data="{
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
                        },{
                          primaries: {
                            hold: false,
                            hold_many: false,
                            hold_more: false
                            }
                          }
                      ],
                    show: false,
                    selection_scenario: null,
                    scenarios: [
                        {
                        name: 'COMBAT PATROL',
                        options: [
                            'Incisive Attack',
                            'Outriders',
                            'Encircle'
                            ]
                        },
                        {
                        name: 'INCURSION',
                        options: [
                          'Divide and Conquer',
                          'Crossfire',
                          'Center Ground',
                          'Forward Push',
                          'Ransack',
                          'Shifting Front'
                         ]
                        },
                        {
                          name:'STRIKE FORCE',
                          options: [
                          'Retrieval Mission',
                          'Front-line Warfare',
                          'The Four Pillars',
                          'No Mans Land',
                          'Scorched Earth',
                          'Vital Intelligence'
                         ]
                        }

                    ],

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





                  <div class="flex flex-wrap mb-6 mt-20">
                    <div class="w-auto">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-indigo-400 uppercase border-blue-300" name="army">
                        Player 2 Army
                        </label>
                      <input class="block w-full px-4 py-3 mb-3 leading-tight text-indigo-400 bg-gray-100 border border-blue-500 rounded appearance-none focus:outline-none focus:bg-white"
                            name='player2_army'
                            type="text"
                            placeholder="Army Name">
                    </div>
                    <div class="w-auto">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-indigo-400 uppercase" name="player">
                        Player 2 Name
                        </label>
                        <input class="block w-full px-4 py-3 mb-3 leading-tight text-indigo-400 bg-gray-100 border border-blue-500 rounded appearance-none focus:outline-none focus:bg-white"
                            name='player2_name'
                            type="text"
                            placeholder="Player Name">
                    </div>
                  </div>
                <br>
                <div class="grid bg-white turngrid">
                  <div class="text-xl font-bold text-center text-white bg-purple-500 border">Turn</div>
                  <div class="text-xl font-bold text-center text-white bg-purple-500 border">Hold</div>
                  <div class="text-xl font-bold text-center text-white bg-purple-500 border">Hold Many</div>
                  <div class="text-xl font-bold text-center text-white bg-purple-500 border">Hold More</div>
                  <div class="text-xl font-bold text-center text-white bg-purple-500 border">Total</div>
                </div>
                  <template x-for="(turn, index) in turns" :key="index">
                    <div class="grid turngrid">
                      <div class="p-2 text-center text-white bg-purple-500 border" x-text="index+1"></div>
                      <div class="p-2 text-center text-white border" @click="turn.primaries.hold = !turn.primaries.hold" :class="{
                          'bg-blue-400': turn.primaries.hold,
                          'bg-purple-500': !turn.primaries.hold
                        }"></div>
                      <div class="p-2 text-center text-white border" @click="turn.primaries.hold_many = !turn.primaries.hold_many" :class="{
                          'bg-blue-400': turn.primaries.hold_many,
                          'bg-purple-500': !turn.primaries.hold_many
                        }"></div>
                      <div class="p-2 text-center text-white border" @click="turn.primaries.hold_more = !turn.primaries.hold_more" :class="{
                          'bg-blue-400': turn.primaries.hold_more,
                          'bg-purple-500': !turn.primaries.hold_more
                        }"></div>
                      <div class="p-2 text-center text-white bg-purple-500 border" x-text="getprimaryTotal(turn);"></div>
                    </div>
                  </template>
                  <div class="flex justify-between my-4 mr-4 text-2xl text-indigo-400 w-fullp-2 flex-between">
                    PRIMARY TOTAL
                    <label x-text="primaryTotal()" class="mr-2"></label>
                    <input type="hidden" name="player2_primary" :value="primaryTotal()">
                  </div>
                <div>
                    <div class="w-full max-w-lg pb-4">
                      <div
                        class="flex justify-between my-4 mr-4 text-2xl text-indigo-400 border-b w-fullp-2 flex-between">
                        SECONDARY OBJECTIVES
                        <span x-text="getsecondaryTotal()" class="mr-2"></span>
                        <input type="hidden" name="player2_secondary" :value="getsecondaryTotal()">
                      </div>
                      @include("_category_select", ['categories'=>$categories, 'selection_id'=>'selection_1', 'count_id'=>"count"])
                      @include("_category_select", ['categories'=>$categories, 'selection_id'=>'selection_2', 'count_id'=>"counta"])
                      @include("_category_select", ['categories'=>$categories, 'selection_id'=>'selection_3', 'count_id'=>"countb"])
                      <input type="hidden" name="selection_1" :value="selection_1">
                    </div>
                  </div>
                <div class="flex justify-between my-4 mr-4 text-2xl text-indigo-400 w-fullp-2 flex-between">
                    TOTAL
                    <label x-text="getTotal()" class="mr-2"></label>
                    <input type="hidden" name="player2_score" :value="getTotal()">
                  </div>
              </div>
            </div>
          </body>
        </div>
