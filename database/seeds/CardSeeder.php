<?php

use Illuminate\Database\Seeder;
use App\MyLibs\Models\Card;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cards')->insert([
            'id'=>'763d7f12-3538-4313-ac52-5cdb32df3f7b',
            'card_name'=>'1 Week Job Position Card',
            'num_of_postion'=>'1',
            'num_of_refresh'=>'0',
            'num_of_topping'=>'0',
            'num_of_advice'=>'0',
            'num_of_cv'=>'0',
            'staff_advice_hour'=>'0',
            'num_of_drawing_rules'=>'0',
            'limit_time'=>'7',
            'price'=>'80000',
            'star_levels'=>'0',
            'hr_informations'=>'0',
            'staff_situation'=>'0',
            'details'=>'Job Detail',
        ]);

        DB::table('cards')->insert([
            'id'=>'60e6f5ff-b906-4d80-8319-5c509122d2c5',
            'card_name'=>'1 Month Job Position Card',
            'num_of_postion'=>'5',
            'num_of_refresh'=>'0',
            'num_of_topping'=>'0',
            'num_of_advice'=>'0',
            'num_of_cv'=>'0',
            'staff_advice_hour'=>'0',
            'num_of_drawing_rules'=>'0',
            'limit_time'=>'30',
            'price'=>'350000',
            'star_levels'=>'0',
            'hr_informations'=>'0',
            'staff_situation'=>'0',
            'details'=>'Job Detail',
        ]);

        DB::table('cards')->insert([
            'id'=>'f0fc5e53-487c-4ae0-bc36-be84a883a392',
            'card_name'=>'3 Month Job Position Card',
            'num_of_postion'=>'16',
            'num_of_refresh'=>'0',
            'num_of_topping'=>'0',
            'num_of_advice'=>'0',
            'num_of_cv'=>'0',
            'staff_advice_hour'=>'0',
            'num_of_drawing_rules'=>'0',
            'limit_time'=>'90',
            'price'=>'840,000',
            'star_levels'=>'0',
            'hr_informations'=>'0',
            'staff_situation'=>'0',
            'details'=>'Job Detail',
        ]);

        DB::table('cards')->insert([
            'id'=>'87e121c9-5f83-4512-a9c5-b1b51381ee8d',
            'card_name'=>'1 Year Job Position Card',
            'num_of_postion'=>'66',
            'num_of_refresh'=>'0',
            'num_of_topping'=>'0',
            'num_of_advice'=>'0',
            'num_of_cv'=>'0',
            'staff_advice_hour'=>'0',
            'num_of_drawing_rules'=>'0',
            'limit_time'=>'365',
            'price'=>'3360000',
            'star_levels'=>'0',
            'hr_informations'=>'0',
            'staff_situation'=>'0',
            'details'=>'Job Detail',
        ]);

        DB::table('cards')->insert([
            'id'=>'9c976726-145e-4694-85f0-ee744d9568c0',
            'card_name'=>'Information Topping Card',
            'num_of_postion'=>'0',
            'num_of_refresh'=>'0',
            'num_of_topping'=>'1',
            'num_of_advice'=>'0',
            'num_of_cv'=>'0',
            'staff_advice_hour'=>'0',
            'num_of_drawing_rules'=>'0',
            'limit_time'=>'1',
            'price'=>'100000',
            'star_levels'=>'0',
            'hr_informations'=>'0',
            'staff_situation'=>'0',
            'details'=>'Job Detail',
        ]);

        DB::table('cards')->insert([
            'id'=>'6c2c22c8-cb2c-45a4-8ba7-36a34d087c32',
            'card_name'=>'Smart Refresh Card',
            'num_of_postion'=>'0',
            'num_of_refresh'=>'1',
            'num_of_topping'=>'0',
            'num_of_advice'=>'0',
            'num_of_cv'=>'0',
            'staff_advice_hour'=>'0',
            'num_of_drawing_rules'=>'0',
            'limit_time'=>'1',
            'price'=>'5000',
            'star_levels'=>'0',
            'hr_informations'=>'0',
            'staff_situation'=>'0',
            'details'=>'Job Detail',
        ]);

        DB::table('cards')->insert([
            'id'=>'ab5b29a2-bd20-49e2-aa0d-7fd46c833c55',
            'card_name'=>'CV Form Download Card',
            'num_of_postion'=>'0',
            'num_of_refresh'=>'0',
            'num_of_topping'=>'0',
            'num_of_advice'=>'0',
            'num_of_cv'=>'1',
            'staff_advice_hour'=>'0',
            'num_of_drawing_rules'=>'0',
            'limit_time'=>'0',
            'price'=>'20000',
            'star_levels'=>'0',
            'hr_informations'=>'0',
            'staff_situation'=>'0',
            'details'=>'Job Detail',
        ]);
        DB::table('cards')->insert([
            'id'=>'f4000c1a-cb92-4358-b3df-c60a4ab49132',
            'card_name'=>'Silver',
            'num_of_postion'=>'33',
            'num_of_refresh'=>'200',
            'num_of_topping'=>'50',
            'num_of_advice'=>'0',
            'num_of_cv'=>'100',
            'staff_advice_hour'=>'10',
            'num_of_drawing_rules'=>'1',
            'limit_time'=>'365',
            'price'=>'4000000',
            'star_levels'=>'0',
            'hr_informations'=>'0',
            'staff_situation'=>'0',
            'details'=>'Job Detail',
        ]);

        DB::table('cards')->insert([
            'id'=>'18305681-e3eb-4904-9aa0-07bdc28b40f5',
            'card_name'=>'Gold',
            'num_of_postion'=>'66',
            'num_of_refresh'=>'300',
            'num_of_topping'=>'100',
            'num_of_advice'=>'25',
            'num_of_cv'=>'200',
            'staff_advice_hour'=>'15',
            'num_of_drawing_rules'=>'2',
            'limit_time'=>'365',
            'price'=>'6000000',
            'star_levels'=>'0',
            'hr_informations'=>'0',
            'staff_situation'=>'0',
            'details'=>'Job Detail',
        ]);

        DB::table('cards')->insert([
            'id'=>'86ac8116-b53d-4a17-b8d8-bf8348f70c1a',
            'card_name'=>'Diamond',
            'num_of_postion'=>'99',
            'num_of_refresh'=>'400',
            'num_of_topping'=>'150',
            'num_of_advice'=>'50',
            'num_of_cv'=>'300',
            'staff_advice_hour'=>'20',
            'num_of_drawing_rules'=>'3',
            'limit_time'=>'365',
            'price'=>'8000000',
            'star_levels'=>'0',
            'hr_informations'=>'0',
            'staff_situation'=>'0',
            'details'=>'Job Detail',
        ]);
    }
}
