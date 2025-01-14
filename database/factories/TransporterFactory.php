<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransporterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'vehicle_type' => $this->faker->randomElement(['Truck', 'Van', 'Bike']),
            'license_plate' => strtoupper($this->faker->bothify('??-####')),
            'availability_status' => $this->faker->randomElement(['Available', 'Busy']),
            'user_id' => User::factory()->create(['role' => 'Transporter'])->id, // Linking to the Transporter user
        ];
    }
}
