<?php

namespace Database\Factories;

use App\Models\game;
use Illuminate\Database\Eloquent\Factories\Factory;

class gameFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = game::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    //TODO Build out factory for Game
    {
        return [

            'scenario'=> $this->faker->word,
            'player1_name' => $this->faker->name,
            'player1_army' => $this->faker->name,
            'player1_primary' => $this->faker->numberBetween($min=0, $max=100),
            'player1_secondary' => $this->faker->numberBetween($min=0, $max=100),
            'player1_score' => $this->faker->numberBetween($min=0, $max=100),

            'player2_name' => $this->faker->name,
            'player2_army' => $this->faker->name,
            'player2_primary' => $this->faker->numberBetween($min=0, $max=100),
            'player2_secondary' => $this->faker->numberBetween($min=0, $max=100),
            'player2_score' => $this->faker->numberBetween($min=0, $max=100),

            'description' => $this->faker->paragraph

        ];
    }
}
