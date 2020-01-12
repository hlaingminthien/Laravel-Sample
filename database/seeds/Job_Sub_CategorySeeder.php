<?php

use Illuminate\Database\Seeder;
use App\MyLibs\Models\Job_Category;
use App\MyLibs\Models\Job_sub_category;

class JobSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Marketing

        DB::table('job_sub_categories')->insert([
            'id'=>Uuid::generate()->string,
            'job_category_id'=>'7466bad0-f49f-11e9-9fea-dd59d0abb8fb',
        	'name'=>'Sales'
        ]);
        DB::table('job_sub_categories')->insert([
            'id'=>Uuid::generate()->string,
            'job_category_id'=>'7466f240-f49f-11e9-a7fd-f138fb086f43',
            'name'=>'Documentary'
        ]);
        DB::table('job_sub_categories')->insert([
            'id'=>Uuid::generate()->string,
            'job_category_id'=>'746728f0-f49f-11e9-ad1f-f9dcbd543b6f',
            'name'=>'After Sale'
        ]);
        DB::table('job_sub_categories')->insert([
            'id'=>Uuid::generate()->string,
            'job_category_id'=>'74676020-f49f-11e9-a1ce-dd4bb8808bf5',
            'name'=>'Promotion'
        ]);

        // HR & ADM

        DB::table('job_sub_categories')->insert([
            'id'=>Uuid::generate()->string,
            'job_category_id'=>'746795b0-f49f-11e9-a11a-25754f4e4e95',
            'name'=>'HR'
        ]);
        DB::table('job_sub_categories')->insert([
            'id'=>Uuid::generate()->string,
            'job_category_id'=>'7467cae0-f49f-11e9-896f-71db31eadc21',
            'name'=>'administrative'
        ]);
        DB::table('job_sub_categories')->insert([
            'id'=>Uuid::generate()->string,
            'job_category_id'=>'74680240-f49f-11e9-b932-29d6c9fb8b0a',
            'name'=>'logistics'
        ]);
        DB::table('job_sub_categories')->insert([
            'id'=>Uuid::generate()->string,
            'job_category_id'=>'74683880-f49f-11e9-89ba-4f57d7070000',
            'name'=>'Document Control'
        ]);

        // Warehouse & Finance

        DB::table('job_sub_categories')->insert([
            'id'=>Uuid::generate()->string,
            'job_category_id'=>'746d4bd0-f49f-11e9-9d93-8553a2bed719',
            'name'=>'PMC'
        ]);
        DB::table('job_sub_categories')->insert([
            'id'=>Uuid::generate()->string,
            'job_category_id'=>'746d4bd0-f49f-11e9-9d93-8553a2bed719',
            'name'=>'Warehouse'
        ]);
        DB::table('job_sub_categories')->insert([
            'id'=>Uuid::generate()->string,
            'job_category_id'=>'746d4bd0-f49f-11e9-9d93-8553a2bed719',
            'name'=>'Logistics'
        ]);
        DB::table('job_sub_categories')->insert([
            'id'=>Uuid::generate()->string,
            'job_category_id'=>'746d4bd0-f49f-11e9-9d93-8553a2bed719',
            'name'=>'Finance'
        ]);

        // Production & Technology

        DB::table('job_sub_categories')->insert([
            'id'=>Uuid::generate()->string,
            'job_category_id'=>'74693810-f49f-11e9-b075-83ec1fff206e',
            'name'=>'Produce'
        ]);
        DB::table('job_sub_categories')->insert([
            'id'=>Uuid::generate()->string,
            'job_category_id'=>'74693810-f49f-11e9-b075-83ec1fff206e',
            'name'=>'Quality Control'
        ]);
        DB::table('job_sub_categories')->insert([
            'id'=>Uuid::generate()->string,
            'job_category_id'=>'74693810-f49f-11e9-b075-83ec1fff206e',
            'name'=>'Technology'
        ]);
        DB::table('job_sub_categories')->insert([
            'id'=>Uuid::generate()->string,
            'job_category_id'=>'74693810-f49f-11e9-b075-83ec1fff206e',
            'name'=>'Device'
        ]);
    }
}
