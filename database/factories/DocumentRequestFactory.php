<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DocumentRequest>
 */
class DocumentRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {                      
        return [
            'request_file_name' => $this->faker->randomElement([
                'Barangay Clearance',
                'Barangay Certificate',
                'Certificate of Indigency',
                'Special Permits'
            ]),
            'number_copies' => $this->faker->numberBetween(1, 10), // Generates a random number of copies between 1 and 10
            'preferred_date' => $this->faker->dateTimeBetween('2024-01-01', now()), // Generates a random date between 2024-01-01 and now
            'date_requested' => $this->faker->dateTimeBetween('2024-01-01', now()), // Generates a random date for when the request was made
            'request_purpose' => $this->faker->sentence(), // Generates a random purpose
            'contact_no' => $this->faker->phoneNumber(), // Generates a random phone number
            'request_status' => 'Pending', // Default status
            'user_id' => 1, // You can assign a user ID here if needed
        ];
    }
}
