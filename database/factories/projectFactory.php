<?php

namespace Database\Factories;

use App\Models\project;
use Illuminate\Database\Eloquent\Factories\Factory;

class projectFactory extends Factory
{
    protected $model = project::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'client_id' => $this->faker->randomNumber(),
        ];
    }
}
