<?php

use Illuminate\Database\Seeder;
use App\MyLibs\Models\Card;
use Carbon\Carbon;

class JobPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_positions')->insert([
            'id'=>'76cf89cb-1d8e-4a68-bca7-8a6cec5de9c6',
            'job_code_id'=>'J0010023001',
            'company_id'=>'1edc1510-ff88-11e9-941d-4ff531bf488b',
            'jobcategory_id'=>'7468a390-f49f-11e9-9899-0510b8285cec',
            'position_name'=>'Accountant',
            'gender'=>'female',
            'offer_employee_count'=>2,
            'age'=>"Between 22 to 30",
            'exper_id'=>'00570e3b-4eef-4d0c-ac81-ce88111861fb',
            'job_description'=>'Prepare balance sheets, profit and loss statements and other financial reports. Responsibilities also include analyzing trends, costs, revenues, financial commitments and obligations incurred to predict future revenues and expenses.',
            'job_requirement'=>'Bachelor’s or master’s degree in tax, accounting, or finance
                CPA Minimum 5-10 years’ experience in accounting/finance
                Experience with financial reporting requirements
                Experience in working with multiple legal entities under different legal umbrellas',
            'salary'=>'300000',
            'state_id'=>'22062b80-21be-11e8-8e88-07aab376387d',
            'job_time'=>'full time',
            'benefits'=>'This is the perfect place to talk about the working hours and benefits specific to your company. You’ll want to advise prospective accountants about work from home and support staff options, and you can also take this opportunity to focus on the benefits that set your firm apart, such as stock and ownership options, paid parental leave, or corporate travel accounts',
            'others'=>'others'
        ]);

        DB::table('job_positions')->insert([
            'id'=>'6b690d43-3818-4662-847b-5eb1169ab09a',
            'job_code_id'=>'J0010023002',
            'company_id'=>'1edc1510-ff88-11e9-941d-4ff531bf488b',
            'jobcategory_id'=>'7469a720-f49f-11e9-9fd8-2dbc14befdfd',
            'position_name'=>'Office Staff',
            'gender'=>'female',
            'offer_employee_count'=>1,
            'age'=>"Between 25 to 30",
            'exper_id'=>'00570e3b-4eef-4d0c-ac81-ce88111861fb',
            'job_description'=>'Prepare balance sheets, profit and loss statements and other financial reports. Responsibilities also include analyzing trends, costs, revenues, financial commitments and obligations incurred to predict future revenues and expenses.',
            'job_requirement'=>'Bachelor’s or master’s degree in tax, accounting, or finance
                CPA Minimum 5-10 years’ experience in accounting/finance
                Experience with financial reporting requirements
                Experience in working with multiple legal entities under different legal umbrellas',
            'salary'=>'300000',
            'state_id'=>'21d67960-21be-11e8-8078-8380230dfe03',
            'job_time'=>'full time',
            'topping_time'=>\Carbon\Carbon::createFromDate(2014,07,22)->toDateTimeString(),
            'refresh_time'=>\Carbon\Carbon::createFromDate(2015,07,07)->toDateTimeString(),
            'benefits'=>'This is the perfect place to talk about the working hours and benefits specific to your company. You’ll want to advise prospective accountants about work from home and support staff options, and you can also take this opportunity to focus on the benefits that set your firm apart, such as stock and ownership options, paid parental leave, or corporate travel accounts',
            'others'=>'others'
        ]);

        DB::table('job_positions')->insert([
            'id'=>'dd7a9e3e-8ea1-4261-bdf5-df46475356ba',
            'job_code_id'=>'J0010023003',
            'company_id'=>'1edc1510-ff88-11e9-941d-4ff531bf488b',
            'jobcategory_id'=>'74686f30-f49f-11e9-97ef-01b39cd50c22',
            'position_name'=>'Purchaser',
            'gender'=>'female',
            'offer_employee_count'=>1,
            'age'=>"Between 22 to 35",
            'exper_id'=>'00570e3b-4eef-4d0c-ac81-ce88111861fb',
            'job_description'=>'Prepare balance sheets, profit and loss statements and other financial reports. Responsibilities also include analyzing trends, costs, revenues, financial commitments and obligations incurred to predict future revenues and expenses.',
            'job_requirement'=>'Bachelor’s or master’s degree in tax, accounting, or finance
                CPA Minimum 5-10 years’ experience in accounting/finance
                Experience with financial reporting requirements
                Experience in working with multiple legal entities under different legal umbrellas',
            'salary'=>'300000',
            'state_id'=>'22062b80-21be-11e8-8e88-07aab376387d',
            'job_time'=>'full time',
            'topping_time'=>\Carbon\Carbon::createFromDate(2016,07,22)->toDateTimeString(),
            'benefits'=>'This is the perfect place to talk about the working hours and benefits specific to your company. You’ll want to advise prospective accountants about work from home and support staff options, and you can also take this opportunity to focus on the benefits that set your firm apart, such as stock and ownership options, paid parental leave, or corporate travel accounts',
            'others'=>'others'
        ]);

        DB::table('job_positions')->insert([
            'id'=>'f021ed16-4915-467a-a040-5f4d61c1d8bd',
            'job_code_id'=>'J0010023004',
            'company_id'=>'1edc1510-ff88-11e9-941d-4ff531bf488b',
            'jobcategory_id'=>'74693810-f49f-11e9-b075-83ec1fff206e',
            'position_name'=>'Web Developer',
            'gender'=>'male',
            'offer_employee_count'=>5,
            'age'=>"Between 20 to 30",
            'exper_id'=>'00570e3b-4eef-4d0c-ac81-ce88111861fb',
            'job_description'=>'Web developers build and shape visitors’ experiences at websites. They do this through the creation of page layouts (headings and paragraphs), website styling (colors and fonts), and page features (animations and pictures). Interactive features, such as submitting online payments securely, are a necessary feature of ecommerce sites.',
            'job_requirement'=>'Graphic design
                Know HTML, CSS, JavaScript, PHP, and other relevant web design coding languages
                Collaborate
                Present design specs
                Troubleshoot website problems
                Maintain and update websites
                Stay up-to-date on technology',
            'salary'=>'500000',
            'state_id'=>'22062b80-21be-11e8-8e88-07aab376387d',
            'job_time'=>'full time',
            'benefits'=>'It’s one of the most sought-after jobs
                It’s a high-paying job
                You can work independently(be your own boss) or with a team
                You can work from anywhere
                It brings out or improves your creativity(build your own idea from nothing)
                It’s interesting and fun
                It helps you become a better problem-solver
                It is a job for the future',
            'others'=>'others'
        ]);

        DB::table('job_positions')->insert([
            'id'=>'b6536396-0c8b-4f54-8f56-adef96b1774f',
            'job_code_id'=>'J0010023005',
            'company_id'=>'1edc1510-ff88-11e9-941d-4ff531bf488b',
            'jobcategory_id'=>'74693810-f49f-11e9-b075-83ec1fff206e',
            'position_name'=>'PHP Developer',
            'gender'=>'female',
            'offer_employee_count'=>3,
            'exper_id'=>'00570e3b-4eef-4d0c-ac81-ce88111861fb',
            'job_description'=>'Web developers build and shape visitors’ experiences at websites. They do this through the creation of page layouts (headings and paragraphs), website styling (colors and fonts), and page features (animations and pictures). Interactive features, such as submitting online payments securely, are a necessary feature of ecommerce sites.',
            'job_requirement'=>'Graphic design
                Know HTML, CSS, JavaScript, PHP, and other relevant web design coding languages
                Collaborate
                Present design specs
                Troubleshoot website problems
                Maintain and update websites
                Stay up-to-date on technology',
            'salary'=>'1500000',
            'state_id'=>'22062b80-21be-11e8-8e88-07aab376387d',
            'job_time'=>'full time',
            'benefits'=>'It’s one of the most sought-after jobs
                It’s a high-paying job
                You can work independently(be your own boss) or with a team
                You can work from anywhere
                It brings out or improves your creativity(build your own idea from nothing)
                It’s interesting and fun
                It helps you become a better problem-solver
                It is a job for the future',
            'others'=>'others'
        ]);

        DB::table('job_positions')->insert([
            'id'=>'0f519e19-7e98-456a-b149-eb65bd740d77',
            'job_code_id'=>'J0010023006',
            'company_id'=>'1edc1510-ff88-11e9-941d-4ff531bf488b',
            'jobcategory_id'=>'74693810-f49f-11e9-b075-83ec1fff206e',
            'position_name'=>'Android Developer',
            'gender'=>'female',
            'offer_employee_count'=>1,
            'exper_id'=>'00570e3b-4eef-4d0c-ac81-ce88111861fb',
            'job_description'=>'Web developers build and shape visitors’ experiences at websites. They do this through the creation of page layouts (headings and paragraphs), website styling (colors and fonts), and page features (animations and pictures). Interactive features, such as submitting online payments securely, are a necessary feature of ecommerce sites.',
            'job_requirement'=>'Graphic design
                Know HTML, CSS, JavaScript, PHP, and other relevant web design coding languages
                Collaborate
                Present design specs
                Troubleshoot website problems
                Maintain and update websites
                Stay up-to-date on technology',
            'salary'=>'700000',
            'state_id'=>'22062b80-21be-11e8-8e88-07aab376387d',
            'job_time'=>'full time',
            'topping_time'=>\Carbon\Carbon::createFromDate(2017,07,22)->toDateTimeString(),
            'refresh_time'=>\Carbon\Carbon::createFromDate(2018,07,22)->toDateTimeString(),
            'benefits'=>'It’s one of the most sought-after jobs
                It’s a high-paying job
                You can work independently(be your own boss) or with a team
                You can work from anywhere
                It brings out or improves your creativity(build your own idea from nothing)
                It’s interesting and fun
                It helps you become a better problem-solver
                It is a job for the future',
            'others'=>'others'
        ]);

        DB::table('job_positions')->insert([
            'id'=>'dae14845-8195-40ac-b799-d55fd39b9699',
            'job_code_id'=>'J0010023007',
            'company_id'=>'1edc1510-ff88-11e9-941d-4ff531bf488b',
            'jobcategory_id'=>'7469a720-f49f-11e9-9fd8-2dbc14befdfd',
            'position_name'=>'Driver',
            'gender'=>'female',
            'offer_employee_count'=>1,
            'exper_id'=>'00570e3b-4eef-4d0c-ac81-ce88111861fb',
            'job_description'=>'full time job',
            'job_requirement'=>'အကျင့်ကောင်းမွန်သူ စိတ်ရှည်သည်းခံသူ',
            'salary'=>'200000',
            'state_id'=>'21d67960-21be-11e8-8078-8380230dfe03',
            'job_time'=>'full time',
            'topping_time'=>\Carbon\Carbon::createFromDate(2019,07,22)->toDateTimeString(),
            'benefits'=>'It’s one of the most sought-after jobs
                It’s a high-paying job
                You can work independently(be your own boss) or with a team
                You can work from anywhere
                It brings out or improves your creativity(build your own idea from nothing)
                It’s interesting and fun
                It helps you become a better problem-solver
                It is a job for the future',
            'others'=>'others'
        ]);

        DB::table('job_positions')->insert([
            'id'=>'58e6b5a6-c314-4b27-9850-c8d8f5c44a1e',
            'job_code_id'=>'J0010023008',
            'company_id'=>'1edc1510-ff88-11e9-941d-4ff531bf488b',
            'jobcategory_id'=>'7469a720-f49f-11e9-9fd8-2dbc14befdfd',
            'position_name'=>'Security',
            'gender'=>'female',
            'offer_employee_count'=>1,
            'exper_id'=>'00570e3b-4eef-4d0c-ac81-ce88111861fb',
            'job_description'=>'full time job',
            'job_requirement'=>'အကျင့်ကောင်းမွန်သူ စိတ်ရှည်သည်းခံသူ',
            'salary'=>'180000',
            'state_id'=>'21d67960-21be-11e8-8078-8380230dfe03',
            'job_time'=>'full time',
            'topping_time'=>\Carbon\Carbon::createFromDate(2011,07,22)->toDateTimeString(),
            'benefits'=>'It’s one of the most sought-after jobs
                It’s a high-paying job
                You can work independently(be your own boss) or with a team
                You can work from anywhere
                It brings out or improves your creativity(build your own idea from nothing)
                It’s interesting and fun
                It helps you become a better problem-solver
                It is a job for the future',
            'others'=>'others'
        ]);

        DB::table('job_positions')->insert([
            'id'=>'a135eb29-6eca-4114-a134-4a35cc065bb2',
            'job_code_id'=>'J0010023009',
            'company_id'=>'1edc1510-ff88-11e9-941d-4ff531bf488b',
            'jobcategory_id'=>'7469a720-f49f-11e9-9fd8-2dbc14befdfd',
            'position_name'=>'Cleaner',
            'gender'=>'female',
            'offer_employee_count'=>1,
            'exper_id'=>'00570e3b-4eef-4d0c-ac81-ce88111861fb',
            'job_description'=>'full time job',
            'job_requirement'=>'အကျင့်ကောင်းမွန်သူ စိတ်ရှည်သည်းခံသူ',
            'salary'=>'150000',
            'state_id'=>'22062b80-21be-11e8-8e88-07aab376387d',
            'job_time'=>'full time',
            'benefits'=>'It’s one of the most sought-after jobs
                It’s a high-paying job
                You can work independently(be your own boss) or with a team
                You can work from anywhere
                It brings out or improves your creativity(build your own idea from nothing)
                It’s interesting and fun
                It helps you become a better problem-solver
                It is a job for the future',
            'others'=>'others'
        ]);

        DB::table('job_positions')->insert([
            'id'=>'3da5749e-0351-4f10-b36c-f3984a6a4d06',
            'job_code_id'=>'J0010023010',
            'company_id'=>'1edc1510-ff88-11e9-941d-4ff531bf488b',
            'jobcategory_id'=>'7469a720-f49f-11e9-9fd8-2dbc14befdfd',
            'position_name'=>'Chinese Translator',
            'gender'=>'female',
            'offer_employee_count'=>1,
            'exper_id'=>'00570e3b-4eef-4d0c-ac81-ce88111861fb',
            'job_description'=>'full time job',
            'job_requirement'=>'အကျင့်ကောင်းမွန်သူ စိတ်ရှည်သည်းခံသူ',
            'salary'=>'400000',
            'state_id'=>'22062b80-21be-11e8-8e88-07aab376387d',
            'job_time'=>'full time',
            'benefits'=>'It’s one of the most sought-after jobs
                It’s a high-paying job
                You can work independently(be your own boss) or with a team
                You can work from anywhere
                It brings out or improves your creativity(build your own idea from nothing)
                It’s interesting and fun
                It helps you become a better problem-solver
                It is a job for the future',
            'others'=>'others'
        ]);

        DB::table('job_positions')->insert([
            'id'=>'401130c9-de03-40c9-9763-8b51dd582e78',
            'job_code_id'=>'J0010023011',
            'company_id'=>'1edc1510-ff88-11e9-941d-4ff531bf488b',
            'jobcategory_id'=>'7469a720-f49f-11e9-9fd8-2dbc14befdfd',
            'position_name'=>'Japanese Translator',
            'gender'=>'female',
            'offer_employee_count'=>1,
            'exper_id'=>'00570e3b-4eef-4d0c-ac81-ce88111861fb',
            'job_description'=>'full time job',
            'job_requirement'=>'အကျင့်ကောင်းမွန်သူ စိတ်ရှည်သည်းခံသူ',
            'salary'=>'400000',
            'state_id'=>'22062b80-21be-11e8-8e88-07aab376387d',
            'job_time'=>'full time',
            'benefits'=>'It’s one of the most sought-after jobs
                It’s a high-paying job
                You can work independently(be your own boss) or with a team
                You can work from anywhere
                It brings out or improves your creativity(build your own idea from nothing)
                It’s interesting and fun
                It helps you become a better problem-solver
                It is a job for the future',
            'others'=>'others'
        ]);

        DB::table('job_positions')->insert([
            'id'=>'319fb078-351d-4eab-b0ef-fa20a3c61428',
            'job_code_id'=>'J0010023012',
            'company_id'=>'1edc1510-ff88-11e9-941d-4ff531bf488b',
            'jobcategory_id'=>'7469a720-f49f-11e9-9fd8-2dbc14befdfd',
            'position_name'=>'Korean Translator',
            'gender'=>'female',
            'offer_employee_count'=>1,
            'exper_id'=>'00570e3b-4eef-4d0c-ac81-ce88111861fb',
            'job_description'=>'full time job',
            'job_requirement'=>'အကျင့်ကောင်းမွန်သူ စိတ်ရှည်သည်းခံသူ',
            'salary'=>'400000',
            'state_id'=>'22062b80-21be-11e8-8e88-07aab376387d',
            'job_time'=>'full time',
            'benefits'=>'It’s one of the most sought-after jobs
                It’s a high-paying job
                You can work independently(be your own boss) or with a team
                You can work from anywhere
                It brings out or improves your creativity(build your own idea from nothing)
                It’s interesting and fun
                It helps you become a better problem-solver
                It is a job for the future',
            'others'=>'others'
        ]);

        DB::table('job_positions')->insert([
            'id'=>'e0e09f9b-bbea-408f-83f6-c53ae1a17810',
            'job_code_id'=>'J0010023013',
            'company_id'=>'1edc1510-ff88-11e9-941d-4ff531bf488b',
            'jobcategory_id'=>'74693810-f49f-11e9-b075-83ec1fff206e',
            'position_name'=>'Vedio Editing',
            'gender'=>'female',
            'offer_employee_count'=>6,
            'exper_id'=>'00570e3b-4eef-4d0c-ac81-ce88111861fb',
            'job_description'=>'full time job',
            'job_requirement'=>'အကျင့်ကောင်းမွန်သူ စိတ်ရှည်သည်းခံသူ',
            'salary'=>'200000',
            'state_id'=>'21d92aa0-21be-11e8-a279-814c6c022042',
            'job_time'=>'full time',
            'benefits'=>'It’s one of the most sought-after jobs
                It’s a high-paying job
                You can work independently(be your own boss) or with a team
                You can work from anywhere
                It brings out or improves your creativity(build your own idea from nothing)
                It’s interesting and fun
                It helps you become a better problem-solver
                It is a job for the future',
            'others'=>'others'
        ]);

        DB::table('job_positions')->insert([
            'id'=>'2389569e-c759-427d-a6e6-8ab1a35ef0b6',
            'job_code_id'=>'J0010023014',
            'company_id'=>'1edc1510-ff88-11e9-941d-4ff531bf488b',
            'jobcategory_id'=>'7469a720-f49f-11e9-9fd8-2dbc14befdfd',
            'position_name'=>'Writing(English)',
            'gender'=>'female',
            'offer_employee_count'=>5,
            'exper_id'=>'00570e3b-4eef-4d0c-ac81-ce88111861fb',
            'job_description'=>'full time job',
            'job_requirement'=>'အကျင့်ကောင်းမွန်သူ စိတ်ရှည်သည်းခံသူ',
            'salary'=>'200000',
            'state_id'=>'21d92aa0-21be-11e8-a279-814c6c022042',
            'job_time'=>'full time',
            'benefits'=>'It’s one of the most sought-after jobs
                It’s a high-paying job
                You can work independently(be your own boss) or with a team
                You can work from anywhere
                It brings out or improves your creativity(build your own idea from nothing)
                It’s interesting and fun
                It helps you become a better problem-solver
                It is a job for the future',
            'others'=>'others'
        ]);

        DB::table('job_positions')->insert([
            'id'=>'149d6271-43da-44aa-8a07-ea82d2e78886',
            'job_code_id'=>'J0010023015',
            'company_id'=>'1edc1510-ff88-11e9-941d-4ff531bf488b',
            'jobcategory_id'=>'7466f240-f49f-11e9-a7fd-f138fb086f43',
            'position_name'=>'Poto Editing',
            'gender'=>'female',
            'offer_employee_count'=>1,
            'exper_id'=>'00570e3b-4eef-4d0c-ac81-ce88111861fb',
            'job_description'=>'full time job',
            'job_requirement'=>'အကျင့်ကောင်းမွန်သူ စိတ်ရှည်သည်းခံသူ',
            'salary'=>'200000',
            'state_id'=>'22062b80-21be-11e8-8e88-07aab376387d',
            'job_time'=>'full time',
            'benefits'=>'It’s one of the most sought-after jobs
                It’s a high-paying job
                You can work independently(be your own boss) or with a team
                You can work from anywhere
                It brings out or improves your creativity(build your own idea from nothing)
                It’s interesting and fun
                It helps you become a better problem-solver
                It is a job for the future',
            'others'=>'others'
        ]);

        DB::table('job_positions')->insert([
            'id'=>'c25aacf0-bba8-4d05-a6ba-256134be3dcd',
            'job_code_id'=>'J0010023015',
            'company_id'=>'1edc1510-ff88-11e9-941d-4ff531bf488b',
            'jobcategory_id'=>'746d1150-f49f-11e9-966f-bfefda04d58d',
            'position_name'=>'Project Manager',
            'gender'=>'female',
            'offer_employee_count'=>2,
            'exper_id'=>'00570e3b-4eef-4d0c-ac81-ce88111861fb',
            'job_description'=>'full time job',
            'job_requirement'=>'အကျင့်ကောင်းမွန်သူ စိတ်ရှည်သည်းခံသူ',
            'salary'=>'2000000',
            'state_id'=>'21dc2130-21be-11e8-b824-f7edc35d7322',
            'job_time'=>'full time',
            'benefits'=>'It’s one of the most sought-after jobs
                It’s a high-paying job
                You can work independently(be your own boss) or with a team
                You can work from anywhere
                It brings out or improves your creativity(build your own idea from nothing)
                It’s interesting and fun
                It helps you become a better problem-solver
                It is a job for the future',
            'others'=>'others'
        ]);


        //----------------------- employee2 -------------------------

        DB::table('job_positions')->insert([
            'id'=>'1d501fbd-4eeb-49d2-8fc1-58cc5950f36a',
            'job_code_id'=>'J0010023001',
            'company_id'=>'a8fdad97-95b1-445b-af52-f05e1cdf2ad2',
            'jobcategory_id'=>'7468a390-f49f-11e9-9899-0510b8285cec',
            'position_name'=>'Accountant',
            'gender'=>'female',
            'offer_employee_count'=>2,
            'exper_id'=>'00570e3b-4eef-4d0c-ac81-ce88111861fb',
            'job_description'=>'Prepare balance sheets, profit and loss statements and other financial reports. Responsibilities also include analyzing trends, costs, revenues, financial commitments and obligations incurred to predict future revenues and expenses.',
            'job_requirement'=>'Bachelor’s or master’s degree in tax, accounting, or finance
                CPA Minimum 5-10 years’ experience in accounting/finance
                Experience with financial reporting requirements
                Experience in working with multiple legal entities under different legal umbrellas',
            'salary'=>'300000',
            'state_id'=>'21dc2130-21be-11e8-b824-f7edc35d7322',
            'job_time'=>'full time',
            'benefits'=>'This is the perfect place to talk about the working hours and benefits specific to your company. You’ll want to advise prospective accountants about work from home and support staff options, and you can also take this opportunity to focus on the benefits that set your firm apart, such as stock and ownership options, paid parental leave, or corporate travel accounts',
            'others'=>'others'
        ]);

        DB::table('job_positions')->insert([
            'id'=>'af63a20e-919e-48ec-a6fc-0d0981e97f87',
            'job_code_id'=>'J0010023002',
            'company_id'=>'a8fdad97-95b1-445b-af52-f05e1cdf2ad2',
            'jobcategory_id'=>'746795b0-f49f-11e9-a11a-25754f4e4e95',
            'position_name'=>'Office Staff',
            'gender'=>'female',
            'offer_employee_count'=>1,
            'exper_id'=>'00570e3b-4eef-4d0c-ac81-ce88111861fb',
            'job_description'=>'Prepare balance sheets, profit and loss statements and other financial reports. Responsibilities also include analyzing trends, costs, revenues, financial commitments and obligations incurred to predict future revenues and expenses.',
            'job_requirement'=>'Bachelor’s or master’s degree in tax, accounting, or finance
                CPA Minimum 5-10 years’ experience in accounting/finance
                Experience with financial reporting requirements
                Experience in working with multiple legal entities under different legal umbrellas',
            'salary'=>'300000',
            'state_id'=>'22062b80-21be-11e8-8e88-07aab376387d',
            'job_time'=>'full time',
            'benefits'=>'This is the perfect place to talk about the working hours and benefits specific to your company. You’ll want to advise prospective accountants about work from home and support staff options, and you can also take this opportunity to focus on the benefits that set your firm apart, such as stock and ownership options, paid parental leave, or corporate travel accounts',
            'others'=>'others'
        ]);

        DB::table('job_positions')->insert([
            'id'=>'ae95790e-ad9e-4eba-a074-ca8f3059ae72',
            'job_code_id'=>'J0010023003',
            'company_id'=>'a8fdad97-95b1-445b-af52-f05e1cdf2ad2',
            'jobcategory_id'=>'74686f30-f49f-11e9-97ef-01b39cd50c22',
            'position_name'=>'Purchaser',
            'gender'=>'female',
            'offer_employee_count'=>1,
            'exper_id'=>'00570e3b-4eef-4d0c-ac81-ce88111861fb',
            'job_description'=>'Prepare balance sheets, profit and loss statements and other financial reports. Responsibilities also include analyzing trends, costs, revenues, financial commitments and obligations incurred to predict future revenues and expenses.',
            'job_requirement'=>'Bachelor’s or master’s degree in tax, accounting, or finance
                CPA Minimum 5-10 years’ experience in accounting/finance
                Experience with financial reporting requirements
                Experience in working with multiple legal entities under different legal umbrellas',
            'salary'=>'300000',
            'state_id'=>'21e278e0-21be-11e8-9658-1b029b0c42cb',
            'job_time'=>'full time',
            'benefits'=>'This is the perfect place to talk about the working hours and benefits specific to your company. You’ll want to advise prospective accountants about work from home and support staff options, and you can also take this opportunity to focus on the benefits that set your firm apart, such as stock and ownership options, paid parental leave, or corporate travel accounts',
            'others'=>'others'
        ]);

        DB::table('job_positions')->insert([
            'id'=>'f4c492cc-b09a-4db1-8015-23ce5b7354c1',
            'job_code_id'=>'J0010023004',
            'company_id'=>'a8fdad97-95b1-445b-af52-f05e1cdf2ad2',
            'jobcategory_id'=>'74693810-f49f-11e9-b075-83ec1fff206e',
            'position_name'=>'Web Developer',
            'gender'=>'male',
            'offer_employee_count'=>5,
            'exper_id'=>'00570e3b-4eef-4d0c-ac81-ce88111861fb',
            'job_description'=>'Web developers build and shape visitors’ experiences at websites. They do this through the creation of page layouts (headings and paragraphs), website styling (colors and fonts), and page features (animations and pictures). Interactive features, such as submitting online payments securely, are a necessary feature of ecommerce sites.',
            'job_requirement'=>'Graphic design
                Know HTML, CSS, JavaScript, PHP, and other relevant web design coding languages
                Collaborate
                Present design specs
                Troubleshoot website problems
                Maintain and update websites
                Stay up-to-date on technology',
            'salary'=>'500000',
            'state_id'=>'22062b80-21be-11e8-8e88-07aab376387d',
            'job_time'=>'full time',
            'benefits'=>'It’s one of the most sought-after jobs
                It’s a high-paying job
                You can work independently(be your own boss) or with a team
                You can work from anywhere
                It brings out or improves your creativity(build your own idea from nothing)
                It’s interesting and fun
                It helps you become a better problem-solver
                It is a job for the future',
            'others'=>'others'
        ]);

        DB::table('job_positions')->insert([
            'id'=>Uuid::generate()->string,
            'job_code_id'=>'J0010023005',
            'company_id'=>'a8fdad97-95b1-445b-af52-f05e1cdf2ad2',
            'jobcategory_id'=>'74693810-f49f-11e9-b075-83ec1fff206e',
            'position_name'=>'PHP Developer',
            'gender'=>'female',
            'offer_employee_count'=>3,
            'exper_id'=>'00570e3b-4eef-4d0c-ac81-ce88111861fb',
            'job_description'=>'Web developers build and shape visitors’ experiences at websites. They do this through the creation of page layouts (headings and paragraphs), website styling (colors and fonts), and page features (animations and pictures). Interactive features, such as submitting online payments securely, are a necessary feature of ecommerce sites.',
            'job_requirement'=>'Graphic design
                Know HTML, CSS, JavaScript, PHP, and other relevant web design coding languages
                Collaborate
                Present design specs
                Troubleshoot website problems
                Maintain and update websites
                Stay up-to-date on technology',
            'salary'=>'1500000',
            'state_id'=>'21e278e0-21be-11e8-9658-1b029b0c42cb',
            'job_time'=>'full time',
            'benefits'=>'It’s one of the most sought-after jobs
                It’s a high-paying job
                You can work independently(be your own boss) or with a team
                You can work from anywhere
                It brings out or improves your creativity(build your own idea from nothing)
                It’s interesting and fun
                It helps you become a better problem-solver
                It is a job for the future',
            'others'=>'others'
        ]);

        DB::table('job_positions')->insert([
            'id'=>Uuid::generate()->string,
            'job_code_id'=>'J0010023006',
            'company_id'=>'a8fdad97-95b1-445b-af52-f05e1cdf2ad2',
            'jobcategory_id'=>'74693810-f49f-11e9-b075-83ec1fff206e',
            'position_name'=>'Android Developer',
            'gender'=>'female',
            'offer_employee_count'=>1,
            'exper_id'=>'00570e3b-4eef-4d0c-ac81-ce88111861fb',
            'job_description'=>'Web developers build and shape visitors’ experiences at websites. They do this through the creation of page layouts (headings and paragraphs), website styling (colors and fonts), and page features (animations and pictures). Interactive features, such as submitting online payments securely, are a necessary feature of ecommerce sites.',
            'job_requirement'=>'Graphic design
                Know HTML, CSS, JavaScript, PHP, and other relevant web design coding languages
                Collaborate
                Present design specs
                Troubleshoot website problems
                Maintain and update websites
                Stay up-to-date on technology',
            'salary'=>'700000',
            'state_id'=>'22062b80-21be-11e8-8e88-07aab376387d',
            'job_time'=>'full time',
            'topping_time'=>\Carbon\Carbon::createFromDate(2014,05,01)->toDateTimeString(),
            'refresh_time'=>\Carbon\Carbon::createFromDate(2014,05,02)->toDateTimeString(),
            'benefits'=>'It’s one of the most sought-after jobs
                It’s a high-paying job
                You can work independently(be your own boss) or with a team
                You can work from anywhere
                It brings out or improves your creativity(build your own idea from nothing)
                It’s interesting and fun
                It helps you become a better problem-solver
                It is a job for the future',
            'others'=>'others'
        ]);

        DB::table('job_positions')->insert([
            'id'=>Uuid::generate()->string,
            'job_code_id'=>'J0010023007',
            'company_id'=>'a8fdad97-95b1-445b-af52-f05e1cdf2ad2',
            'jobcategory_id'=>'7469a720-f49f-11e9-9fd8-2dbc14befdfd',
            'position_name'=>'Driver',
            'gender'=>'female',
            'offer_employee_count'=>1,
            'exper_id'=>'00570e3b-4eef-4d0c-ac81-ce88111861fb',
            'job_description'=>'full time job',
            'job_requirement'=>'အကျင့်ကောင်းမွန်သူ စိတ်ရှည်သည်းခံသူ',
            'salary'=>'200000',
            'state_id'=>'22062b80-21be-11e8-8e88-07aab376387d',
            'job_time'=>'full time',
            'benefits'=>'It’s one of the most sought-after jobs
                It’s a high-paying job
                You can work independently(be your own boss) or with a team
                You can work from anywhere
                It brings out or improves your creativity(build your own idea from nothing)
                It’s interesting and fun
                It helps you become a better problem-solver
                It is a job for the future',
            'others'=>'others'
        ]);

        DB::table('job_positions')->insert([
            'id'=>Uuid::generate()->string,
            'job_code_id'=>'J0010023008',
            'company_id'=>'a8fdad97-95b1-445b-af52-f05e1cdf2ad2',
            'jobcategory_id'=>'7469a720-f49f-11e9-9fd8-2dbc14befdfd',
            'position_name'=>'Security',
            'gender'=>'female',
            'offer_employee_count'=>1,
            'exper_id'=>'00570e3b-4eef-4d0c-ac81-ce88111861fb',
            'job_description'=>'full time job',
            'job_requirement'=>'အကျင့်ကောင်းမွန်သူ စိတ်ရှည်သည်းခံသူ',
            'salary'=>'180000',
            'state_id'=>'21e8aee0-21be-11e8-9343-39037d701a10',
            'job_time'=>'full time',
            'topping_time'=>\Carbon\Carbon::createFromDate(2017,07,22)->toDateTimeString(),
            'benefits'=>'It’s one of the most sought-after jobs
                It’s a high-paying job
                You can work independently(be your own boss) or with a team
                You can work from anywhere
                It brings out or improves your creativity(build your own idea from nothing)
                It’s interesting and fun
                It helps you become a better problem-solver
                It is a job for the future',
            'others'=>'others'
        ]);

        DB::table('job_positions')->insert([
            'id'=>Uuid::generate()->string,
            'job_code_id'=>'J0010023009',
            'company_id'=>'a8fdad97-95b1-445b-af52-f05e1cdf2ad2',
            'jobcategory_id'=>'7469a720-f49f-11e9-9fd8-2dbc14befdfd',
            'position_name'=>'Cleaner',
            'gender'=>'female',
            'offer_employee_count'=>1,
            'exper_id'=>'00570e3b-4eef-4d0c-ac81-ce88111861fb',
            'job_description'=>'full time job',
            'job_requirement'=>'အကျင့်ကောင်းမွန်သူ စိတ်ရှည်သည်းခံသူ',
            'salary'=>'150000',
            'state_id'=>'21e8aee0-21be-11e8-9343-39037d701a10',
            'job_time'=>'full time',
            'benefits'=>'It’s one of the most sought-after jobs
                It’s a high-paying job
                You can work independently(be your own boss) or with a team
                You can work from anywhere
                It brings out or improves your creativity(build your own idea from nothing)
                It’s interesting and fun
                It helps you become a better problem-solver
                It is a job for the future',
            'others'=>'others'
        ]);

        DB::table('job_positions')->insert([
            'id'=>Uuid::generate()->string,
            'job_code_id'=>'J0010023010',
            'company_id'=>'a8fdad97-95b1-445b-af52-f05e1cdf2ad2',
            'jobcategory_id'=>'7469a720-f49f-11e9-9fd8-2dbc14befdfd',
            'position_name'=>'Chinese Translator',
            'gender'=>'female',
            'offer_employee_count'=>1,
            'exper_id'=>'00570e3b-4eef-4d0c-ac81-ce88111861fb',
            'job_description'=>'full time job',
            'job_requirement'=>'အကျင့်ကောင်းမွန်သူ စိတ်ရှည်သည်းခံသူ',
            'salary'=>'400000',
            'state_id'=>'22062b80-21be-11e8-8e88-07aab376387d',
            'job_time'=>'full time',
            'benefits'=>'It’s one of the most sought-after jobs
                It’s a high-paying job
                You can work independently(be your own boss) or with a team
                You can work from anywhere
                It brings out or improves your creativity(build your own idea from nothing)
                It’s interesting and fun
                It helps you become a better problem-solver
                It is a job for the future',
            'others'=>'others'
        ]);

        DB::table('job_positions')->insert([
            'id'=>Uuid::generate()->string,
            'job_code_id'=>'J0010023011',
            'company_id'=>'a8fdad97-95b1-445b-af52-f05e1cdf2ad2',
            'jobcategory_id'=>'7469a720-f49f-11e9-9fd8-2dbc14befdfd',
            'position_name'=>'Japanese Translator',
            'gender'=>'female',
            'offer_employee_count'=>1,
            'exper_id'=>'00570e3b-4eef-4d0c-ac81-ce88111861fb',
            'job_description'=>'full time job',
            'job_requirement'=>'အကျင့်ကောင်းမွန်သူ စိတ်ရှည်သည်းခံသူ',
            'salary'=>'400000',
            'state_id'=>'22062b80-21be-11e8-8e88-07aab376387d',
            'job_time'=>'full time',
            'benefits'=>'It’s one of the most sought-after jobs
                It’s a high-paying job
                You can work independently(be your own boss) or with a team
                You can work from anywhere
                It brings out or improves your creativity(build your own idea from nothing)
                It’s interesting and fun
                It helps you become a better problem-solver
                It is a job for the future',
            'others'=>'others'
        ]);

        DB::table('job_positions')->insert([
            'id'=>Uuid::generate()->string,
            'job_code_id'=>'J0010023012',
            'company_id'=>'a8fdad97-95b1-445b-af52-f05e1cdf2ad2',
            'jobcategory_id'=>'7469a720-f49f-11e9-9fd8-2dbc14befdfd',
            'position_name'=>'Korean Translator',
            'gender'=>'female',
            'offer_employee_count'=>1,
            'exper_id'=>'00570e3b-4eef-4d0c-ac81-ce88111861fb',
            'job_description'=>'full time job',
            'job_requirement'=>'အကျင့်ကောင်းမွန်သူ စိတ်ရှည်သည်းခံသူ',
            'salary'=>'400000',
            'state_id'=>'22062b80-21be-11e8-8e88-07aab376387d',
            'job_time'=>'full time',
            'benefits'=>'It’s one of the most sought-after jobs
                It’s a high-paying job
                You can work independently(be your own boss) or with a team
                You can work from anywhere
                It brings out or improves your creativity(build your own idea from nothing)
                It’s interesting and fun
                It helps you become a better problem-solver
                It is a job for the future',
            'others'=>'others'
        ]);

        DB::table('job_positions')->insert([
            'id'=>Uuid::generate()->string,
            'job_code_id'=>'J0010023013',
            'company_id'=>'a8fdad97-95b1-445b-af52-f05e1cdf2ad2',
            'jobcategory_id'=>'7466f240-f49f-11e9-a7fd-f138fb086f43',
            'position_name'=>'Vedio Editing',
            'gender'=>'female',
            'offer_employee_count'=>6,
            'exper_id'=>'00570e3b-4eef-4d0c-ac81-ce88111861fb',
            'job_description'=>'full time job',
            'job_requirement'=>'အကျင့်ကောင်းမွန်သူ စိတ်ရှည်သည်းခံသူ',
            'salary'=>'200000',
            'state_id'=>'22062b80-21be-11e8-8e88-07aab376387d',
            'job_time'=>'full time',
            'benefits'=>'It’s one of the most sought-after jobs
                It’s a high-paying job
                You can work independently(be your own boss) or with a team
                You can work from anywhere
                It brings out or improves your creativity(build your own idea from nothing)
                It’s interesting and fun
                It helps you become a better problem-solver
                It is a job for the future',
            'others'=>'others'
        ]);

        DB::table('job_positions')->insert([
            'id'=>Uuid::generate()->string,
            'job_code_id'=>'J0010023014',
            'company_id'=>'a8fdad97-95b1-445b-af52-f05e1cdf2ad2',
            'jobcategory_id'=>'7469a720-f49f-11e9-9fd8-2dbc14befdfd',
            'position_name'=>'Writing(English)',
            'gender'=>'female',
            'offer_employee_count'=>5,
            'exper_id'=>'00570e3b-4eef-4d0c-ac81-ce88111861fb',
            'job_description'=>'full time job',
            'job_requirement'=>'အကျင့်ကောင်းမွန်သူ စိတ်ရှည်သည်းခံသူ',
            'salary'=>'200000',
            'state_id'=>'21d67960-21be-11e8-8078-8380230dfe03',
            'job_time'=>'full time',
            'benefits'=>'It’s one of the most sought-after jobs
                It’s a high-paying job
                You can work independently(be your own boss) or with a team
                You can work from anywhere
                It brings out or improves your creativity(build your own idea from nothing)
                It’s interesting and fun
                It helps you become a better problem-solver
                It is a job for the future',
            'others'=>'others'
        ]);

        DB::table('job_positions')->insert([
            'id'=>Uuid::generate()->string,
            'job_code_id'=>'J0010023015',
            'company_id'=>'a8fdad97-95b1-445b-af52-f05e1cdf2ad2',
            'jobcategory_id'=>'7466f240-f49f-11e9-a7fd-f138fb086f43',
            'position_name'=>'Poto Editing',
            'gender'=>'female',
            'offer_employee_count'=>1,
            'exper_id'=>'00570e3b-4eef-4d0c-ac81-ce88111861fb',
            'job_description'=>'full time job',
            'job_requirement'=>'အကျင့်ကောင်းမွန်သူ စိတ်ရှည်သည်းခံသူ',
            'salary'=>'200000',
            'state_id'=>'22062b80-21be-11e8-8e88-07aab376387d',
            'job_time'=>'full time',
            'benefits'=>'It’s one of the most sought-after jobs
                It’s a high-paying job
                You can work independently(be your own boss) or with a team
                You can work from anywhere
                It brings out or improves your creativity(build your own idea from nothing)
                It’s interesting and fun
                It helps you become a better problem-solver
                It is a job for the future',
            'others'=>'others'
        ]);

        DB::table('job_positions')->insert([
            'id'=>Uuid::generate()->string,
            'job_code_id'=>'J0010023015',
            'company_id'=>'a8fdad97-95b1-445b-af52-f05e1cdf2ad2',
            'jobcategory_id'=>'746d1150-f49f-11e9-966f-bfefda04d58d',
            'position_name'=>'Project Manager',
            'gender'=>'female',
            'offer_employee_count'=>2,
            'exper_id'=>'00570e3b-4eef-4d0c-ac81-ce88111861fb',
            'job_description'=>'full time job',
            'job_requirement'=>'အကျင့်ကောင်းမွန်သူ စိတ်ရှည်သည်းခံသူ',
            'salary'=>'2000000',
            'state_id'=>'22062b80-21be-11e8-8e88-07aab376387d',
            'job_time'=>'full time',
            'benefits'=>'It’s one of the most sought-after jobs
                It’s a high-paying job
                You can work independently(be your own boss) or with a team
                You can work from anywhere
                It brings out or improves your creativity(build your own idea from nothing)
                It’s interesting and fun
                It helps you become a better problem-solver
                It is a job for the future',
            'others'=>'others'
        ]);
    }
}
