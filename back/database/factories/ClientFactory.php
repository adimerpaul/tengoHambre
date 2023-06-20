<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nit'=> $this->faker->numberBetween(100000000, 999999999),
            'name'=> $this->faker->name(),
            'phone'=> $this->faker->phoneNumber(),
            'email'=> $this->faker->email(),
            'type'=> $this->faker->randomElement(['Cliente', 'Proveedor']),
        ];
    }
}
