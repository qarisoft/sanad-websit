<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        $a = file_get_contents('./database/cities.json');
        $json = json_decode($a);
        foreach ($json as $key => $value) {
            $c = new City(
                [
                    'city_id' => $value->city_id,
                    'name' => $value->name_ar,
                    'name_en' => $value->name_en,
                    'region_id' => $value->region_id,
                    'is_default' => true,
                ]
            );
            $c->save();

        }
    }
}
