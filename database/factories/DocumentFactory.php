<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {                 
        
        return [
            'file_name' => $this->faker->randomElement([
                'Barangay Clearance', 
                'Barangay ID', 
                'Certificate of Residency', 
                'Business Permit', 
                'Barangay Indigency Certificate'
            ]),
            'file_details' => $this->faker->sentence()
        ];
    }
}
