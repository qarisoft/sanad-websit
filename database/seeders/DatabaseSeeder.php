<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use App\Models\Viewer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CitySeeder::class,
            CompanySeeder::class,
            TaskSeeder::class,
        ]);
        Viewer::factory()
            ->afterCreating(function (Viewer $viewer) {
                $C = Company::all()->random();
                $C->owner()->associate(
                    User::factory()->has(
                        Employee::factory()
                            ->state(['company_id' => 1])
                    )->create(['username' => 'salah'])
                );
                $C->tasks()->each(function ($task) {
                    $task->publish();
                });
                $viewer
                    ->user()
                    ->update([
                        'email' => 'a@a.a',
                        'username' => 'a',
                    ]);
                $viewer
                    ->companies()
                    ->attach($C);
                $viewer->save();
                $viewer
                    ->allowedTasks()
                    ->syncWithoutDetaching($C->tasks->pluck('id')->toArray());


            })
            ->create();

    }
}
