<?php

namespace Database\Factories;

use App\Models\Goal;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Step>
 */
class StepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
//            отключил см. __06 Factory with relations
//            'goal_id' => Goal::factory()->create(),
            'name' => fake()->name(),
            'started_at' => CarbonImmutable::now(),
            'finished_at' => CarbonImmutable::now(),
        ];
    }
}
