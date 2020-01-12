<?php

namespace App\Http\Controllers\Employeers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\MyLibs\Repositories\Job_categoryRepository;
use App\MyLibs\Repositories\Job_positionRepository;
use App\MyLibs\Models\Job_category;
use App\MyLibs\Models\State;
use App\MyLibs\Models\Cv;
use App\MyLibs\Models\Apply;
use App\MyLibs\Models\Job_position;
use App\MyLibs\Models\Company_information;
use App\User;

class JobController extends Controller
{
    protected $job_categoryRepo;
    protected $job_posRepo;
    public function __construct(Job_categoryRepository $job_categoryRepo, Job_positionRepository $job_posRepo)
    {
        $this->job_categoryRepo =$job_categoryRepo;
        $this->job_posRepo=$job_posRepo;
    }

    public function getJobdetail(Request $request)
    {
        $job_pos_id = $request->get('job_position_id');
        $company_id = $request->get('company_id');
        $job_details = $this->job_posRepo->getJobdetail($job_pos_id,$company_id);

        $job_details =  (object) $job_details[0];
        if(\Auth::user() == null )
        { 

            $user_id = null;
            $cv_id = null;
            $cv_correct = null;
            $old_apply = null;
            $staff_resource_id = null;
        }
        else
        {
            $user_id=\Auth::user()->id;
            $cv = CV::where('user_id',$user_id)->first();
            if($cv == null)
            {
                $cv_id = null;$cv_correct= null;$old_apply= null;$staff_resource_id=null;
            }
            else
            {
                $cv_id = $cv->id;
                $cv_correct = $cv->cv_correct;
                $old_apply = Apply::where('cv_id',$cv_id)->where('job_position_id',$job_pos_id)->value('id');
                $staff_resource_id= User::find(\Auth::user()->id)->cvs->staff_resource_id;
            }
        }
    	return view('jobs.job_details',compact('job_details','user_id','cv_id','cv_correct','old_apply','staff_resource_id'));
    }

    public function getJobCategdetail(Request $request)
    {
       $jobcategory_id = $request->get('jobcategory_id');
       $categorydetails = $this->job_categoryRepo->getCategoriesDetail($jobcategory_id);
       return view('jobs.job_category.job_categories_details',
        compact('categorydetails'));
    }

    public function getAllFeaturedJobs()
    {
        $job_positions = $this->job_posRepo->getPaginationFeaturedJobs();
    	return view('jobs.browse_all_featured_jobs', compact('job_positions'));
    }

    public function getAllFeaturedJobCategories()
    {
        $job_categories = $this->job_categoryRepo->getPaginationCategories();
        foreach ($job_categories as $job_category) 
        {
            $num_of_pos = $this->job_categoryRepo->getCategoryCount($job_category->id);
            $job_category->pos_count = count($num_of_pos); 
        }
        return view('jobs.job_category.browse_all_jobs_categories', compact('job_categories'));
    }

    public function getAllSeefirstJob()
    {
        $job_positions = $this->job_posRepo->getPaginationPositions();
        return view('jobs.browse_all_seefirst_jobs', compact('job_positions'));
    }

    public function searchResultPage(Request $request)
    {
        $all['id']='all';//encryptMyString("all");
        $all['name']="All";
        
        $states = State::all()->toArray();
        $states=array_prepend($states,$all);

        $job_cates = Job_category::all()->toArray();
        $job_cates=array_prepend($job_cates,$all);

        $position_name = $request->get('position_name');
        $state_id = $request->get('state_id');
        $jobcategory_id = $request->get('jobcategory_id');
        return view('jobs.job_search_result',compact('position_name','state_id','jobcategory_id','states','job_cates'));
    }
}
