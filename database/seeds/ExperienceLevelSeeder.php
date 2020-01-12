<?php

use Illuminate\Database\Seeder;
use App\MyLibs\Models\ExperLevel;

class ExperienceLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('experience_levels')->insert([
            'id'=>'00570e3b-4eef-4d0c-ac81-ce88111861fb',
        	'name'=>'0 year'
        ]);
        DB::table('experience_levels')->insert([
            'id'=>'55d8ca40-3b60-4769-a842-5d1fa8a65954',
            'name'=>'1 to 2 years'
        ]);
         DB::table('experience_levels')->insert([
            'id'=>'56b77235-4166-4928-802b-f4d9d9cb40df',
            'name'=>'3 to 5 years'
        ]);
        DB::table('experience_levels')->insert([
            'id'=>'72a7d553-43d3-4a4b-b406-cc1e170b93ef',
            'name'=>'above 5 years'
        ]);

        // $explevel = new Role();
        // $explevel->id = Uuid::generate()->string;
        // $explevel->name = 'Entry Level';
        // $explevel->save();

        // $explevel = new Role();
        // $explevel->id = Uuid::generate()->string;
        // $explevel->name = 'Experienced Non-Manager';
        // $explevel->save();

        // $explevel = new Role();
        // $explevel->id = Uuid::generate()->string;
        // $explevel->name = 'Manager';
        // $explevel->save();

        // $explevel = new Role();
        // $explevel->id = Uuid::generate()->string;
        // $explevel->name = 'Director and above';
        // $explevel->save();
        
        
    }
}
