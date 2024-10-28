<?php

namespace Database\Factories;

use App\Models\Complaint;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 */
class ComplaintFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'complaint_title' => $this->faker->sentence(6), // Generate a random title
            'complaint_image' => $this->faker->imageUrl(), // Generate a random image URL
            'date_occured' => $this->faker->dateTimeBetween('-5 years', 'now')->format('Y-m-d H:i:s'), // Random date in the last 5 years
            'complaint_address' => $this->faker->address, // Generate a random address
            'complaint_detail' => $this->faker->sentence(1), // Generate a random complaint detail
            'user_id' => 1, 
            'complaint_status' => 'Pending', // Default status
            'created_at' => $this->faker->dateTimeBetween('-5 years', 'now'), // Random date in the last 5 years
        ];
        
    }
}
