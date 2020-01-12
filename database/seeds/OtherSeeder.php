<?php

use Illuminate\Database\Seeder;
use App\MyLibs\Models\Others;

class OtherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
          DB::table('others')->insert([
            'id'=>'1',
            'background'=>'https://cdn.dribbble.com/users/1696323/screenshots/8365669/media/f53f6f501ac81963e0eae3c1ead4138f.jpg',
        ]);
    }
}
