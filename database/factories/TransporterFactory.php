<?php

namespace Database\Factories;

use App\Models\Transporter;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transporter>
 */
class TransporterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'transporter_id' => Transporter::factory(),
            'sender' => $this->faker->name,
            'receiver' => $this->faker->name,
            'tracking_number' => strtoupper($this->faker->bothify('PKG-#######')),
            'status' => $this->faker->randomElement(['Pending', 'In-Transit', 'Delivered']),
            'description' => $this->faker->sentence,
            'delivery_date' => $this->faker->dateTimeBetween('now', '+2 weeks'),
        ];
    }
}
