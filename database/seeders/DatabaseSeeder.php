<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use App\Models\Education;
use App\Models\Contact;
use App\Models\Employment;
use App\Models\Skill;
use App\Models\Portfolio;
use App\Models\EmploymentDetails;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)
            ->has(Profile::factory(1))
            ->has(Education::factory(2))
            ->has(Employment::factory(3)->has(EmploymentDetails::factory(6)))
            ->has(Skill::factory(5))
            ->has(Portfolio::factory(5))
            ->create();
        Contact::factory(1)->create();
    }
}
