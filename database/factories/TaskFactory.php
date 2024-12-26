<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\EstateType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Random\RandomException;

/**
 * @throws RandomException
 */
function str_rand(int $length = 10): string
{ // 64 = 32
    $length = ($length < 4) ? 4 : $length;

    return bin2hex(random_bytes(($length - ($length % 2)) / 2));
}

class TaskFactory extends Factory
{
    /**
     * @throws RandomException
     */
    public function definition(): array
    {
        return [
            'code' => str_rand(),
            'city_id' => fn () => City::all()->random(),
            'must_do_at' => Carbon::now()->add(rand(1, 500), 'hours'),
            'received_at' => date('Y-m-d H:i:s'),
            'address' => fake()->address(),
            'estate_type' => EstateType::all()->random()->first()->name,
            'location' => fake()->localCoordinates(),
            'district' => fake()->streetName(),
        ];
    }
}
