<?php

namespace Database\Factories;

use App\Models\task;
use Illuminate\Database\Eloquent\Factories\Factory;

class taskFactory extends Factory
{
    protected $model = task::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'priority' => $this->faker->word(),
            'status' => $this->faker->word(),
        ];
    }
}
