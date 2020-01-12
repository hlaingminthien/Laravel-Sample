<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(ExperienceLevelSeeder::class);
        $this->call([
            StateSeeder::class,
            RoleSeeder::class,
            ExperienceLevelSeeder::class,
            IconSeeder::class,
            JobCategorySeeder::class,
            JobSubCategorySeeder::class,
            CountrySeeder::class,
            StaffResourceSeeder::class,
            ManPowerSeeder::class,
            CompanyInformationSeeder::class,
            CardSeeder::class,
            JobPositionSeeder::class,
            InterviewSeeder::class,
            OtherSeeder::class
        ]);

    }
}
