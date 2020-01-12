<?php

use Illuminate\Database\Seeder;
use App\MyLibs\Models\Company_information;

class CompanyInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company_informations')->insert([
            'id'=>'1edc1510-ff88-11e9-941d-4ff531bf488b',
            'user_id'=>'62e9099c-edf7-4acb-9914-6c07d189a4f0',
            'company_name'=>'HG Management Consulting',
            'job_category_id'=>'7467cae0-f49f-11e9-896f-71db31eadc21',
            'state_id'=>'57c67add-d35b-4d1e-8bef-10a66d9e9402',
            'man_power_id'=>'d2b9a3e3-a921-4aeb-b8d3-3433436441ed',
            'facebook_link'=>'www.facebook.com/hgmanagementconsulting/',
            'wechat_link'=>'www.wechat.com',
            'established_date'=>'Ei Ei',

            'contact_name'=>'San San',
            'contact_phone'=>'09400024099',
            'contact_email'=>'eiei@gmail.com',
            'what_you_do'=>'Consulting',
            'why_should_join'=>'test',
            'address'=>'Mandalay',
            'logo'=>'hg_logo.jpg',
            'licensePhoto'=>'hg_logo.jpg',
        ]);

        DB::table('company_informations')->insert([
            'id'=>'a8fdad97-95b1-445b-af52-f05e1cdf2ad2',
            'user_id'=>'e57b2db0-e5c8-11e9-9bc2-6170f3c18913',
            'company_name'=>'MS Management Consulting',
            'job_category_id'=>'74683880-f49f-11e9-89ba-4f57d7070000',
            'state_id'=>'57c67add-d35b-4d1e-8bef-10a66d9e9402',
            'man_power_id'=>'d2b9a3e3-a921-4aeb-b8d3-3433436441ed',
            'facebook_link'=>'www.facebook.com/groups/mingsui/',
            'wechat_link'=>'www.wechat.com',
            'established_date'=>'Pu Pu',
            'contact_name'=>'Moe Moe',
            'contact_phone'=>'0947127672',
            'contact_email'=>'pupu@gmail.com',
            'what_you_do'=>'Adminstrative',
            'why_should_join'=>'test',
            'address'=>'Mandalay',
            'logo'=>'ms_logo.jpg',
            'licensePhoto'=>'ms_logo.jpg',
        ]);

        DB::table('company_informations')->insert([
            'id'=>'7cd2c735-0df5-4688-b4b8-bc0aaef6fc9e',
            'user_id'=>'cbb37ce0-71d9-4d21-813f-647419a11ef4',
            'company_name'=>'M+',
            'job_category_id'=>'746d1150-f49f-11e9-966f-bfefda04d58d',
            'state_id'=>'57c67add-d35b-4d1e-8bef-10a66d9e9402',
            'man_power_id'=>'d2b9a3e3-a921-4aeb-b8d3-3433436441ed',
            'facebook_link'=>'www.facebook.com',
            'wechat_link'=>'www.wechat.com',
            'established_date'=>'Tu Tu',
            'contact_name'=>'Zin Zin',
            'contact_phone'=>'09265595579',
            'contact_email'=>'tutu@gmail.com',
            'what_you_do'=>'Manufacturing',
            'why_should_join'=>'test',
            'address'=>'Mandalay',
            'logo'=>'mplus.jfif',
            'licensePhoto'=>'mplus.jfif',
        ]);
    }
}