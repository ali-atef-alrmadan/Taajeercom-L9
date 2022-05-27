<?php

namespace Database\Factories;

use App\Models\locations;
use App\Models\User;
use App\Models\Vehiclebrand;
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
    public function definition(): array
    {
        return [
            'color' => $this->faker->colorName,
            'capacity' => $this->faker->numberBetween(1, 6),
            'model' => $this->faker->text(20),
            'year' => $this->faker->year,
            'type_id' => $this->faker->numberBetween(1, Vehicletype::all()->count()),
            'brand_id' => $this->faker->numberBetween(1, Vehiclebrand::all()->count()),
            'owner_id' => $this->faker->numberBetween(1, User::all()->count()),
            'location_id' => $this->faker->numberBetween(1, locations::all()->count()),
            'price' => $this->faker->numberBetween(1, 50),
            'picture_path' => $this->faker->imageUrl,
            'description' => $this->faker->text(50),
            'license_number' => $this->faker->numberBetween(1,50000),
            'available' => $this->faker->boolean
        ];
    }
}
