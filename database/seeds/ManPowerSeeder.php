<?php

use Illuminate\Database\Seeder;
use App\MyLibs\Models\Job_Category;

class ManPowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('man_power')->insert([
            'id'=>'b14c7cbc-ac2a-498c-bb85-e04bd2171dce',
        	'name'=>'0 to 15'
        ]);

        DB::table('man_power')->insert([
            'id'=>'b92895f1-9bcb-40b0-a392-ec5fbd51d25c',
            'name'=>'15 to 50'
        ]);

        DB::table('man_power')->insert([
            'id'=>'d2b9a3e3-a921-4aeb-b8d3-3433436441ed',
            'name'=>'50 and above'
        ]);
    }
}