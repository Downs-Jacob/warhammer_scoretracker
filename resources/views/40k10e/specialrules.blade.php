@extends('layouts.layout')

@section('content')

<div class="container mx-auto px-4" x-data="{
    search: '',
    keywords: [
        { term: 'Anti', definition: 'An unmodified Wound roll of x+ against a target with the matching keyword scores a Critical Wound.' },
        { term: 'Assault', definition: 'Can be shot even if the bearers unit Advanced.' },
        { term: 'Benefits of Cover', definition: 'Add 1 to armour saving throws against ranged attacks. Does not apply to models with a Save of 3+ or better against attacks with an AP of 0. Multiple instances are not cumulative.' },
        { term: 'Big Guns Never Tire', definition: 'can shoot, and be shot at, even while they are within Engagement Range of enemy units. Each time a ranged attack is made by or against such a unit, subtract 1 from that attacks Hit roll, unless shooting with a Pistol.' },
        { term: 'Blast', definition: 'Add 1 to the Attacks characteristic for every five models in the target unit (rounding down). Can never be used against a target that is within Engagement Range of any units from the attacking models army (including its own).' },
        { term: 'Command Reroll', definition: '1CP, WHEN: In any phase, just after you have made a Hit roll, a Wound roll, a Damage roll, a saving throw, an Advance roll, a Charge roll, a Desperate Escape test, a Hazardous test, or just after you have rolled the dice to determine the number of attacks made with a weapon, for an attack, model or unit from your army. EFFECT: You re-roll that roll, test or saving throw.' },
        { term: 'Counter Offensive', definition: '2CP, WHEN: Fight phase, just after an enemy unit has fought. TARGET: One unit from your army that is within Engagement Range of one or more enemy units and that has not already been selected to fight this phase. EFFECT: Your unit fights next.' },
        { term: 'Critical Hit', definition: 'Unmodified Hit roll of 6. Always successful.' },
        { term: 'Critical Wound', definition: 'Unmodified Wound roll of 6. Always successful.' },
        { term: 'Deadly Demise x', definition: 'When this model is destroyed, roll one D6. On a 6, each unit within 6 suffers x mortal wounds.' },
        { term: 'Deep Strike', definition: 'Unit can be set up in Reserves instead of on the battlefield. Unit can be set up in your Reinforcements step, more than 9 inches horizontally away from all enemy models.' },
        { term: 'Devastating Wounds', definition: 'Each time an attack is made with such a weapon, if that attack scores a Critical Wound, no saving throw of any kind can be made against that attack (including invulnerable saving throws). Such attacks are only allocated to models after all other attacks made by the attacking unit have been allocated and resolved.' },
        { term: 'Engagement Range', definition: 'Within 1 inch horizontally and 5 inches vertically. Models cannot be set up or end a Normal, Advance or Fall Back move within Engagement Range of any enemy models.' },
        { term: 'Epic Challenge', definition: 'WHEN: Fight phase, when a Character unit from your army that is within Engagement Range of one or more Attached units is selected to fight. TARGET: One Character model in your unit. EFFECT: Until the end of the phase, all melee attacks made by that model have the [PRECISION] ability (pg 26).' },
        { term: 'Extra Attacks', definition: 'The bearer can attack with this weapon in addition to any other weapons it can make attacks with.' },
        { term: 'Feel No Pain x+', definition: 'Each time this model would lose a wound, roll one D6: if the result equals or exceeds x, that wound is not lost.' },
        { term: 'Fight First', definition: 'Units with this ability that are eligible to fight do so in the Fights First step, provided every model in the unit has this ability. starting with the player whose turn is not taking place' },
        { term: 'Firing Deck x', definition: 'Each time this Transport shoots, select one weapon from up to x models embarked within it - this Transport counts as being equipped with those weapons as well.' },
        { term: 'Grenade', definition: '1CP, WHEN: Your Shooting phase. TARGET: One Grenades unit from your army that is not within Engagement Range of any enemy units and has not been selected to shoot this phase. EFFECT: Select one enemy unit that is not within Engagement Range of any units from your army and is within 8 inches of and visible to your Grenades unit. Roll six D6: for each 4+, that enemy unit suffers 1 mortal wound.' },
        { term: 'Go to Ground', definition: '1CP, WHEN: Your opponents Shooting phase, just after an enemy unit has selected its targets. TARGET: One Infantry unit from your army that was selected as the target of one or more of the attacking units attacks. EFFECT: Until the end of the phase, all models in your unit have a 6+ invulnerable save and have the Benefit of Cover (pg 44).' },
        { term: 'Heavy', definition: 'Add 1 to Hit rolls if the bearers unit Remained Stationary this turn.' },
        { term: 'Heroic Intervention', definition: '1CP, WHEN: Your opponents Charge phase, just after an enemy unit ends a Charge move. TARGET: One unit from your army that is within 6 inches of that enemy unit and would be eligible to declare a charge against that enemy unit if it were your Charge phase. EFFECT: Your unit now declares a charge that targets only that enemy unit, and you resolve that charge as if it were your Charge phase. RESTRICTIONS: You can only select a Vehicle unit from your army if it is a Walker. Note that even if 42 this charge is successful, your unit does not receive any Charge bonus this turn (pg 29).' },
        { term: 'Hazardous', definition: 'After a unit shoots or fights, roll one Hazardous test (one D6) for each Hazardous weapon used. For each 1, one model equipped with a Hazardous weapon is destroyed (Characters, Monsters and Vehicles suffer 3 mortal wounds instead).' },
        { term: 'Heavy', definition: 'Add 1 to Hit rolls if the bearers unit Remained Stationary this turn.' },
        { term: 'Indirect Fire', definition: 'If no models in a target unit are visible to the attacking unit when you select that target, then each time a model in the attacking unit makes an attack against that target using an Indirect Fire weapon, subtract 1 from that attacks Hit roll and the target has the Benefit of Cover against that attack (pg 44).'},
        { term: 'Infiltrators', definition: 'During deployment, if every model in a unit has this ability, then when you set it up, it can be set up anywhere on the battlefield that is more than 9 inches horizontally away from the enemy deployment zone and all enemy models.' },
        { term: 'Insane Bravery', definition: '1CP WHEN: Battle-shock step of your Command phase, just after you have failed a Battle-shock test taken for a unit from your army (pg 11). TARGET: The unit from your army that Battle-shock test was just taken for (even though your Battle-shocked units cannot normally be affected by your Stratagems). EFFECT: Your unit is treated as having passed that test instead, and is not Battle-shocked as a result.' },
        { term: 'Lance', definition: 'Each time an attack is made with such a weapon, if the bearer made a Charge move this turn, add 1 to that attacks Wound roll' },
        { term: 'Leader', definition: ' Before the battle, Character units with the Leader ability can be attached to one of their Bodyguard units to form an Attached unit. Attached units can only contain one Leader. Attacks cannot be allocated to Character models in Attached units.' },
        { term: 'Lethal Hits', definition: 'Each time an attack is made with such a weapon, a Critical Hit automatically wounds the target.' },
        { term: 'Lone Operator', definition: 'Unless part of an Attached unit (see Leader, page 39), this unit can only be selected as the target of a ranged attack if the attacking model is within 12' },
        { term: 'Melta', definition: 'Increase the Damage by x when targeting units within half range.' },
        { term: 'Overwatch', definition: '1CP, WHEN: Your opponents Movement or Charge phase, just after an enemy unit is set up or when an enemy unit starts or ends a Normal, Advance, Fall Back or Charge move. TARGET: One unit from your army that is within 24 inches of that enemy unit and that would be eligible to shoot if it were your Shooting phase. EFFECT: Your unit can shoot that enemy unit as if it were your Shooting phase. RESTRICTIONS: Until the end of the phase, each time a model in your unit makes a ranged attack, an unmodified Hit roll of 6 is required to score a hit, irrespective of the attacking weapons Ballistic Skill or any modifiers. You can only use this Stratagem once per turn.' },
        { term: 'Pistol', definition: ' Can be shot even if the bearers unit is within Engagement Range of enemy units, but must target one of those enemy units. Cannot be shot alongside any other non-Pistol weapon (except by a Monster or Vehicle)' },
        { term: 'Plunging Fire', definition: 'Each time a model that is wholly within this terrain feature makes a ranged attack, if that model is 6 inches or more vertically from ground level, and every model in the target unit is at ground level, improve the Armour Penetration characteristic of that attack by 1.' },
        { term: 'Prescision', definition: ' When targeting an Attached unit, the attacking models player can have the attack allocated to a Character model in that unit visible to the bearer.' },
        { term: 'Rapid Fire', definition: 'Increase the Attacks by x when targeting units within half range.' },
        { term: 'Rapid Ingress', definition: '1CP, WHEN: End of your opponents Movement phase TARGET: One unit from your army that is in Reserves. EFFECT: Your unit can arrive on the battlefield as if it were the Reinforcements step of your Movement phase. RESTRICTIONS: You cannot use this Stratagem to enable a unit to arrive on the battlefield during a battle round it would not normally be able to do so in.' },
        { term: 'Scouts', definition: ' Unit can make a Normal move of up to x inches before the first turn begins. If embarked in a Dedicated Transport, that Dedicated Transport can make this move instead. Must end this move more than 9 inches horizontally away from all enemy models.' },
        { term: 'Smoke Screen', definition: 'WHEN: Your opponents Shooting phase, just after an enemy unit has selected its targets. TARGET: One Smoke unit from your army that was selected as the target of one or more of the attacking units attacks. EFFECT: Until the end of the phase, all models in your unit have the Benefit of Cover (pg 44) and the Stealth ability (pg 20).' },
        { term: 'Stealth', definition: 'If every model in a unit has this ability, then each time a ranged attack is made against it, subtract 1 from that attacks Hit roll.' },
        { term: 'Sustained Hits x', definition: 'Each Critical Hit scores x additional hits on the target.' },
        { term: 'Tank Shock', definition: '1CP, WHEN: Your Charge phase. TARGET: One Vehicle unit from your army. EFFECT: Until the end of the phase, after your unit ends a Charge move, select one enemy unit within Engagement Range of it, then select one melee weapon your unit is equipped with. Roll a number of D6 equal to that weapons Strength characteristic. If that Strength characteristic is greater than that enemy units Toughness characteristic, roll two additional D6. For each 5+, that enemy unit suffers 1 mortal wound (to a maximum of 6 mortal wounds).' },
        { term: 'Torrent', definition: 'Each time an attack is made with such a weapon, that attack automatically hits the target.' },
        { term: 'Twin Linked', definition: 'Each time an attack is made with such a weapon, you can re-roll that attacks Wound roll.' },
        
        ],
        filteredKeywords() {
        if (!this.search) return this.keywords;
        return this.keywords.filter(keyword =>
            keyword.term.toLowerCase().includes(this.search.toLowerCase())
        );
    },
    showModal: false,
    modalTerm: '',
    modalDefinition: '',
    openModal(term, definition) {
        this.modalTerm = term;
        this.modalDefinition = definition;
        this.showModal = true;
    },
    closeModal() {
        this.showModal = false;
    },
    outsideClick(event) {
        if (!event.target.closest('.modal-container')) {
            this.closeModal();
        }
    },
    escapeKey(event) {
        if (event.key === 'Escape') {
            this.closeModal();
        }
    }
}" @keydown.escape="escapeKey">
<div class="flex flex-col h-screen mt-4 mx-2 md:mx-32">
    <div class="py-4 mx-4 bg-gray-400">
        <div class="max-w-md mx-auto px-4 md:px-0">
            <input class="w-full p-2 border border-black border-bold rounded shadow" type="text" placeholder="Search" x-model.debounce.300ms="search">
        </div>
    </div>

    <div class="">
        <div class="mx-auto mt-4">
            <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4 px-4"> <!-- Updated grid-cols values -->
                <template x-for="(keyword, index) in filteredKeywords()">
                    <div class="cursor-pointer text-center bg-slate-200 p-4 rounded" @click="openModal(keyword.term, keyword.definition)">
                        <h3 class="text-lg font-bold mb-2" x-text="keyword.term"></h3>
                    </div>
                </template>
            </div>
        </div>
    </div>

    <template x-if="showModal">
        <div class="fixed bottom-0 left-0 flex items-center justify-center w-full h-full bg-gray-900 bg-opacity-50">
            <div @click="outsideClick($event)" class="fixed inset-0 flex items-center justify-center z-50">
                <div class="modal-container bg-white w-full md:w-1/2 mx-auto p-4 rounded shadow">
                    <h2 class="bg-green-200 text-center text-lg font-bold mb-2" x-text="modalTerm"></h2>
                    <p><strong>Definition:</strong> <span x-text="modalDefinition"></span></p>
                </div>
            </div>
        </div>
    </template>
</div>




@endsection


