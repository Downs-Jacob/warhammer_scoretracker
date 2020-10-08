@extends ('layouts\layout')

@section('header')

	<div id="page" class="container">
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

                  <div class='p-5' x-data="{
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
                        categories: [
                          {
                            name: 'PURGE',
                            options: [
                              'Assassinate',
                              'Bring it Down',
                              'Titan Slayers',
                              'Slay the Warlord'
                            ]
                          },
                          {
                            name: 'NO MERCY, NO RESPITE',
                            options: [
                              'Thin Their Ranks',
                              'Attrition',
                              'While We Stand We Fight',
                              'First Strike'
                            ]
                          },
                          {
                            name: 'BATTLEFIELD SUPREMACY',
                            options: [
                              'Engage on all Fronts',
                              'Linebreaker',
                              'Domination'
                            ]
                          },
                          {
                            name: 'SHADOW OPERATIONS',
                            options: [
                                'Investigate Sites',
                                'Repair Teleport Homer',
                                'Raise the Banners High'
                              ]
                          },
                          {
                            name: 'WARPCRAFT',
                            options: [
                                'Mental Interrogation',
                                'Psychic Ritual',
                                'Abhor the Witch'
                              ]
                          },
                          {
                            name: 'MISSION SPECIFIC',
                            options: [
                                'Surgical Assault',
                                'Survey',
                                'Encircle',
                                'Lines of Demarcation',
                                'Outflank',
                                'Center Ground',
                                'Forward Push',
                                'Ransack',
                                'Test Their Line',
                                'Minimise Loses',
                                'Vital Ground',
                                'Siphon Power',
                                'Secure No Mans Land',
                                'Raze',
                                'Data Intercept',
                                'Hold the Center',
                                'Surround Them',
                                'Search for the Portal'
                              ]
                          }
                        ],
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
                    <form action="/score" METHOD="POST" id="formid">
                      <div class="flex flex-wrap mb-6">
                        <div class="w-auto">
                          <label class="block mb-2 text-xs font-bold tracking-wide text-indigo-400 uppercase" for="grid-first-name">
                          scenario
                          </label>
                            <select class="px-4 py-2 border rounded" x-model="selection_scenario" name='scenario'>
                                <option value=''>--</option>
                                  <template x-for="scenario in scenarios">
                                    <optgroup :label="scenario.name">
                                      <template x-for="item in scenario.options" :key="item">
                                        <option x-text="item" :value="item"></option>
                                      </template>
                                    </optgroup>
                                  </template>
                            </select>
                        </div>
                      </div>
                      <div class="flex flex-wrap mb-6">
                        <div class="w-auto">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-indigo-400 uppercase border-blue-300">
                            Army name
                            </label>
                          <input class="block w-full px-4 py-3 mb-3 leading-tight text-indigo-400 bg-gray-100 border border-blue-500 rounded appearance-none focus:outline-none focus:bg-white" name='aname' type="text" placeholder="Army Name">
                        </div>
                        <div class="w-auto px-3">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-indigo-400 uppercase">
                            Player name
                            </label>
                            <input class="block w-full px-4 py-3 mb-3 leading-tight text-indigo-400 bg-gray-100 border border-blue-500 rounded appearance-none focus:outline-none focus:bg-white"  name='pname' type="text" placeholder="Player Name">
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
                        <input type="hidden" name="pScore" :value="primaryTotal()">
                      </div>
                    {<div>
                        <div class="w-full max-w-lg pb-4">
                          <div
                            class="flex justify-between my-4 mr-4 text-2xl text-indigo-400 border-b w-fullp-2 flex-between"
                          >
                            SECONDARY OBJECTIVES
                            <span x-text="getsecondaryTotal()" class="mr-2" name='secondaryscore'></span>
                          </div>
                          <div class="mt-4 text-base">
                            <div
                              class="flex justify-between w-full py-2 pb-4 border-b border-blue-800"
                            >
                              <select class="px-4 py-2 border rounded" x-model="selection_1">
                                <option value="">--</option>
                                <template x-for="category in categories">
                                  <optgroup :label="category.name">
                                    <template x-for="item in category.options" :key="item">
                                      <option x-text="item" :value="item"></option>
                                    </template>
                                  </optgroup>
                                </template>
                              </select>
                              <div class="flex items-center m-2">
                                <div class="px-4">
                                  <button
                                    class="px-4 py-3 mr-6 font-bold text-white bg-red-500 border border-blue-700 rounded hover:bg-red-600"
                                    @click.prevent="if(count>0) count--"
                                  ></button>
                                  <button
                                    class="px-4 py-3 mr-6 font-bold text-white bg-green-500 border border-blue-700 rounded hover:bg-green-600"
                                    @click.prevent="if(count<15)count++"
                                    @click.prevent="passvalues()"
                                  ></button>
                                </div>
                                <div x-text="count" class="w-8 pr-4 font-bold text-right" id="count"></div>
                              </div>
                            </div>
                          </div>
                          <div class="mt-4 text-base">
                            <div
                              class="flex justify-between w-full py-2 pb-4 border-b border-blue-800"
                            >
                              <select class="px-4 py-2 border rounded" x-model="selection_2">
                                <option value="">--</option>
                                <template x-for="category in categories">
                                  <optgroup :label="category.name">
                                    <template x-for="item in category.options" :key="item">
                                      <option x-text="item" :value="item"></option>
                                    </template>
                                  </optgroup>
                                </template>
                              </select>
                              <div class="flex items-center m-2">
                                <div class="px-4">
                                  <button
                                    class="px-4 py-3 mr-6 font-bold text-white bg-red-500 border border-blue-700 rounded hover:bg-red-600"
                                    @click.prevent="if(counta>0) counta--"
                                  ></button>
                                  <button
                                    class="px-4 py-3 mr-6 font-bold text-white bg-green-500 border border-blue-700 rounded hover:bg-green-600"
                                    @click.prevent="if(counta<15)counta++"
                                  ></button>
                                </div>
                                <div x-text="counta" class="w-8 pr-4 font-bold text-right" id="count"></div>
                              </div>
                            </div>
                          </div>
                          <div class="mt-4 text-base">
                            <div
                              class="flex justify-between w-full py-2 pb-4 border-b border-blue-800"
                            >
                              <select class="px-4 py-2 border rounded" x-model="selection_3">
                                <option value="">--</option>
                                <template x-for="category in categories">
                                  <optgroup :label="category.name">
                                    <template x-for="item in category.options" :key="item">
                                      <option x-text="item" :value="item"></option>
                                    </template>
                                  </optgroup>
                                </template>
                              </select>
                              <div class="flex items-center m-2">
                                <div class="px-4">
                                  <button
                                    class="px-4 py-3 mr-6 font-bold text-white bg-red-500 border border-blue-700 rounded hover:bg-red-600"
                                    @click.prevent="if(countb>0) countb--"
                                  ></button>
                                  <button
                                    class="px-4 py-3 mr-6 font-bold text-white bg-green-500 border border-blue-700 rounded hover:bg-green-600"
                                    @click.prevent="if(countb<15)countb++"
                                  ></button>
                                </div>
                                <div x-text="countb" class="w-8 pr-4 font-bold text-right" id="count"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="flex justify-between my-4 mr-4 text-2xl text-indigo-400 w-fullp-2 flex-between">
                        TOTAL
                        <label x-text="getTotal()" class="mr-2"></label>
                        <input type="hidden" name="tScore" :value="getTotal()">
                      </div>
                  </div>

                    <div class="flex items-center ml-8 mr-4">
                      <button type="submit" form="formid" value="Submit" class="flex-1 px-4 py-2 font-bold text-white bg-blue-500 rounded-full mr-l hover:bg-blue-700">
                      End This Game and Add to Archive
                      </button>
                    </div>
                </form>
                </div>
              </body>

				<div class="title">

				</div>
			</div>
		</div>

@endsection

@section ('content')



<div id="footer-wrapper">
	<div id="footer" class="container">

		<div id="box1">
			<div class="title">
				<h2>Latest Post</h2>
			</div>
		</div>
		<div id="box2">
			<div class="title">
				<h2>Popular Links</h2>
			</div>
			<ul class="style1">
				<li><a href="#">Semper mod quis eget mi dolore</a></li>
				<li><a href="#">Quam turpis feugiat sit dolor</a></li>
				<li><a href="#">Amet ornare in hendrerit in lectus</a></li>
				<li><a href="#">Consequat etiam lorem phasellus</a></li>
				<li><a href="#">Amet turpis, feugiat et sit amet</a></li>
				<li><a href="#">Semper mod quisturpis nisi</a></li>
			</ul>
		</div>
		<div id="box3">
			<div class="title">
				<h2>Follow Us</h2>
			</div>
			<p>Proin eu wisi suscipit nulla suscipit interdum. Aenean lectus lorem, imperdiet magna.</p>
			<ul class="contact">
				<li><a href="#" class="icon icon-twitter"><span>Twitter</span></a></li>
				<li><a href="#" class="icon icon-facebook"><span>Facebook</span></a></li>
				<li><a href="#" class="icon icon-dribbble"><span>Dribbble</span></a></li>
				<li><a href="#" class="icon icon-tumblr"><span>Tumblr</span></a></li>
				<li><a href="#" class="icon icon-rss"><span>Pinterest</span></a></li>
			</ul>
				<a href="#" class="button">Read More</a> </div>
		</div>
	</div>
</div>




@endsection
