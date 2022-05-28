<?php

namespace Database\Factories;

use App\Models\locations;
use App\Models\offices;
use App\Models\User;
use App\Models\Vehiclebrand;
use App\Models\Vehicles;
use App\Models\Vehicletype;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicles>
 */
class VehiclesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model=Vehicles::class;

    public function definition(): array
    {
        return [

            'owner_id' => $this->faker->numberBetween(1, offices::all()->count()),
            'brand_id' => $this->faker->numberBetween(1, Vehiclebrand::all()->count()),
            'type_id' => $this->faker->numberBetween(1, Vehicletype::all()->count()),
            'model' => $this->faker->text(20),
            'year' => $this->faker->date(),
            'color' => $this->faker->colorName,
            'capacity' => $this->faker->numberBetween(1, 6),
            'license_number' => $this->faker->numberBetween(1,50000),
            'price' => $this->faker->numberBetween(1, 50),
            'description' => $this->faker->text(50) ,
            'available' => $this->faker->boolean,
            'picture_path' => $this->faker->imageUrl,
        ];
    }
}
