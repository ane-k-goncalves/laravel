<?php

namespace Database\Factories;

use App\Models\Locations;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel>
 */
class LocationsFactory extends Factory
{
    protected $model = Locations::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->numberBetween(1, 8848),
        ];
    }
}
