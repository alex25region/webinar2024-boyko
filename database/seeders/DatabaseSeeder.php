<?php

namespace Database\Seeders;

use App\Models\Goal;
use App\Models\Project;
use App\Models\Step;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        User::factory(15)->create();

        $users = [
            [
                'firstname' => 'alex',
                'lastname' => '25region',
                'email' => 'alex25region@rambler.ru',
                'phone' => '123456789',
                'password' => Hash::make('12QWaszx'),
                'is_admin'=> true
            ],
            [
                'firstname' => 'alex',
                'lastname' => '25region',
                'email' => 'alex25region@mail.ru',
                'phone' => '123456789',
                'password' => Hash::make('12QWaszx'),
                'is_admin'=> true
            ],
        ];


        DB::table('users')->insert($users);

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
