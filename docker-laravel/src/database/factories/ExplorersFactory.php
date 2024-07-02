<?php

namespace Database\Factories;

use App\Models\Explorers;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ExplorersFactory extends Factory
{
    protected $model = Explorers::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name,
            'idade' => $this->faker->numberBetween(18, 65), 
            'inventario' => $this->faker->numberBetween(1, 100),
            'items_id' => ItemsFactory::factory(),
            'locations_id' => LocationsFactory::factory(),
        ];
    }
}
