<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfficesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offices')->insert([
            'admin_id' => 2,
            'location_id' => 1,
            'name' => 'TAAJEERCOM',
            'phone_number' => '0789456123',
            'description' => 'marka',
            'status' => 1,
        ]);
}
}