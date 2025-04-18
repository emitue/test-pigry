<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class WeightLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'date' => $this->faker->dateTimeBetween('-2 months', 'now')->format('Y-m-d'),
            'weight' => $this->faker->randomFloat(1, 50, 80),
            'calories' => $this->faker->numberBetween(1500, 2500),
            'exercise_time' => $this->faker->time(),
            'exercise_content' => $this->faker->sentence(),
        ];
    }
}
