<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Company;
use App\Models\Customer;
use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        Company::all()->each(function (Company $company) {
            $company->customers()->each(function (Customer $customer) use ($company) {
                Task::factory(rand(5, 10))->create([
                    'company_id' => $company->id,
                    'customer_id' => $customer->id,

                ]);
            });
        });

    }


}