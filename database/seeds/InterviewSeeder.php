<?php

use Illuminate\Database\Seeder;
use App\MyLibs\Models\Interview;

class InterviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('interviews')->insert([
            'id'=>'0b717e8c-1574-47cb-94e5-5fffd3945f7e',
            'name'=>'first',
            'company_id'=>'1edc1510-ff88-11e9-941d-4ff531bf488b',
            'date'=>'2019-11-15',
            'time'=>'14:00',
            'location'=>'64 x 65 sein pan street',
            'interview_requirement'=>'cv form'
        ]);

        DB::table('interviews')->insert([
            'id'=>'e385adcf-646f-47e5-b9ab-67f20615cd69',
            'name'=>'second',
            'company_id'=>'1edc1510-ff88-11e9-941d-4ff531bf488b',
            'date'=>'2019-11-17',
            'time'=>'14:00',
            'location'=>'64 x 65 sein pan street',
            'interview_requirement'=>'cv form'
        ]);

        DB::table('interviews')->insert([
            'id'=>'63fa7c06-90d2-46c4-b58e-341758031222',
            'name'=>'third',
            'company_id'=>'1edc1510-ff88-11e9-941d-4ff531bf488b',
            'date'=>'2019-11-20',
            'time'=>'14:00',
            'location'=>'64 x 65 sein pan street',
            'interview_requirement'=>'cv form'
        ]);
    }
}