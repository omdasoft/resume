<?php

namespace Database\Factories;

use App\Models\EmploymentDetails;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmploymentDetailsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmploymentDetails::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'desc' => $this->faker->text
        ];
    }
}
