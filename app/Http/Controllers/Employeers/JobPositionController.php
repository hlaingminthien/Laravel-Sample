<?php

namespace App\Http\Controllers\Employeers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MyLibs\Models\State;
use App\MyLibs\Models\Job_category;
use App\MyLibs\Models\ExperLevel;
use App\MyLibs\Models\Job_position;
use App\MyLibs\Models\Company_information;
use App\MyLibs\Models\Company_Resource;
use App\MyLibs\Models\Job_Sub_Category;
use App\MyLibs\Repositories\Job_categoryRepository;
use App\MyLibs\Repositories\Job_positionRepository;
use Illuminate\Support\Str;
use Auth;

class JobPositionController extends Controller
{
	protected $job_categoryRepo;
	protected $job_posRepo;
	public function __construct(Job_positionRepository $job_posRepo, Job_categoryRepository $job_categoryRepo)
	{
		$this->job_categoryRepo =$job_categoryRepo; 
		$this->job_posRepo = $job_posRepo;
	}

    public function create()
    {
    	$states = State::all();
        $experienceLevel = ExperLevel::all();
        $job_categories = $this->job_categoryRepo->getAll();
        $job_sub_categories = Job_Sub_Category::all();
    	return view('employers.job_position.create',compact('states','experienceLevel','job_categories', 'job_sub_categories'));
    }

    public function save(Request $request)
    {   	
    	try{

            $data = $request->all();

            $user_id = Auth::user()->id;
            $com_id = Company_information::all()->where('user_id', '=',  $user_id)->first()->id;
            $com_res = Company_Resource::all()->where('company_id', '=',  $com_id)->first();
            $used_postion = $com_res->used_postion;
            $used_time = $com_res->used_time;

            if($used_time > 0 && $used_postion > 0)
            {
        		$data['company_id'] = $com_id;
        		$data['jobcategory_id'] = Str::after($request->jobcategory_id, 'string:');
        		$data['state_id'] = Str::after($request->state_id, 'string:');
    	        $data['exper_id'] = Str::after($request->exper_id, 'string:');

                $company_res = Company_Resource::where('company_id', "=", $com_id)->first();

                $position = $company_res['used_postion']-1;
                $update_company_resource = Company_Resource::where('company_id',$com_id)
                                    ->update(['used_postion' =>$position]);

                $this->job_posRepo->create($data);

                notify()->success('Job position is successfully created!');
            }
            else 
            {
                notify()->success('You have no permission');
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

    public function index()
    {
        $user_id = Auth::user()->id;

    	$job_positions = $this->job_posRepo->getAllData($user_id);

    	return view('employers.job_position.index',compact('job_positions'));
    }

    public function edit(Request $request)
    {
    	$id = $request->input('id');
    	$edit_job_position = $this->job_posRepo->getById($id);

    	$states = State::all();
        $experienceLevel = ExperLevel::all();
        $job_categories = $this->job_categoryRepo->getAll();

    	return view('employers.job_position.edit',compact('edit_job_position','states','cities','job_categories','townships','experienceLevel'));
    }

    public function update(Request $request)
    {
    	try {

    		$data = $request->all();
            $user_id = Auth::user()->id;
            $com_id = Company_information::all()->where('user_id', '=',  $user_id)->first()->id;
    		$data['company_id'] = $com_id;
    		$data['jobcategory_id'] = Str::after($request->jobcategory_id, 'string:');
    		$data['state_id'] = Str::after($request->state_id, 'string:');
            $data['exper_id'] = Str::after($request->exper_id, 'string:');

    		$this->job_posRepo->update($data, $request->id);
    	    notify()->success('Job Position is successfully updated!');
            
            return redirect()->route('employeers.job_positions.index'); 
    		
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

    public function destory(Request $request)
    {
        try {

         $id = $request->input('id');
         $this->job_posRepo->delete($id);
         notify()->success('Job Position is successfully deleted!');
         return redirect()->back();

            
        }catch(\Exception $e){
            notify()->error('Fail to delete');
            return redirect()->back();
        }
    }
}
