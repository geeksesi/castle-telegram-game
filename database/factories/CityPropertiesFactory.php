<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CityProperties>
 */
class CityPropertiesFactory extends Factory
{

    protected $model = \App\Models\CityProperties::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'population' => $this->faker->random_int(0, 100),
            'food' => $this->faker->random_int(0, 100),
            'iron' => $this->faker->random_int(0, 100),
            'wood' => $this->faker->random_int(0, 100),
            'stone' => $this->faker->random_int(0, 100),
            'swordsman' => $this->faker->random_int(0, 100),
            'archer' => $this->faker->random_int(0, 100),
            'knight' => $this->faker->random_int(0, 100)
        ];
    }
}
