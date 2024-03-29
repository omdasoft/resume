<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address' => 'sudan, khartoum',
            'email'   => 'admin@test.com',
            'phone'   => '+249120002252',
            'github'  => 'https://omda@github.com',
            'linkedin' => 'https://omda@linkedin.com'
        ];
    }
}
