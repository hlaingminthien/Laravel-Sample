<?php

use Illuminate\Database\Seeder;
use App\MyLibs\Models\Job_Category;

class JobCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //sales
        DB::table('job_categories')->insert([
            'id'=>'7466bad0-f49f-11e9-9fea-dd59d0abb8fb',
            'icon_id'=>'e5b559d0-f0ca-11e9-a6cd-03aba7d582a0',
        	'name'=>'Sales'
        ]);
        //Documentary
        DB::table('job_categories')->insert([
            'id'=>'7466f240-f49f-11e9-a7fd-f138fb086f43',
            'icon_id'=>'e5b59d00-f0ca-11e9-8f32-7dc6c5aeff16',
            'name'=>'Documentary'
        ]);
        //After Sale
         DB::table('job_categories')->insert([
            'id'=>'746728f0-f49f-11e9-ad1f-f9dcbd543b6f',
            'icon_id'=>'e5b5d1a0-f0ca-11e9-91a1-b95297a927a5',
            'name'=>'After Sale'
        ]);
         //Promotion
        DB::table('job_categories')->insert([
            'id'=>'74676020-f49f-11e9-a1ce-dd4bb8808bf5',
            'icon_id'=>'e5b644a0-f0ca-11e9-9163-6379a50f18df',
            'name'=>'Promotion'
        ]);
        //HR
        DB::table('job_categories')->insert([
            'id'=>'746795b0-f49f-11e9-a11a-25754f4e4e95',
            'icon_id'=>'e5b67f00-f0ca-11e9-80c9-839c2b730113',
            'name'=>'HR'
        ]);
        //Administrative
        DB::table('job_categories')->insert([
            'id'=>'7467cae0-f49f-11e9-896f-71db31eadc21',
            'icon_id'=>'e5b6b560-f0ca-11e9-80aa-a5c8ce7c7132',
            'name'=>'Administrative'
        ]);
        //logistics
        DB::table('job_categories')->insert([
            'id'=>'74680240-f49f-11e9-b932-29d6c9fb8b0a',
            'icon_id'=>'e5b6ec80-f0ca-11e9-8593-1b6c4035c40a',
            'name'=>'Logistics'
        ]);
        //Document Control
        DB::table('job_categories')->insert([
            'id'=>'74683880-f49f-11e9-89ba-4f57d7070000',
            'icon_id'=>'e5b71c10-f0ca-11e9-a9a0-7110575b6b00',
            'name'=>'Document Control'
        ]);
        //PMC
        DB::table('job_categories')->insert([
            'id'=>'746d1150-f49f-11e9-966f-bfefda04d58d',
            'icon_id'=>'e5b74960-f0ca-11e9-b21a-1961e7b1b8a4',
            'name'=>'PMC'
        ]);
        //warehouse
        DB::table('job_categories')->insert([
            'id'=>'746d4bd0-f49f-11e9-9d93-8553a2bed719',
            'icon_id'=>'e5b7ada0-f0ca-11e9-a325-cb7842192009',
            'name'=>'Warehouse'
        ]);
        //Purchaser
        DB::table('job_categories')->insert([
            'id'=>'74686f30-f49f-11e9-97ef-01b39cd50c22',
            'icon_id'=>'e5b81920-f0ca-11e9-9af8-3b030665fbc4',
            'name'=>'Purchaser'
        ]);
        //Finance
        DB::table('job_categories')->insert([
            'id'=>'7468a390-f49f-11e9-9899-0510b8285cec',
            'icon_id'=>'e5b84f40-f0ca-11e9-a7d4-75f0557a678b',
            'name'=>'Finance'
        ]);
        //Produce
        DB::table('job_categories')->insert([
            'id'=>'7468d600-f49f-11e9-9168-fba73410ec5f',
            'icon_id'=>'83ede2cc-de56-4196-8d63-d976b0c03f3d',
            'name'=>'Produce'
        ]);
        //Quality Control
        DB::table('job_categories')->insert([
            'id'=>'74690740-f49f-11e9-90dc-c3bd143bc8d7',
            'icon_id'=>'e72bed68-50a7-4cb3-9e77-12ad8cd70556',
            'name'=>'Quality Control'
        ]);
        //Technology
        DB::table('job_categories')->insert([
            'id'=>'74693810-f49f-11e9-b075-83ec1fff206e',
            'icon_id'=>'99c633cf-7538-4abd-9bc6-9578025a8a0f',
            'name'=>'Technology'
        ]);
        //Device
        DB::table('job_categories')->insert([
            'id'=>'746968e0-f49f-11e9-956c-93a06a140619',
            'icon_id'=>'d77ec0e9-80c9-44fc-9fe7-fae0261847b6',
            'name'=>'Device'
        ]);
        //Other
        DB::table('job_categories')->insert([
            'id'=>'7469a720-f49f-11e9-9fd8-2dbc14befdfd',
            'icon_id'=>'77a9aa84-09bc-4831-a256-eed214d1ded1',
            'name'=>'Other'
        ]);




    }
}
