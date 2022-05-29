<?php

namespace Database\Seeders;

use App\Models\locations;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        locations::create([
            'country_id' => 1,
            'city_id' => 1,
            'address_description' => 'University Street',
        ]);

    }
}
