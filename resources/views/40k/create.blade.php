@include('40k._scenario_select')

@section('content')

    @if (auth()->check())
        @include('description')
    @endif

    @include('40k._player_layout', [
        'player' => 'player1',
        'player_army' => 'player1_army',
        'player_name' => 'player1_name',
        'player_primary' => 'player1_primary',
        'player_secondary' => 'player1_secondary',
        'player_score' => 'player1_score',
    ])

    @include('40k._player_layout', [
        'player' => 'player2',
        'player_army' => 'player2_army',
        'player_name' => 'player2_name',
        'player_primary' => 'player2_primary',
        'player_secondary' => 'player2_secondary',
        'player_score' => 'player2_score',
    ])

    <div class="container" style="margin-left: 10%">
        <div class="title">
            <div class="container flex items-center">
                <div class="flex items-center py-5 ml-8 mr-4">
                    <button type="submit" class="flex-1 px-4 py-2 font-bold text-white bg-[#5c2d69] rounded-full mr-l hover:bg-blue-700"
                            onclick="event.preventDefault(); validateForm();">
                        End This Game and Add to Archive
                    </button>
                </div>
            </div>
        </div>
    </div>
    </form>

    <script>
    function validateForm() {
        let scenario = document.getElementById('scenario-select').value;
        let description = document.getElementById('description').value;
        let player1Name = document.getElementById('player1_name').value;
        let player1SubFactions = document.getElementById('player1_sub_factions').value;
        let player2Name = document.getElementById('player2_name').value;
        let player2SubFactions = document.getElementById('player2_sub_factions').value;

        if (scenario === '' || description === '' || player1Name === '' || player1SubFactions === '' || player2Name === '' || player2SubFactions === '') {
            alert('Please make sure that the Scenario, Description, Player Faction, Player Names, and Sub Faction Names have all been added');
            return false;
        }

        document.getElementById('myForm').submit();
    }
    </script>
