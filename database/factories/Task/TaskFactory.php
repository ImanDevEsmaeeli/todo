<?php

namespace Database\Factories\Task;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\task\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>fake()->jobTitle(),
            'body'=>fake()->text(35),
            'deadline'=>fake()->dateTimeBetween('+3 days','+14 days'),
            'status'=>fake()->randomElement(Status::values()),
            'user_id'=>fake()->numberBetween(1,10),

        ];
    }
}
