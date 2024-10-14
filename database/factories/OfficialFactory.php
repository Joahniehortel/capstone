<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Official>
 */
class OfficialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => $this->faker->firstName(),
            'lastname' =>  $this->faker->lastName(),
            'contact_number' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'term_start' => $this->faker->date('Y-m-d', 'now'), 
            'term_end' => $this->faker->dateTimeBetween('now', '+2 years')->format('Y-m-d'), 
            'status' => $this->faker->randomElement(['active', 'inactive']), 
        ];
    }
}
