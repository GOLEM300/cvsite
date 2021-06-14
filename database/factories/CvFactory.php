<?php

namespace Database\Factories;

use App\Models\Cv;
use Illuminate\Database\Eloquent\Factories\Factory;

class CvFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cv::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'photo' => $this->faker->imageUrl($width = 640, $height = 480),
            'lastname' => $this->faker->lastName,
            'name' => $this->faker->name,
            'patronymic' => $this->faker->name,
            'birth_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'locate_city' => $this->faker->city,
            'email' => $this->faker->unique()->email,
            'phone' => $this->faker->unique()->tollFreePhoneNumber,
            'specialization' => $this->faker->name,
            'salary' => $this->faker->numberBetween($min = 1000, $max = 9000),
            'busyness' => 1,
            'shedule_type' => 1,
            'expirience' => 'no',
            'about' => ''
        ];
    }
}
