<?php

namespace Database\Seeders;

use App\Models\Vehicletype;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class VehicletypeSeeder extends Seeder
{
    public $types = ['RENEGADE', 'SPORT', 'UNLIMITED', 'LIMITED'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->types as $type) {
            Vehicletype::create([
                'type' => $type,
            ]);
        }
    }
}
