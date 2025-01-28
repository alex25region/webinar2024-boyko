<?php

namespace Database\Seeders;

use App\Models\Goal;
use App\Models\Project;
use App\Models\Step;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        User::factory(15)->create();

        // users - 15
        // projects - 45
        // goals - 135
        // steps - 405
        User::factory(15)
            ->has(
                Project::factory(3)
                    ->has(Goal::factory(3)
                        ->has(Step::factory(3))
                    )
            )
            ->create();

//        $this->call([
//            ProjectSeeder::class,
//            GoalSeeder::class,
//            StepSeeder::class
//        ]);

    }
}
