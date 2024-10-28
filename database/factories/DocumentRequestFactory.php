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
        static $initialRequestCount = 5; 
        static $increment = 2; 
    
        return [
            'request_file_name' => $this->faker->randomElement([
                'Barangay Clearance',
                'Barangay Certificate',
                'Certificate of Indigency',
                'Special Permits'
            ]),
            'number_copies' => $this->faker->numberBetween(1, 10), 
            'preferred_date' => $this->faker->dateTimeBetween('-5 years', 'now'), // Random date in the last 5 years
            'date_requested' => $this->faker->dateTimeBetween('-1 year', 'now'), 
            'request_purpose' => $this->faker->sentence(), 
            'contact_no' => $this->faker->phoneNumber(), 
            'request_status' => 'Pending', 
            'user_id' => 1, 
            'created_at' => $this->faker->dateTimeBetween('-5 years', 'now'), // Set created_at to a random date between 5 years ago and now
        ];
             
        
    }
    
}
