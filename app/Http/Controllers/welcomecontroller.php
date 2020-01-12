<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\MyLibs\Models\State;
use App\MyLibs\Models\Country;
use App\MyLibs\Models\Job_category;
use App\MyLibs\Models\Company_information;
use App\MyLibs\Models\ManPower;
use Illuminate\Support\Facades\Auth;
use App\MyLibs\Models\Icon;
use App\MyLibs\Repositories\Job_categoryRepository;
use App\MyLibs\Repositories\Job_positionRepository;
use Illuminate\Support\Str;
use App\Role;
use DB;
use App\MyLibs\Models\Job_position;

class welcomecontroller extends Controller
{
    protected $job_categoryRepo;
    protected $job_positionRepo;
    public function __construct(Job_categoryRepository $job_categoryRepo,Job_positionRepository $job_positionRepo)
    {
        $this->job_categoryRepo =$job_categoryRepo; 
        $this->job_positionRepo =$job_positionRepo;
    }

    public function welcome()
    {
        $all['id']='all';//encryptMyString("all");
        $all['name']="All";
        $states = State::all()->toArray();
        $states=array_prepend($states,$all);
        $job_cates = Job_category::all()->toArray();
        $job_cates=array_prepend($job_cates,$all);

        $job_categories = $this->job_categoryRepo->getCategories();

        foreach ($job_categories as $job_category) 
        {
            $num_of_pos = $this->job_categoryRepo->getCategoryCount($job_category->id);
            $job_category->pos_count = count($num_of_pos); 
        }
        $topping_job_positions = $this->job_positionRepo->getJobPositionsByTopping();
        $job_positions = $this->job_positionRepo->getJobPositionsByRefresh();
        $latest_jobs = $this->job_positionRepo->getLatestJobPositions();
        $companys = $this->job_categoryRepo->getCompany();
        //dd($companys);
    	return view('welcome', compact('job_categories','states','job_cates','topping_job_positions', 'job_positions','latest_jobs','companys','companys'));
    }

    public function login()
    {
    	return view('login');
    }

    public function register()
    {
        $states = State::all();

        return view('register',compact('states'));
    }

    public function employeer_register()
    {
        $states = State::all();

        return view('employers.register',compact('states'));
    }

    public function post_employeer_register(Request $request)
    {
        try {

            $data = $request->all();
            $data['id']=\Uuid::generate()->string;
            $data['password']=\Hash::make($request->password);
            $data['active']= 0;
            // dd($data);
            $user=User::create($data);
            $role=Role::where('name',"=",'Employeer')->first();
            $user->roles()->attach($role->id);

            return redirect()->route('account.create_company_infor',['user_id'=>$user->id]);
          
        } catch (\Exception $e) {

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

    public function postRegister(Request $request)
    {
        try{

            $data = $request->all();
            $data['id']=\Uuid::generate()->string;
            $data['password']=\Hash::make($request->password);
            $data['active']= 1;
            // dd($data);
            $user=User::create($data);
            $role=Role::where('name',"=",'Employee')->first();
            $user->roles()->attach($role->id);

            notify()->success('You have registered successfully!');
            
        }catch(\Exception $e)
        {
           \Log::error($e->getMessage());
            if(strpos($e->getMessage(), 'Duplicate')){
                $err_msg=substr($e->getMessage(), strpos($e->getMessage(), "Duplicate"), strpos($e->getMessage(), "for") - strpos($e->getMessage(), "Duplicate"));
                 notify()->error($err_msg);
            }
            else{
                $err_msg=$e->getMessage();
                 notify()->error('Unknown error has occurred at register!');
            }
            
        } 

        
        return redirect()->back();               
    }

    public function postLogin(Request $request)
    {
        try{

            $email = $request->input('email');
            $password = $request->input('password');

        if (Auth::attempt(['email' => $email, 'password' => $password, 'active' => 1])){
            // Authentication passed...
             $user = User::find(Auth::user()->id);
             //dd($user->roles[0]->name);
             if($user->roles[0]->name == "Level1" || $user->roles[0]->name == "Level2" || 
                $user->roles[0]->name == "Level3"){

                notify()->success('You have logged in successfully!');
                return redirect()->intended("/admin/dashboard");

            }elseif ($user->roles[0]->name == 'Employeer') {
                
                notify()->success('You have logged in successfully!');
                return redirect()->intended("/employers/profile_dashboard");

            }else{

                notify()->success('You have logged in successfully!');
                return redirect()->intended('/');
            }

        }
        else{

            notify()->error('Check your email and password!');
            return redirect()->intended('/');

        }


       }catch(\Exception $e)
        {
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

    public function createCompanyInformation(Request $request)
    {       
        $input = $request->all();
        $user_id = $input['user_id'];
        $states = State::all();
        $menpower = ManPower::all();
        $job_categories = Job_Category::all();
        return view('employers.company_information.create',compact('states','menpower','job_categories','user_id'));

    }

    public function saveCompanyInformation(Request $request)
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

                if($role_id == 4)
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
                            $logo = "default_company.JPG";
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
                        
                        $data['logo'] = $logo;
                        $data['licensePhoto'] = $license;
                        $data['state_id'] = Str::after($request->state_id, 'string:');
                        $data['job_category_id'] = Str::after($request->job_category_id, 'string:');
                        $data['man_power_id'] = Str::after($request->man_power_id, 'string:');
                        $data['staff_resource_id'] = null;

                        $company_information = Company_information::create($data);

                        notify()->success('Your employer account have registered successfully!');
                    }
                    else
                    {
                        notify()->success('Company information is already exist');
                    }
                }
                else
                {
                    notify()->success('Your account is not employer account');
                }
                return redirect()->route('welcome');
            }
        } catch (\Exception $e) {

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
        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('account.login');
    }
        
    public function contact()
    {
        return view('contact');
    }

    public function employer_terms()
    {
        return view('employer_terms');
    }
    
    public function employee_terms()
    {
        return view('employee_terms');
    }

    public function about()
    {
        return view('about');
    }
}
