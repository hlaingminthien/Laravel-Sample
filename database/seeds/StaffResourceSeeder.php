<?php

use Illuminate\Database\Seeder;
use App\MyLibs\Models\Company_information;

class StaffResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staff_resources')->insert([
            'id'=>'1edc1510-ff88-11e9-941d-4ff531bf488b',
            'user_id'=>'e573d580-e5c8-11e9-b4b7-bd674b3e09ba',
            'offered_employer'=>'1',
            'offered_employee'=>'1',
            'used_cv'=>'20',
        ]);
    }
}
