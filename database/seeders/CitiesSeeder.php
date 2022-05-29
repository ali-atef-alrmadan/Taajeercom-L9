<?php

namespace Database\Seeders;

use App\Models\Cities;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
{
    public $types = [
        "Amman",
        "Zarqa",
        "Irbid",
        "Aqaba",
        "al-Balqa",
        "Madaba",
        "Mafraq",
        "Dscharasch",
        "Ma'an",
        "Tafilah",
        "Ajloun",
        "Karak",
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->types as $type) {
            Cities::create([
                'city' => $type,
            ]);
        }
    }
}
