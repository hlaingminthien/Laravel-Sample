<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MyLibs\Models\State;
use App\MyLibs\Models\Country;
use App\MyLibs\Models\Job_Category;
use App\MyLibs\Repositories\Job_categoryRepository;
use App\MyLibs\Models\Company_information;
use App\MyLibs\Models\Staff_Resource;
use App\MyLibs\Models\Company_Resource;
use App\MyLibs\Models\Card;
use App\MyLibs\Models\ExperLevel;
use App\MyLibs\Models\CV;
use App\Role;
use App\User;
use Auth;
use DB;
use Illuminate\Support\Str;
use App\MyLibs\Repositories\UserRepository;

class Level3Controller extends Controller
{
    protected $job_categoryRepo;
    protected $userRepo;
    public function __construct(Job_categoryRepository $job_categoryRepo, 
        UserRepository $userRepo)
    {
        $this->job_categoryRepo =$job_categoryRepo; 
        $this->userRepo = $userRepo;
    }

    public function registerCompanyBaiscCreate()
    {
        return view('admin.level3.company_register.company_register_basic_create');
    }

    public function registerCompanyBaiscSave(Request $request)
    {
        try 
        {
            $data = $request->all();
            $data['id']=\Uuid::generate()->string;
            $data['password']=\Hash::make($request->password);
            $user=User::create($data);
            $role=Role::where('name',"=",'Level3')->first();
            $user->roles()->attach($role->id);

            return redirect()->route('admin.level3.register_company_info_create',
                ['user_id'=>$user->id]);
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
        return redirect()->back();
    }

    public function registerCompanyInfoCreate(Request $request)
    {
        $input = $request->all();
        $user_id = $input['user_id'];
        $states = State::all();
        $countries = Country::all();
        $job_categories = Job_Category::all();
        return view('admin.level3.company_register.company_register_info_create',compact('states','countries','job_categories','user_id'));
    }

    public function registerCompanyInfoSave(Request $request)
    {
        try{
            
            $res = $this->job_categoryRepo->getRoleId($request->user_id);

            if($res->count() == 0)
            {
                notify()->success('Do not allow to fill company information');
                return redirect()->route('welcome');
            }
            else
            {
                $role_id=$res->first()->role_id;
                if($role_id == 3)
                {
                    $user_id=Company_information::where('user_id',"=",$request->user_id)->first();
                    if($user_id == null)
                    {
                        if ($request->file('logo')) 
                        {
                            $logo = $request->file('logo')->getClientOriginalName();
                            
                            $request->file('logo')->move(
                                base_path().'/public/employerPhotos/', $logo
                            );
                        }
                        else{
                            $logo = "/img/resume/img-1.png";
                        }

                        if($request->file('licensePhoto'))
                        {
                            $license = $request->file('licensePhoto')->getClientOriginalName();
                            $request->file('licensePhoto')->move(
                                base_path().'/public/employerPhotos/', $license
                            );
                        }
                        else{
                            $license = "/img/resume/img-1.png";
                        }

                        $data = $request->all();

                        $login_user_id = Auth::user()->id;
                        $staff_resource_id=Staff_Resource::where('user_id',"=",$login_user_id)->first()->id;
                        
                        $data['logo'] = $logo;
                        $data['licensePhoto'] = $license;
                        $data['state_id'] = Str::after($request->state_id, 'string:');
                        $data['job_category_id'] = Str::after($request->job_category_id, 'string:');
                        $data['country_id'] = Str::after($request->country_id, 'string:');
                        $data['staff_resource_id'] = $staff_resource_id;

                        $company_information = Company_information::create($data);

                        notify()->success('Company have registered successfully!');
                        return $this->registerCompanyInfoindex();
                    }
                    else
                    {
                        notify()->success('Company information is already exist');
                    }
                }
                else
                {
                    notify()->success('Your account is not employeer account');
                }
                return redirect()->back();
            }
        } 
        catch (\Exception $e) {
            \Log::error($e->getMessage());
            if(strpos($e->getMessage(), 'Duplicate')){
                $err_msg=substr($e->getMessage(), strpos($e->getMessage(), "Duplicate"), strpos($e->getMessage(), "for") - strpos($e->getMessage(), "Duplicate"));
                 notify()->error($err_msg);
            }
            else{
                $err_msg=$e->getMessage();
                 notify()->error('Unknown error has occurred at user update!');
            }
        }
    }

    public function registerCompanyInfoindex()
    {
        $user_id=Auth::user()->id;
        $staff_resource_id=Staff_Resource::where('user_id',$user_id)->value('id');
        $company_infos = Company_information::where('staff_resource_id', $staff_resource_id)
                            ->get();

        foreach ($company_infos as $company_info) 
        {
            $user_info = User::findOrFail($company_info->user_id);
            $jobtype = Job_Category::where('id',$company_info->job_category_id)->value('name');
            $state_name = State::where('id',$company_info->state_id)->value('name');
            $country_name = Country::where('id',$company_info->country_id)->value('name');
            $company_resource_card_id = Company_Resource::where('company_id',$company_info->id)->value('card_id');
            $company_resource_id = Company_Resource::where('company_id',$company_info->id)->value('id');
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
        
        return view('admin.level3.company_register.company_register_list',
            compact('company_infos','cards'));
    }

    public function registerCompanyInfoEdit(Request $request)
    {
        $job_categories = Job_category::all();
        $states = State::all();
        $countries = Country::all();

        $id = $request->id;

        $company_infos =\DB::table('users')
          ->join('company_informations','users.id','=','company_informations.user_id')
          ->select('users.*','company_informations.*')
          ->where('company_informations.id', '=', $id)
          ->get();

        foreach ($company_infos as $company_info) 
        {
            $company_info->job_category = Job_Category::where('id',$company_info->job_category_id)->value('name');
            $company_info->state_name = State::where('id',$company_info->state_id)->value('name');
            $company_info->country_name = Country::where('id',$company_info->country_id)->value('name');
        }
        return view('admin.level3.company_register.company_register_info_edit',compact('company_infos', 'job_categories', 'states', 'countries'));
    }

    public function registerCompanyInfoDestory(Request $request)
    {
        try 
        {
            $id = $request->input('id');
            $company = Company_information::findOrFail($id);

            $user_info = User::findOrFail($company->user_id);

            $company->delete();
            $user_info->delete();
            notify()->success('Company is successfully deleted!');
            
        }
        catch(\Exception $e)
        {
            notify()->error('Fail to delete');
        }
        return redirect()->back();
    }

    public function registerCVBasicCreate($value='')
    {
        return view('admin.level3.cv_register.cv_register_basic_create');
    }

    public function registerCVBasicSave(Request $request)
    {
        try {
            $data = $request->all();

            if ($request->file('photo')) 
            {
                $asset = $request->file('photo')->getClientOriginalName();
                $request->file('photo')->move(
                     base_path().'/public/photo/', $asset);
            }     
            else
            {
                $asset = "/img/resume/img-1.png";
            }

            $data['photo'] = $asset;
            $data['active'] = 1;
            $data['id']=\Uuid::generate()->string;
            $data['password']=\Hash::make($request->password);
            $user=User::create($data);
            $role=Role::where('name',"=",'Employee')->first();
            $user->roles()->attach($role->id);

            return redirect()->route('admin.level3.register_cv_info_create',
                ['user_id'=>$user->id]);
          
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
          return redirect()->back();
        }
    }

    public function registerCVInfoCreate(Request $request)
    {
        $input = $request->all();
        $user_id = $input['user_id'];
        $job_categories= Job_Category::all();
        $exper_levels = ExperLevel::all();
        $states = State::all();
        return view('admin.level3.cv_register.cv_register_info_create',compact('job_categories','exper_levels','states','user_id'));
    }

    public function registerCVInfoSave(Request $request)
    {
        try
        {
            $user_id=$request->user_id;

            $login_user_id = Auth::user()->id;
            $staff_resource_id=Staff_Resource::where('user_id',"=",$login_user_id)->first()->id;

            $cv = new CV;
            $cv->user_id=$user_id;
            $cv->staff_resource_id=$staff_resource_id;
            $cv->job_position=$request->get('job_position');
            $cv->jobcate_id=$request->get('jobcate_id');
            $cv->experlevel_id=$request->get('experlevel_id');
            $cv->state_id=$request->get('state_id');
            $cv->expected_salary=$request->get('expected_salary');
            $cv->education=$request->get('education');
            $cv->bond_with_prev_company=$request->get('bond_with_prev_company');
            $cv->limit_jobs_with_prev_company=$request->get('limit_jobs_with_prev_company');
            $cv->save();

            notify()->success('Basic CV Information is successfully created!');
            return redirect()->back();
        } 
        catch (\Exception $e) 
        {
          \Log::error($e->getMessage());
          if(strpos($e->getMessage(), 'Duplicate'))
          {
            $err_msg=substr($e->getMessage(), strpos($e->getMessage(), "Duplicate"), strpos($e->getMessage(), "for")-strpos($e->getMessage(), "Duplicate"));
              notify()->error($err_msg);
          }
          else
          {
            $err_msg=$e->getMessage();
            notify()->error('Unknown error has occurred at user update!');
          }  
        }
        return redirect()->back();
    }

    public function completeCV(Request $request)
    {
        $job_categories= Job_Category::all();
        $exper_levels = ExperLevel::all();
        $states = State::all();

        $user_id = $request->id;
        $user_infos = $this->userRepo->getUserCVInfo($user_id);

        foreach ($user_infos as $user_info) 
        {
            $user_info->job_category = Job_Category::where('id',$user_info->jobcate_id)->value('name');
            $user_info->experlevel = ExperLevel::where('id',$user_info->experlevel_id)->value('name');
            $user_info->state_name = State::where('id',$user_info->state_id)->value('name');
        }  

        return view('admin.level3.cv_register.completed_cv_register',compact('user_infos','job_categories','exper_levels','states','user_id'));
    }

    public function registerCVindex()
    {
        $user_id=Auth::user()->id;
        $staff_resource_id=Staff_Resource::where('user_id',$user_id)->value('id');
        $cv_infos = Cv::where('staff_resource_id', $staff_resource_id)->get();

        foreach ($cv_infos as $cv_info) {
            $user_info = User::findOrFail($cv_info->user_id);
            $jobCate = Job_Category::where('id',$cv_info->jobcate_id)->value('name');
            $state_name = State::where('id',$cv_info->state_id)->value('name');
            $exp_level = ExperLevel::where('id',$cv_info->experlevel_id)->value('name');
            $cv_info->name = $user_info->name;
            $cv_info->jobcate = $jobCate;
            $cv_info->state_name = $state_name;
            $cv_info->explevel = $exp_level;
        }

        return view('admin.level3.cv_register.cv_register_list',compact('cv_infos'));
    }

    public function registerCVdestory(Request $request)
    {
        try
        {
            $id = $request->input('id');
            $cv = Cv::findOrFail($id);

            $user_info = User::findOrFail($cv->user_id);

            $cv->delete();
            $user_info->delete();
            notify()->success('CV is successfully deleted!');
        }
        catch(\Exception $e){
            notify()->error('Fail to delete');
        }
        return redirect()->back();
    }

    public function getCVList()
    {
        $user_id=Auth::user()->id;
        $staff_resource_id=Staff_Resource::where('user_id',$user_id)->value('id'); 
        $cv_infos = Cv::where('cv_correct',1)->where('staff_resource_id', '=',null)->orWhere('staff_resource_id', '<>',$staff_resource_id)->get();

        foreach ($cv_infos as $cv_info) {
            $user_info = User::findOrFail($cv_info->user_id);
            $jobCate = Job_Category::where('id',$cv_info->jobcate_id)->value('name');
            $state_name = State::where('id',$cv_info->state_id)->value('name');
            $exp_level = ExperLevel::where('id',$cv_info->experlevel_id)->value('name');
            $download_by_staff = \DB::select('select id from staff_resources_cvs where staff_resource_id=? and cv_id=?',[$staff_resource_id,$cv_info->id]);
            $cv_info->name = $user_info->name;
            $cv_info->jobcate = $jobCate;
            $cv_info->state_name = $state_name;
            $cv_info->explevel = $exp_level;
            $cv_info->download = $download_by_staff;
        }

        return view('admin.level3.cv_list',compact('cv_infos'));
    }

    public function getCVDetail(Request $request)
    {
        // get cv data
        $staff_id = Staff_Resource::where('user_id',\Auth::user()->id)->value('id');
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

        $cv_down_old_results= \DB::select('select id from staff_resources_cvs where cv_id=? and staff_resource_id=?',[$edit_cv->id,$staff_id]);
  
        if(isset($cv_down_old_results) && $cv_down_old_results !== [])
        {$cv_down_old_results = $cv_down_old_results[0]->id;}
        else{ $cv_down_old_results = null;} 

       return view('admin.level3.cv_detail',compact('edit_cv','staff_id','edit_user','work_exps','train_certis','cv_down_old_results')); 
    }

    public function getOfferedCV()
    {
        $user_id=Auth::user()->id;
        $offers = DB::table('company_offers')
            ->join('applies', 'company_offers.apply_id', '=', 'applies.id')
            ->join('staff_resources','applies.staff_resource_id','=','staff_resources.id')
            ->leftJoin('company_informations','company_offers.company_id','=','company_informations.id')
            ->leftJoin('job_positions','company_offers.job_position_id','=','job_positions.id')
            ->leftJoin('users','company_offers.user_id','=','users.id')
            ->leftJoin('cvs','applies.cv_id','=','cvs.id')
            ->where('staff_resources.user_id','=',$user_id)
            ->select('company_informations.company_name','job_positions.position_name', 'job_positions.salary',
            'company_offers.start_date', 'users.name', 'cvs.education', 'users.nrc')
            ->get();

        return view('admin.level3.offered_list',compact('offers'));
    }
}


