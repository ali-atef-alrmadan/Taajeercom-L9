<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CitiesSeeder::class);
        $this->call(CountriesSeeder::class);
        $this->call(LocationsSeeder::class);
        
        $this->call(OfficesSeeder::class);
        $this->call(OffcesworkersSeeder::class);

        // \App\Models\User::factory(10)->create();
    }
}
