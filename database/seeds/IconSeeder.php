<?php

use Illuminate\Database\Seeder;
use App\MyLibs\Models\Icon;

class IconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //sales
        DB::table('icons')->insert([
            'id'=>'e5b559d0-f0ca-11e9-a6cd-03aba7d582a0',
            'name'=>'https://img.icons8.com/office/35/000000/land-sales.png'
        ]);
        //Documentary
        DB::table('icons')->insert([
            'id'=>'e5b59d00-f0ca-11e9-8f32-7dc6c5aeff16',
            'name'=>'https://img.icons8.com/dusk/35/000000/documentary.png'
        ]);
        //After Sales
        DB::table('icons')->insert([
            'id'=>'e5b5d1a0-f0ca-11e9-91a1-b95297a927a5',
            'name'=>'https://img.icons8.com/nolan/35/000000/sale.png'
        ]);
       //Promotion
        DB::table('icons')->insert([
            'id'=>'e5b644a0-f0ca-11e9-9163-6379a50f18df',
            'name'=>'https://img.icons8.com/dusk/35/000000/sell.png'
        ]);
        //HR
        DB::table('icons')->insert([
            'id'=>'e5b67f00-f0ca-11e9-80c9-839c2b730113',
            'name'=>'https://img.icons8.com/officel/35/000000/user-group-man-man.png'
        ]);
        //Administrative
        DB::table('icons')->insert([
            'id'=>'e5b6b560-f0ca-11e9-80aa-a5c8ce7c7132',
            'name'=>'https://img.icons8.com/plasticine/35/000000/administrative-tools.png'
        ]);
        //Logistics
        DB::table('icons')->insert([
            'id'=>'e5b6ec80-f0ca-11e9-8593-1b6c4035c40a',
            'name'=>'https://img.icons8.com/cotton/35/000000/delivery.png'
        ]);
        //Document Control
        DB::table('icons')->insert([
            'id'=>'e5b71c10-f0ca-11e9-a9a0-7110575b6b00',
            'name'=>'https://img.icons8.com/cotton/35/000000/sign-document.png'
        ]);
        //PMC
        DB::table('icons')->insert([
            'id'=>'e5b74960-f0ca-11e9-b21a-1961e7b1b8a4',
            'name'=>'https://img.icons8.com/color/35/000000/project-management.png'
        ]);
          //warehouse
        DB::table('icons')->insert([
            'id'=>'e5b7ada0-f0ca-11e9-a325-cb7842192009',
            'name'=>'https://img.icons8.com/officel/35/000000/garage-open.png'
        ]);
        //purchaser
        DB::table('icons')->insert([
            'id'=>'e5b81920-f0ca-11e9-9af8-3b030665fbc4',
            'name'=>"https://img.icons8.com/dusk/35/000000/purchase-order.png"
        ]);
        //Finance
        DB::table('icons')->insert([
            'id'=>'e5b84f40-f0ca-11e9-a7d4-75f0557a678b',
            'name'=>'https://img.icons8.com/plasticine/35/000000/finance-medal.png'
        ]);
        //Produce
        DB::table('icons')->insert([
            'id'=>'83ede2cc-de56-4196-8d63-d976b0c03f3d',
            'name'=>'https://img.icons8.com/cotton/35/000000/guitar-amp.png'
        ]);
        //Quality Control
        DB::table('icons')->insert([
            'id'=>'e72bed68-50a7-4cb3-9e77-12ad8cd70556',
            'name'=>'https://img.icons8.com/doodle/35/000000/warranty-card.png'
        ]);
        //Technology
        DB::table('icons')->insert([
            'id'=>'99c633cf-7538-4abd-9bc6-9578025a8a0f',
            'name'=>'https://img.icons8.com/color/35/000000/technology-lifestyle.png'
        ]);
        //Device
        DB::table('icons')->insert([
            'id'=>'d77ec0e9-80c9-44fc-9fe7-fae0261847b6',
            'name'=>'https://img.icons8.com/color/35/000000/device-manager.png'
        ]);
        //other
        DB::table('icons')->insert([
            'id'=>'77a9aa84-09bc-4831-a256-eed214d1ded1',
            'name'=>"https://img.icons8.com/dusk/35/000000/more.png"
        ]);
        
    }
}
