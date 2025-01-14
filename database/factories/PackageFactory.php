<?php

namespace Database\Factories;

use App\Models\Transporter;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->create(), // Linking to a regular user
            'transporter_id' => Transporter::factory()->create()->id, // Linking to a transporter
            'sender' => $this->faker->name,
            'receiver' => $this->faker->name,
            'tracking_number' => strtoupper($this->faker->bothify('PKG-#######')),
            'status' => $this->faker->randomElement(['Pending', 'In-Transit', 'Delivered']),
            'description' => $this->faker->sentence,
            'delivery_date' => $this->faker->dateTimeBetween('now', '+2 weeks'),
        ];
    }
}
