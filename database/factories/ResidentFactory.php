<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;


class ResidentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $birthDate = $this->faker->date();
        $age = Carbon::parse($birthDate)->age;
        
        return [
            'image' => null, // Optional, you can generate a random image path if needed
            'ice_fullname' => $this->faker->name(),
            'ice_address' => $this->faker->address(),
            'ice_relationship' => $this->faker->randomElement(['Parent', 'Sibling', 'Spouse', 'Friend']),
            'ice_contactNumber' => $this->faker->numerify('09#########'), // 11-digit number
            'firstName' => $this->faker->firstName(),
            'middleName' => $this->faker->optional()->firstName(),
            'lastName' => $this->faker->lastName(),
            'birthDate' => $this->faker->date(),
            'age' => $this->faker->numberBetween(1, 100),
            'birthPlace' => $this->faker->city(),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'address' => $this->faker->address(),
            'purokNumber' => $this->faker->randomDigitNotNull(),
            'totalHousehold' => $this->faker->numberBetween(1, 10),
            'voter' => $this->faker->randomElement(['Yes', 'No']),
            'maritalStatus' => $this->faker->randomElement(['single', 'married', 'divorced', 'separated']),
            'nationality' => 'Filipino',
            'religion' => $this->faker->optional()->randomElement(['Christianity', 'Islam', 'Other']),
            'pwd' => $this->faker->randomElement(['Yes', 'No']),
            'indigenous' => $this->faker->randomElement(['Yes', 'No']),
            'occupation' => $this->faker->optional()->jobTitle(),
            'MonthlyIncome' => $this->faker->optional()->randomFloat(2, 0, 100000),
        ];
    }
}
