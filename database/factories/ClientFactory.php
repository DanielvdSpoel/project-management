<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    protected $model = Client::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'street' => $this->faker->streetName(),
            'house_number' => $this->faker->buildingNumber(),
            'postal_code' => $this->faker->postcode(),
            'city' => $this->faker->city(),
        ];
    }
}
