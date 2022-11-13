<?php

namespace Database\Factories;

use App\Models\Employment;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmploymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'designation' => $this->faker->text(5),
            'company' => $this->faker->company,
            'country' => $this->faker->country,
            'start_date' => $this->faker->date,
            'end_date' => $this->faker->date,
            'until_now' => $this->faker->boolean
        ];
    }
}
