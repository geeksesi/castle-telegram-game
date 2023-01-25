<?php

namespace Database\Factories;

use App\Enums\ActionTypeEnum;
use App\Enums\PropertiesEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PropertiesTransaction>
 */
class PropertiesTransactionFactory extends Factory
{
    protected $model = \App\Models\PropertiesTransaction::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'property' => Arr::random(PropertiesEnum::cases()),
            'action_type' => Arr::random(ActionTypeEnum::cases()),
            'value' => $this->faker->random_int(-100, 100),
            'value_before' => $this->faker->random_int(-100, 100),

        ];
    }
}
