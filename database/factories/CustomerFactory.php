<?php

namespace Database\Factories;

use App\Enums\UserType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $u = User::factory()->state(['type' => UserType::Customer])->create();
        return [
            'user_id' => $u,
            'name' => $u->name
        ];
    }

//    public function configure(): static
//    {
//        return $this->afterCreating(function (Customer $customer) {
//
//        });
//    }
}
