<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'vehicle_type' => $this->faker->randomElement(['Truck', 'Van', 'Bike']),
            'license_plate' => strtoupper($this->faker->bothify('??-####')),
            'availability_status' => $this->faker->randomElement(['Available', 'Busy']),
        ];
    }
}
