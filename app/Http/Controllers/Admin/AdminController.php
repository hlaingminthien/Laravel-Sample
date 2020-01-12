<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\MyLibs\Models\Company_information;
use App\MyLibs\Models\Job_Category;
use App\MyLibs\Models\Staff_Resource;
use App\MyLibs\Models\State;
use App\MyLibs\Models\Country;
use App\MyLibs\Models\Card;
use App\MyLibs\Models\Company_Resource;
use App\MyLibs\Models\ExperLevel;
use App\MyLibs\Models\Cv;
use App\MyLibs\Models\City;
use App\MyLibs\Models\Working_Experience;
use DB;
use Auth;

class AdminController extends Controller
{
    public function showDashboard()
    {
        $states = State::all();
        $cities = City::all();
        $id = Auth::user()->id;

        $user_info = User::findOrFail($id);
        $user_info['state_name'] = State::where('id',$user_info->state_id)->value('name');
        $user_info['city_name'] = City::where('id',$user_info->city_id)->value('name');
        return view('admin.profile_dashboard', compact('user_info'));
    }

    public function getUncheckCompanyInfo()
    {
        $admin_state_id = User::where('id',\Auth::user()->id)->value('state_id');
        $company_infos = Company_information::where('state_id',$admin_state_id)->get();

        foreach ($company_infos as $company_info) {
        
        $user_info = User::findOrFail($company_info->user_id);
        $jobtype = Job_Category::where('id',$company_info->job_category_id)->value('name');
        $state_name = State::where('id',$company_info->state_id)->value('name');
        $country_name = Country::where('id',$company_info->country_id)->value('name');
        $company_resource_card_id = Company_Resource::where('company_id',$company_info->id)->value('card_id');
        $company_resource_id = Company_Resource::where('company_id',$company_info->id)->value('id');
        $company_info->name = $user_info->name;
        $company_info->email = $user_info->email;
        $company_info->phone = $user_info->phone;
        $company_info->jobtype = $jobtype;
        $company_info->state_name = $state_name;
        $company_info->country_name = $country_name;
        $company_info->company_resource_id = $company_resource_id;

        }
        // dd($company_infos);
        return view('admin.level2.company.uncheck_company_list',compact('company_infos','cards'));
    }

    public function getCompanyInfo()
    {
    	$company_infos = Company_information::where('company_correct',1)->get();
    	foreach ($company_infos as $company_info) 
        {
        	$user_info = User::findOrFail($company_info->user_id);
        	$jobtype = Job_Category::where('id',$company_info->job_category_id)->value('name');
        	$state_name = State::where('id',$company_info->state_id)->value('name');
        	$country_name = Country::where('id',$company_info->country_id)->value('name');
            $company_resource_card_id = Company_Resource::where('company_id',$company_info->id)
                                        ->value('card_id');
            $company_resource_id = Company_Resource::where('company_id',$company_info->id)
                                   ->value('id');
            $card_name = Card::where('id',$company_resource_card_id)->value('card_name');
        	$company_info->name = $user_info->name;
        	$company_info->email = $user_info->email;
        	$company_info->phone = $user_info->phone;
        	$company_info->jobtype = $jobtype;
        	$company_info->state_name = $state_name;
        	$company_info->country_name = $country_name;
            $company_info->company_resource_id = $company_resource_id;
            $company_info->card_name = $card_name;
    	}
    	return view('admin.company.company_list',compact('company_infos','cards'));
    }

    public function manageCompanylistResource(Request $request)
    {
        $company_id = $request->company_id;
        $user_id = $request->compuser_id;
        $cards = Card::all();
        $user_info = User::findOrFail($user_id);
        $company_info= Company_information::findOrFail($company_id);
        $user_name = $user_info->name;
        $active = $user_info->active;
        $company_name =$company_info->company_name; 
        return view('admin.company.company_resource_view',compact('company_id','user_id','cards','user_name','company_name','active'));  
    }

    public function saveCompanylistResource(Request $request)
    {
        $data = $request->all();
        
        try
        {
            if(!$request->get('active'))
            {
                $data['active']=0;
            } 
            $c_id =explode(':', $data['card_id']);
            $data['card_id'] = $c_id[1];

            //active or inactive update
            $user = User::where('id',$data['user_id'])->update(['active'=>$data['active']]);

            //for company resources
            $card_detail = Card::findOrFail($data['card_id']);
            if($card_detail->num_of_postion == null) $card_detail->num_of_postion = 0;
            if($card_detail->num_of_refresh == null) $card_detail->num_of_refresh = 0;
            if($card_detail->num_of_topping == null) $card_detail->num_of_topping = 0;
            if($card_detail->num_of_advice == null) $card_detail->num_of_advice = 0;
            if($card_detail->num_of_cv == null) $card_detail->num_of_cv = 0;
            $cmp_id = Company_Resource::where('company_id',$data['company_id'])->value('id');

            if($cmp_id == null)
            {
                $cmp_resource = new Company_Resource;
                $cmp_resource->company_id = $data['company_id'];
                $cmp_resource->card_id = $data['card_id'];
                $cmp_resource->used_postion = $card_detail->num_of_postion;
                $cmp_resource->used_refresh = $card_detail->num_of_refresh;
                $cmp_resource->used_topping = $card_detail->num_of_topping;
                $cmp_resource->used_advice = $card_detail->num_of_advice;
                $cmp_resource->used_cv = $card_detail->num_of_cv;
                $cmp_resource->used_time = $card_detail->limit_time;
                $cmp_resource->checkby = \Auth::user()->name;
                $cmp_resource->save();

                $company_confirm = DB::table('company_informations')
                    ->join('users', 'company_informations.user_id', '=', 'users.id')
                    ->join('company_resources','company_informations.id','=','company_resources.company_id')
                    ->select('company_informations.staff_resource_id')
                    ->where('users.active', '=', 1)
                    ->whereNotNull('company_informations.staff_resource_id')
                    ->whereNotNull('company_resources.card_id')
                    ->first();

                if($company_confirm != null)
                {
                    $staff_resource = Staff_Resource::where('id',$company_confirm->staff_resource_id)->first();
                    $employer_count = $staff_resource['offered_employer']+1;
                    $update_staff_resource = Staff_Resource::where('id',$company_confirm->staff_resource_id)
                                    ->update(['offered_employer' =>$employer_count]);
                }

                notify()->success('Company resources is successfully added!');
                return redirect(route('admin.company_list'));
            }
        } 
        catch(\Exception $e) 
        {
            \Log::error($e->getMessage());
            if(strpos($e->getMessage(), 'Duplicate')){
                $err_msg=substr($e->getMessage(), strpos($e->getMessage(), "Duplicate"), strpos($e->getMessage(), "for") - strpos($e->getMessage(), "Duplicate"));
                 notify()->error($err_msg);
            }
            else{
                $err_msg=$e->getMessage();
                notify()->error($err_msg);
            } 
        }
    }

    public function editCompanylistResource(Request $request)
    {
        $cards = Card::all();
        $id = $request->edit_company_resource_id;
        $edit_comp_resources= Company_Resource::find($id);

        //company_info
        $company_id = $request->edit_company_id;
        $company_info= Company_information::find($company_id);
        $company_name =$company_info->company_name; 

        // //user_info
        $user_id = $request->edit_compuser_id;
        $user_info = User::findOrFail($user_id);
        $user_name = $user_info->name;
        $active = $user_info->active;

        $comp_user_info = new \stdClass();
        $comp_user_info->company_id = $company_id;
        $comp_user_info->company_name =$company_name;
        $comp_user_info->user_id = $user_id;
        $comp_user_info->user_name = $user_name;
        $comp_user_info->active = $active;

        if($edit_comp_resources == null){ return redirect(route('admin.company_list'));}
        return view('admin.company.company_resource_edit',compact('cards','edit_comp_resources','comp_user_info'));
    }


    public function updateCompanylistResource(Request $request)
    {
        $data = $request->all();
        try 
        {
            if(!$request->get('active')){
                $data['active']=0;
            } 
            $c_id =explode(':', $data['card_id']);
            $data['card_id'] = $c_id[1];

            //active or inactive update
            $card_detail = Card::findOrFail($data['card_id']);
            if($card_detail->num_of_postion == null) $card_detail->num_of_postion = 0;
            if($card_detail->num_of_refresh == null) $card_detail->num_of_refresh = 0;
            if($card_detail->num_of_topping == null) $card_detail->num_of_topping = 0;
            if($card_detail->num_of_advice == null) $card_detail->num_of_advice = 0;
            if($card_detail->num_of_cv == null) $card_detail->num_of_cv = 0;

            $cmp_resource = Company_Resource::findOrFail($data['id']);

            if($cmp_resource->id !== null &&  $cmp_resource->used_time == 0)
            {
                $user = User::where('id',$data['user_id'])->update(['active'=>$data['active']]);
                $cmp_resource = Company_Resource::find($data['id']);
                $cmp_resource->company_id = $data['company_id'];
                $cmp_resource->card_id = $data['card_id'];
                $cmp_resource->used_postion = $card_detail->num_of_postion;
                $cmp_resource->used_refresh = $card_detail->num_of_refresh;
                $cmp_resource->used_topping = $card_detail->num_of_topping;
                $cmp_resource->used_advice = $card_detail->num_of_advice;
                $cmp_resource->used_cv = $card_detail->num_of_cv;
                $cmp_resource->used_time = $card_detail->limit_time;
                $cmp_resource->checkby = \Auth::user()->name;
                $cmp_resource->save(); 
                notify()->success('Company resources is successfully updated!');
                return redirect(route('admin.company_list'));
            }
            else
            {
                notify()->error('Company"s previous card service is not over expire date!');
                return redirect(route('admin.company_list'));
            }
        } 
        catch (\Exception $e) 
        {
            \Log::error($e->getMessage());
            if(strpos($e->getMessage(), 'Duplicate')){
                $err_msg=substr($e->getMessage(), strpos($e->getMessage(), "Duplicate"), strpos($e->getMessage(), "for") - strpos($e->getMessage(), "Duplicate"));
                 notify()->error($err_msg);
            }
            else{
                $err_msg=$e->getMessage();
                notify()->error($err_msg);
            } 
        }
    }
        
    public function getCVInfo()
    {
        $cv_infos = Cv::where('cv_correct',1)->get();
        foreach ($cv_infos as $cv_info) 
        {
            $user_info = User::findOrFail($cv_info->user_id);
            $jobCate = Job_Category::where('id',$cv_info->jobcate_id)->value('name');
            $state_name = State::where('id',$cv_info->state_id)->value('name');
            $exp_level = ExperLevel::where('id',$cv_info->experlevel_id)->value('name');
            $cv_info->name = $user_info->name;
            $cv_info->jobcate = $jobCate;
            $cv_info->state_name = $state_name;
            $cv_info->explevel = $exp_level;
        }
        return view('admin.cv.cv_list',compact('cv_infos'));
    }

    public function getCVDetail(Request $request)
    {
        // get cv data
        $edit_cv = Cv::findOrFail($request->id);
        $jobCate = Job_Category::where('id',$edit_cv->jobcate_id)->value('name');
        $state_name = State::where('id',$edit_cv->state_id)->value('name');
        $exp_level = ExperLevel::where('id',$edit_cv->experlevel_id)->value('name');
        $edit_cv->jobcate = $jobCate;
        $edit_cv->state_name = $state_name;
        $edit_cv->explevel = $exp_level;
       // dd($edit_cv);
        // get user data
        $edit_user = User::findOrFail($edit_cv->user_id);

        // get work_exp
        $work_exps = DB::table('working_experiences')
            ->join('cvs', 'working_experiences.cv_id', '=', 'cvs.id')
            ->join('job_categories','cvs.jobcate_id','=','job_categories.id')
            ->join('experience_levels','cvs.experlevel_id','=','experience_levels.id')
            ->select('working_experiences.*', 'job_categories.name AS job_cat_name', 'experience_levels.name AS job_exp_name')
            ->where('working_experiences.cv_id', '=', $request->id)
            ->get();

        // get training_certi
        $train_certis = DB::table('training_certificates')
            ->join('cvs', 'training_certificates.cv_id', '=', 'cvs.id')
            ->select('training_certificates.*')
            ->where('training_certificates.cv_id', '=', $request->id)
            ->get();

       return view('admin.cv.cv_detail',
        compact('edit_cv','edit_user','work_exps','train_certis')); 
    }
    
    public function getUncheckCVInfo()
    {
        $admin_state_id = User::where('id',\Auth::user()->id)->value('state_id');
        $cv_infos = Cv::where('state_id',$admin_state_id)->get();
        foreach ($cv_infos as $cv_info) 
        {
            $user_info = User::findOrFail($cv_info->user_id);
            $jobCate = Job_Category::where('id',$cv_info->jobcate_id)->value('name');
            $state_name = State::where('id',$cv_info->state_id)->value('name');
            $exp_level = ExperLevel::where('id',$cv_info->experlevel_id)->value('name');
            $cv_info->name = $user_info->name;
            $cv_info->jobcate = $jobCate;
            $cv_info->state_name = $state_name;
            $cv_info->explevel = $exp_level;
        }
        return view('admin.level2.cv.uncheck_cv_list',compact('cv_infos'));
    }

    public function getUncheckCVDetail(Request $request)
    {
        // get cv data
        $edit_cv = Cv::findOrFail($request->id);
        $jobCate = Job_Category::where('id',$edit_cv->jobcate_id)->value('name');
        $state_name = State::where('id',$edit_cv->state_id)->value('name');
        $exp_level = ExperLevel::where('id',$edit_cv->experlevel_id)->value('name');
        $edit_cv->jobcate = $jobCate;
        $edit_cv->state_name = $state_name;
        $edit_cv->explevel = $exp_level;

        // get user data
        $edit_user = User::findOrFail($edit_cv->user_id);

        // get work_exp
        $work_exps = DB::table('working_experiences')
            ->join('cvs', 'working_experiences.cv_id', '=', 'cvs.id')
            ->join('job_categories','cvs.jobcate_id','=','job_categories.id')
            ->join('experience_levels','cvs.experlevel_id','=','experience_levels.id')
            ->select('working_experiences.*', 'job_categories.name AS job_cat_name', 'experience_levels.name AS job_exp_name')
            ->where('working_experiences.cv_id', '=', $request->id)
            ->get();

        // get training_certi
        $train_certis = DB::table('training_certificates')
            ->join('cvs', 'training_certificates.cv_id', '=', 'cvs.id')
            ->select('training_certificates.*')
            ->where('training_certificates.cv_id', '=', $request->id)
            ->get();

       return view('admin.level2.cv.uncheck_cv_detail',compact('edit_cv','edit_user','work_exps','train_certis')); 
    }

    public function checkCompanyByLevel2(Request $request)
    {
        dd($request->all());
    }
}
