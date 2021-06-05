<?php

namespace Database\Factories;

use App\Models\LocateCities;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocateCitiesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LocateCities::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'locate_city' => $this->faker->city,
        ];
    }
}
