<?php

namespace App\Http\Controllers\Employeers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MyLibs\Models\Company_Resource;
use App\MyLibs\Models\Company_information;
use App\MyLibs\Models\Job_category;
use App\MyLibs\Models\Country;
use App\MyLibs\Models\State;
use App\MyLibs\Models\Card;
use App\MyLibs\Models\Apply;
use App\MyLibs\Repositories\EmployeerRepostiory;
use App\MyLibs\Models\ExperLevel;
use App\MyLibs\Models\Interview;
use App\MyLibs\Models\Cv;
use App\MyLibs\Models\Job_position;
use App\MyLibs\Models\ManPower;
use App\User;
use App\Events\InterviewEvent;
use App\MyLibs\Models\Interview_Noti;

class EmployersController extends Controller
{
    protected $empRepo;

    public function __construct(EmployeerRepostiory $empRepo)
    {
        $this->empRepo = $empRepo;
    }

    public function showDashboard()
    {
        $job_categories = Job_category::all();
        $states = State::all();
        $countries = Country::all();

        $company_infos =\DB::table('users')
          ->join('company_informations','users.id','=','company_informations.user_id')
          ->select('users.*','company_informations.*')
          ->where('company_informations.user_id', '=', \Auth::user()->id)
          ->get();

        foreach ($company_infos as $company_info) 
        {
            $company_info->job_category = Job_Category::where('id',$company_info->job_category_id)->value('name');
            $company_info->state_name = State::where('id',$company_info->state_id)->value('name');
            $company_info->man_power = ManPower::where('id',$company_info->man_power_id)
                                            ->value('name');
        }

    	return view('employers.dashboard',compact('company_infos', 'job_categories', 'states', 'countries'));
    }

    public function exchangeCardService()
    {
    	$company_id = Company_information::where('user_id',\Auth::user()->id)->value('id');
    	$cmp_resource = Company_Resource::where('company_id',$company_id)->first();
        $card = Card::find($cmp_resource->card_id);
    	return view('employers.card_exchange',compact('cmp_resource','card'));
    }

    public function updateExchangePostiontoall(Request $request)
    {
        try
        {
        	$data = $request->all();
            $destination =explode(':', $data['selecteddestination']);
            $d_key = $destination[2];
            $d_value = $destination[3];
     
        	$cmp_resource = Company_Resource::find($data['cmp_resource_id']);

        	$original_used_postion = $cmp_resource->used_postion;
        	$original_used_refresh = $cmp_resource->used_refresh;
        	$original_used_topping = $cmp_resource->used_topping;
        	$original_used_cv = $cmp_resource->used_cv;

        	if($data['used_postion'] > 0 && $data['used_postion'] <= $original_used_postion)
            {
        		$postion = $original_used_postion - $data['used_postion'];
        		if($d_key == "used_refresh") 
                {
        			$data['used_refresh'] = $data['destination_result'];
        			$refresh = $original_used_refresh + $data['used_refresh'];

        		    Company_Resource::where('id',$data['cmp_resource_id'])->update(['used_postion'=>$postion,'used_refresh'=>$refresh]);
        		}
        		elseif($d_key == "used_topping") 
                {
        			$data['used_topping'] = $data['destination_result'];
        			$topping = $original_used_topping + $data['used_topping'];

        			Company_Resource::where('id',$data['cmp_resource_id'])->update(['used_postion'=>$postion,'used_topping'=>$topping]);
        		}
        		else
                {
        			$data['used_cv'] = $data['destination_result'];
        			$cv = $original_used_cv + $data['used_cv'];
        			Company_Resource::where('id',$data['cmp_resource_id'])->update(['used_postion'=>$postion,'used_cv'=>$cv]);
        		}
        		notify()->success('Your card exchange is successful!');
        		return redirect()->back();
        	}
        	else
            {
        	    notify()->error('Check your exchange position!');
        		return redirect()->back();
        	}
    	}
        catch(\Exception $e) 
        {
            \Log::error($e->getMessage());
            if(strpos($e->getMessage(), 'Duplicate'))
            {
                $err_msg=substr($e->getMessage(), strpos($e->getMessage(), "Duplicate"), strpos($e->getMessage(), "for") - strpos($e->getMessage(), "Duplicate"));
                 notify()->error($err_msg);
            }
            else
            {
                $err_msg=$e->getMessage();
                 notify()->error('Unknown error has occurred at card update!');
            }
    	}
        return redirect()->back();    
    }

    public function updateExchangeAlltoPosition(Request $request)
    {
        try
        {
            $data = $request->all();
            $destination =explode(':', $data['selectedsource']);
            $d_key = $destination[2];
            $d_value = $destination[3];
            $add_to_source = explode(':',$data['add_to_source']);
            $add_to_source_key = $add_to_source[0];
            $add_to_source_value = $add_to_source[1];

            $cmp_resource = Company_Resource::find($data['cmp_resource_id']);

            $original_used_postion = $cmp_resource->used_postion;
            $original_used_refresh = $cmp_resource->used_refresh;
            $original_used_topping = $cmp_resource->used_topping;
            $original_used_cv = $cmp_resource->used_cv;


            if($d_key == "used_refresh" && $add_to_source_key == "used_refresh" ) 
            {
                if($data['source_result'] > 0 && $data['source_result'] <= $original_used_refresh)
                {
                    $source_result = ($original_used_refresh - $data['source_result']) + 
                                      $add_to_source_value;
                    $destination_postion = $original_used_postion + $data['destination_postion'];

                    Company_Resource::where('id',$data['cmp_resource_id'])->update(['used_postion'=>$destination_postion,'used_refresh'=>$source_result]);

                    notify()->success('Your card exchange is successful!');
                    return redirect()->back();
                }
                else
                {
                    notify()->error('Check your number of refresh!');
                    return redirect()->back();
                }

            }
            elseif($d_key == "used_topping"  && $add_to_source_key == "used_topping") 
            {

                if($data['source_result'] > 0 && $data['source_result'] <= $original_used_topping)
                {
                    $source_result = ($original_used_topping - $data['source_result']) + $add_to_source_value;
                    $destination_postion = $original_used_postion + $data['destination_postion'];
                    Company_Resource::where('id',$data['cmp_resource_id'])->update(['used_postion'=>$destination_postion,'used_topping'=>$source_result]);

                    notify()->success('Your card exchange is successful!');
                    return redirect()->back();
                }
                else
                {
                    notify()->error('Check your number of topping!');
                    return redirect()->back();
                }
            }
            else
            {
                if($data['source_result'] > 0 && $data['source_result'] <= $original_used_cv)
                {
                    $source_result = ($original_used_cv - $data['source_result']) + $add_to_source_value;
                    $destination_postion = $original_used_postion + $data['destination_postion'];
                    Company_Resource::where('id',$data['cmp_resource_id'])->update(['used_postion'=>$destination_postion,'used_cv'=>$source_result]);

                    notify()->success('Your card exchange is successful!');
                    return redirect()->back();
                }
                else
                {
                    notify()->error('Check your number of cv!');
                    return redirect()->back();
                }  
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
                 notify()->error('Unknown error has occurred at card update!');
            }
        }
        return redirect()->back();    
    }

    public function getCVInfo()
    {
        $company_id = Company_information::where('user_id',\Auth::user()->id)->value('id');
        $cv_infos = Cv::where('cv_correct',1)->get();
        foreach ($cv_infos as $cv_info) {
            $user_info = User::findOrFail($cv_info->user_id);
            $jobCate = Job_Category::where('id',$cv_info->jobcate_id)->value('name');
            $state_name = State::where('id',$cv_info->state_id)->value('name');
            $exp_level = ExperLevel::where('id',$cv_info->experlevel_id)->value('name');
            $download_by_employers = \DB::select('select id from company_informations_cvs where company_id=? and cv_id=?',[$company_id,$cv_info->id]);
            $cv_apply_by_cmp = Apply::where('cv_id',$cv_info->id)->where('company_id',$company_id)->
            where('by_apply_this_cmp',1)->first();
            $cv_info->name = $user_info->name;
            $cv_info->jobcate = $jobCate;
            $cv_info->state_name = $state_name;    
            $cv_info->explevel = $exp_level;
            $cv_info->download = $download_by_employers;
            $cv_info->cv_apply_by_cmp = $cv_apply_by_cmp;
        }
        return view('employers.cv.cv_list',compact('cv_infos'));
    }
   
    public function getCVDetail(Request $request)
    {
        $company_id = Company_information::where('user_id',\Auth::user()->id)->value('id');

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
        $work_exps = \DB::table('working_experiences')
            ->join('cvs', 'working_experiences.cv_id', '=', 'cvs.id')
            ->join('job_categories','cvs.jobcate_id','=','job_categories.id')
            ->join('experience_levels','cvs.experlevel_id','=','experience_levels.id')
            ->select('working_experiences.*', 'job_categories.name AS job_cat_name', 'experience_levels.name AS job_exp_name')
            ->where('working_experiences.cv_id', '=', $request->id)
            ->get();

        // get training_certi
        $train_certis = \DB::table('training_certificates')
            ->join('cvs', 'training_certificates.cv_id', '=', 'cvs.id')
            ->select('training_certificates.*')
            ->where('training_certificates.cv_id', '=', $request->id)
            ->get();

        $cv_down_old_results= \DB::select('select id from company_informations_cvs where cv_id=? and company_id=?',[$edit_cv->id,$company_id]);
        if(isset($cv_down_old_results) && $cv_down_old_results !== []){$cv_down_old_results = $cv_down_old_results[0]->id;}
        else{ $cv_down_old_results = null;} 

        $cv_apply_to_cmp = Apply::where('cv_id',$edit_cv->id)->where('company_id',$company_id)->where('by_apply_this_cmp',0)->first();

        if(isset($cv_apply_to_cmp) && $cv_apply_to_cmp !== []){

        $cv_apply_to_cmp = $cv_apply_to_cmp;$pos_id = $cv_apply_to_cmp->job_position_id; 
        $position_name_to_cmp = Job_position::where('id',$cv_apply_to_cmp->job_position_id)->value('position_name');
        }
        else{    $cv_apply_to_cmp = null;$pos_id = 0;$position_name_to_cmp=null;}

        $cv_apply_by_cmp = Apply::where('cv_id',$edit_cv->id)->where('company_id',$company_id)->where('by_apply_this_cmp',1)->first();
        if(isset($cv_apply_by_cmp) && $cv_apply_by_cmp !== []){ $cv_apply_by_cmp = $cv_apply_by_cmp; $pos_id = $cv_apply_by_cmp->job_position_id;
        $position_name_by_cmp = Job_position::where('id',$cv_apply_by_cmp->job_position_id)->value('position_name');

        }
        else{ $cv_apply_by_cmp = null;$pos_id = 0;$position_name_by_cmp = null;}

        $job_by_cv_jobcat = Job_position::where('jobcategory_id',$edit_cv->jobcate_id)->where('company_id',$company_id)->get()->toArray();

        // if(!isset($job_by_cv_jobcat) && $job_by_cv_jobcat == []) $job_by_cv_jobcat = null; 

        // return view('employers.cv.cv_detail',compact('edit_cv','edit_user','work_exps','train_certis','company_id','cv_down_old_results','job_by_cv_jobcat','cv_apply_to_cmp','cv_apply_by_cmp','real_position_name'));
        // dd($job_by_cv_jobcat);
        if(!isset($job_by_cv_jobcat) && $job_by_cv_jobcat == []) $job_by_cv_jobcat = null; 
         
        // dd($position_name_to_cmp);
        // dd($edit_cv);
        // dd($job_by_cv_jobcat);

       return view('employers.cv.cv_detail',compact('edit_cv','edit_user','work_exps','train_certis','company_id','cv_down_old_results','job_by_cv_jobcat','cv_apply_to_cmp','cv_apply_by_cmp','position_name_to_cmp','position_name_by_cmp')); 
    }

    public function getApplyLists()
    {
        $interviews = Interview::all();
        $company_id = Company_information::where('user_id',\Auth::user()->id)->value('id');
        $apply_lists =  $this->empRepo->getApplylist($company_id);

        foreach ($apply_lists as $apply_list) 
        {
            $apply_list->experlevel_name = ExperLevel::where('id',$apply_list->experlevel_id)->value('name');
            $apply_list->state_name = State::where('id',$apply_list->state_id)->value('name');
            $old_interview= \DB::select('select * from apply_interview where apply_id=?',[$apply_list->id]);
            if(isset($old_interview) & $old_interview != null)
            {
                $old_interview = (object) $old_interview[0];
                $finish = $old_interview->finish;
                $apply_list->finish = $finish;
            }
            else
            {
                $apply_list->finish = null;
            }
        }

        return view('employers.interview.apply_list',compact('apply_lists','interviews'));
    }

    public function callInterview(Request $request)
    {
        try
        {
           $data= $request->all();
           $company_id = Company_information::where('user_id',\Auth::user()->id)->value('id');
           $apply1 = $request->get('apply_id');
           $apply = Apply::find($data['apply_id']);
           $apply->interviews()->attach($data['interview_id'],
           ['id' => \Uuid::generate()->string,'finish'=>0]);
           Apply::where('id',$data['apply_id'])->update(['has_interview'=> 1]);
           
           // for notification
           $apply_company_id = Apply::where('id',$request->get('apply_id'))->value('company_id');
           $apply_user_id = Apply::where('id',$request->get('apply_id'))->value('user_id');
           $apply_company = Company_information::where('id',$apply_company_id)->first();
           $apply_job_position_id = Apply::where('id',$request->get('apply_id'))->value('job_position_id');
           $apply_position_name = Job_position::where('id',$apply_job_position_id)->value('position_name');
           $apply_interview_name = Interview::where('id',$data['interview_id'])->value('name');
           $data['user_id'] = $apply_user_id;
           $data['company_name'] = $apply_company->company_name;
           $data['company_logo'] = $apply_company->logo;
           $data['position_name'] = $apply_position_name;
           $data['interview_name'] = $apply_interview_name;

           $create_int_noti = Interview_Noti::create($data);
           $time = \Carbon\Carbon::parse($create_int_noti->created_at)->format('j F Y g:i A');
           event(new InterviewEvent($create_int_noti->id,$request->get('apply_id'),$request->get('interview_id'),$apply_company->company_name,
                $apply_position_name,$apply_interview_name,$time,$apply_company->logo));
           notify()->success('Interview call is successful!');
            
        } 
        catch(\Exception $e) 
        {
            \Log::error($e->getMessage());
            if(strpos($e->getMessage(), 'Duplicate'))
            {
                $err_msg=substr($e->getMessage(), strpos($e->getMessage(), "Duplicate"), strpos($e->getMessage(), "for") - strpos($e->getMessage(), "Duplicate"));
                 notify()->error($err_msg);
            }
            else
            {
                $err_msg=$e->getMessage();
                notify()->error($err_msg);
            }
        }
        return redirect()->back();   
    }


    public function interviewResult(Request $request)
    {
        $apply_id = $request->get('apply_id');
        $user_name = $request->get('user_name');
        $position_name = $request->get('position_name');

        $pivot_results= \DB::select('select * from apply_interview where apply_id=?',[$apply_id]);
        foreach ($pivot_results as $pivot_result) {
            
         $interview_name = Interview::where('id',$pivot_result->interview_id)->value('name');
         $pivot_result->interview_name = $interview_name;
         $pivot_result->user_name = $user_name;
         $pivot_result->position_name = $position_name;

        }
        return view('employers.interview.interview_create',compact('pivot_results'));
    }

    public function giveInterviewResult(Request $request)
    {
        try
        {
           $data= $request->all();
           $apply = Apply::find($data['apply_id']);
           $apply->interviews()->updateExistingPivot($data['interview_id'],
           ['interview_mark'=>$data['interview_mark'],'interview_result'=>$data['interview_result'],'finish'=>1]);
           Apply::where('id',$data['apply_id'])->update(['has_interview'=> 0]);
           notify()->success('Interview is finished successfully!');
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
        return redirect()->route('employers.get_apply_lists');
    }

    public function getOffers()
    {
        $company_id = Company_information::where('user_id', \Auth::user()->id)->first()->id;

        $offers =\DB::table('company_offers')
          ->leftJoin('applies','company_offers.apply_id','=','applies.id')
          ->leftJoin('cvs','applies.cv_id','=','cvs.id')
          ->leftJoin('job_positions','company_offers.job_position_id','=','job_positions.id')
          ->leftJoin('users','company_offers.user_id','=','users.id')
          ->leftJoin('company_informations','company_offers.company_id','=','company_informations.id')
          ->select('company_informations.company_name','job_positions.position_name', 'job_positions.salary', 
            'company_offers.start_date', 'users.name', 'cvs.education', 'users.nrc')
          ->where('company_informations.id', '=', $company_id)
          ->get();

        return view('employers.offer.offer_list',compact('offers'));
    }
}

