<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use App\Models\Education;
use App\Models\Employment;
use App\Models\Skill;
use App\Models\Portfolio;
use App\Models\EmploymentDetails;
use App\Models\Image;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create();
        Profile::factory(1)->has(Image::factory(1))->create();
        Education::factory(2)->create();
        Employment::factory(3)->has(EmploymentDetails::factory(6))->create();
        Skill::factory(5)->create();
        Portfolio::factory(5)->has(Image::factory(5))->create();
    }
}
