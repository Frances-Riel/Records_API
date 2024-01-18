<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Record>
 */
class RecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'name'=>fake()->name(),
           'age' => $this->faker->numberBetween(18, 60),
           'address' => $this->faker->address,
            'gender' => $this->faker->randomElement(['male', 'female']),
        ];
    }
}
