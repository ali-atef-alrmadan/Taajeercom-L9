<?php

namespace Database\Seeders;

use App\Models\Vehiclebrand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class VehiclebrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public $brands = [
        "ABARTH",
        "ACURA",
        "ALFA ROMEO",
        "ASTON MARTIN",
        "AUDI",
        "BENTLEY",
        "BMW",
        "BUGATTI",
        "BUICK",
        "CADILLAC",
        "CHEVROLET",
        "CHRYSLER",
        "CITROËN",
        "DACIA",
        "DAEWOO",
        "DAIHATSU",
        "DODGE",
        "DONKERVOORT",
        "DS",
        "FERRARI",
        "FIAT",
        "FISKER",
        "FORD",
        "GMC",
        "HONDA",
        "HUMMER",
        "HYUNDAI",
        "INFINITI",
        "ISUZU",
        "IVECO",
        "JAGUAR",
        "JEEP",
        "KIA",
        "KTM",
        "LADA",
        "LAMBORGHINI",
        "LANCIA",
        "LAND ROVER",
        "LANDWIND",
        "LEXUS",
        "LINCOLN",
        "LOTUS",
        "MASERATI",
        "MAYBACH",
        "MAZDA",
        "MCLAREN",
        "MERCEDES-BENZ",
        "MERCURY",
        "MG",
        "MINI",
        "MITSUBISHI",
        "MORGAN",
        "NISSAN",
        "OPEL",
        "PEUGEOT",
        "PONTIAC",
        "PORSCHE",
        "RENAULT",
        "ROLLS-ROYCE",
        "ROVER",
        "SATURN",
        "SEAT",
        "SKODA",
        "SMART",
        "SSANGYONG",
        "SUBARU",
        "SUZUKI",    
        "TESLA",
        "TOYOTA",
        "VOLKSWAGEN",
        "VOLVO",
    ];

    public function run()
    {
        foreach ($this->brands as $brand) {
            Vehiclebrand::create([
                'brand' => $brand,
            ]);
        }
    }
}
