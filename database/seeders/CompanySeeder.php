<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\UserType;
use App\Models\Company;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Task;
use App\Models\User;
use App\Models\Viewer;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        Company::factory(1)
            ->hasAttached(Viewer::factory(10))
            ->hasAttached(Customer::factory(400))
            ->has(Employee::factory(10))
            ->create();
    }

    private function _createTasks(Customer $customer, Company $company): void
    {
        Task::factory(rand(10, 20))
            ->create([
                'company_id' => $company->id,
                'customer_id' => $customer->id,
            ]);

    }

    private function _createEmployees(Company $company): void
    {
        User::factory(rand(5, 10))->create([
            'type' => UserType::Employee,
        ])->each(function ($user) use ($company) {
            $company->employees()->create([
                'user_id' => $user->id,
                'company_id' => $company->id,
            ]);
        });

    }

    private function _createViewers(Company $company): void
    {
        User::factory(rand(5, 10))->create([
            'type' => UserType::Viewer,
        ])->each(function ($user) use ($company) {
            $company->employees()->create([
                'user_id' => $user->id,
                'company_id' => $company->id,
                'is_viewer' => true,

            ]);
        });
    }

    private function _createCustomers(Company $company): void
    {
        $customers = User::factory(rand(5, 10))
            ->create([
                'type' => UserType::Customer,
            ]);

        $customers->each(function ($user) use ($company) {
            $company
                ->customers()
                ->withPivotValue('is_active', true)
                ->create([
                    'user_id' => $user->id,
                ]);
        });

        //            return $customers;
    }
}
