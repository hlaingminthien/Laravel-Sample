<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MyLibs\Models\Cv;
use App\MyLibs\Models\Company_information;
use App\MyLibs\Models\Job_Category;
use App\MyLibs\Models\State;
use App\MyLibs\Models\Interview_Noti;
use App\MyLibs\Models\Interview;
use App\MyLibs\Models\Apply;
use App\MyLibs\Models\Job_position;

class EmployeeController extends Controller
{
    public function getWhoViewProfile()
    {
    	$current_cv_id = CV::where('user_id',\Auth::user()->id)->value('id');
        if($current_cv_id != null){
        	$cv = CV::find($current_cv_id);
        	$company_view_cv = $cv->company_informations;
        	foreach ($company_view_cv as $company) {
        		
        		$company_category_name = Job_Category::where('id',$company->job_category_id)->value('name');
        		$company->company_category_name = $company_category_name;
        		$state_name = State::where('id',$company->state_id)->value('name');
        		$company->state_name = $state_name;
    	    }
        }
        else{
            $company_view_cv = [];
        }
        return view('employee.who_view_your_profile',compact('company_view_cv'));
    }

    public function getNotification(Request $request)
    {
        $interviews =Interview_Noti::find($request->id);
        if(isset($interviews)){
            $interviews->interview_info = Interview::find($interviews->interview_id);
        }
        return view('employee.notification',compact('interviews'));
    }


    public function getJobYApply()
    {
        $apply_informations = Apply::where('user_id',\Auth::user()->id)->where('by_apply_this_cmp',0)->paginate(2);

        foreach ($apply_informations as $apply_information)
        {
            $position = Job_position::find($apply_information->job_position_id);
            $apply_information->time = \Carbon\Carbon::parse($apply_information->apply_time)->format('j F Y g:i A');
            $company = Company_information::find($apply_information->company_id);
            $apply_information->company_name = $company->company_name;
            $apply_information->logo = $company->logo;
            $apply_information->position_name = $position->position_name;
            $apply_information->job_time = $position->job_time;
            $apply_information->offer_employee_count = $position->offer_employee_count;
        }
        return view('employee.job_you_apply',compact('apply_informations'));
    }


    public function getJobForYou()
    {
        $apply_informations = Apply::where('user_id',\Auth::user()->id)->where('by_apply_this_cmp',1)->paginate(2);

        foreach ($apply_informations as $apply_information) 
        {
            $position = Job_position::find($apply_information->job_position_id);
            $apply_information->time = \Carbon\Carbon::parse($apply_information->apply_time)->format('j F Y g:i A');
            $company = Company_information::find($apply_information->company_id);
            $apply_information->company_name = $company->company_name;
            $apply_information->logo = $company->logo;
            $apply_information->position_name = $position->position_name;
            $apply_information->job_time = $position->job_time;
            $apply_information->offer_employee_count = $position->offer_employee_count;
        }
        return view('employee.job_for_you',compact('apply_informations'));
    }

    public function getInterViewList(Request $request)
    {
        $apply = Apply::find($request->get('apply_id'));
        $position = $request->get('job_position');
        $company_name = $request->get('company_name');
        if($apply !== [])
        {
            $ap_interviews= $apply->interviews;
            foreach ($ap_interviews as $ap_interview) 
            {
                $ap_interview->noti_id = Interview_Noti::where('user_id',\Auth::user()->id)->where('apply_id',$request->get('apply_id'))->where('interview_id',$ap_interview->id)->value('id');
            }
        }
        return view('employee.interview_lists',
            compact('ap_interviews','position','company_name'));
    }


    public function getOfferLetter()
    {
       $offers =\DB::table('company_offers')
          ->leftJoin('applies','company_offers.apply_id','=','applies.id')
          ->leftJoin('cvs','applies.cv_id','=','cvs.id')
          ->leftJoin('job_positions','company_offers.job_position_id','=','job_positions.id')
          ->leftJoin('users','company_offers.user_id','=','users.id')
          ->leftJoin('company_informations','company_offers.company_id','=','company_informations.id')
          ->select('company_informations.company_name','job_positions.position_name', 'job_positions.salary', 
            'company_offers.start_date', 'users.name', 'cvs.education', 'users.nrc')
          ->where('users.id', '=',\Auth::user()->id)
          ->get();

          // dd($offers);

       return view('employee.offer_letter',compact('offers'));
          
    }
}
