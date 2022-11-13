<?php

namespace Database\Factories;

use App\Models\Education;
use Illuminate\Database\Eloquent\Factories\Factory;

class EducationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Education::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'degree' => $this->faker->text(5),
            'university' => $this->faker->text(10),
            'faculty' => $this->faker->text(10),
            'specialty' => $this->faker->text(10),
            'from' =>  $this->faker->date,
            'to' => $this->faker->date,
        ];
    }
}
