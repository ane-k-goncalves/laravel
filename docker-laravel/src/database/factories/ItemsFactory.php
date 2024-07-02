<?php

namespace Database\Factories;

use App\Models\Items;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ItemsFactory extends Factory
{
    protected $model = Items::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->word,
            'valor' => $this->faker->randomFloat(2, 1, 1000), 
            'locations_id' => LocationsFactory::factory(),
 
         ];
    }
}
