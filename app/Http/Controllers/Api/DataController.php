<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiController;
use App\MyLibs\Models\City;
use App\MyLibs\Models\Job_position;
use App\MyLibs\Repositories\Job_positionRepository;
use App\MyLibs\Models\Job_category;
use App\MyLibs\Models\State;
use App\MyLibs\Models\Company_information;
use App\MyLibs\Models\Company_Resource;
use App\MyLibs\Models\Card;
use App\MyLibs\Models\Apply;
use App\MyLibs\Models\Cv;
use App\MyLibs\Models\Interview_Noti;
use App\MyLibs\Models\Staff_Resource;
use App\MyLibs\Models\Company_offer;
use Carbon\Carbon;
use App\MyLibs\Models\Others;

class DataController extends ApiController
{
	protected $jobposRepo;

	public function __construct(Job_positionRepository $jobposRepo)
	{
		$this->jobposRepo = $jobposRepo;
	}

	public function getCityByStateId(Request $request)
	{
    $state_id = $request->input('state_id');
		try
    {
			$cities = City::where('state_id',$state_id)->get();
			return $this->respondSuccess('success',$cities); 
		}
		catch (\Exception $e) 
    {
		 	$err=$e->getMessage();
		}       
		return $this->respondError($err);
  }

  public function searchPosition(Request $request)
  {
	  try
    {
  		$position_name = $request->get('position_name');
  		$jobcategory_id = $request->get('jobcategory_id');
  		$state_id = $request->get('state_id');

      if ($state_id == 'all' && $jobcategory_id == 'all') 
      {
        $job_pos = $this->jobposRepo->searchforall($position_name);
      }
      elseif($state_id !== 'all' && $jobcategory_id !== 'all')
      {
        $job_pos = $this->jobposRepo->searchfortwo($jobcategory_id,$state_id,$position_name);
      }      
      elseif($state_id !== 'all' && $jobcategory_id == 'all')
      {
        $job_pos = $this->jobposRepo->searchforstate($state_id,$position_name);
      }
      else
      {
        $job_pos = $this->jobposRepo->searchforcategory($jobcategory_id,$position_name);
      } 
		  foreach ($job_pos as $job_po) 
      {
    		$state_name = State::where('id',$job_po->state_id)->value('name');
    		$jobcate_name = Job_category::where('id',$job_po->jobcategory_id)->value('name');
    		$cmp_information = Company_information::findOrFail($job_po->company_id);
    		$job_po->state_name = $state_name;
    		$job_po->job_category_name = $jobcate_name;
    		$job_po->company_name = $cmp_information->company_name;
    		$job_po->company_logo = $cmp_information->logo;
		  }
		  return $this->respondSuccess('success',$job_pos); 
	  }
	  catch (\Exception $e) 
    {
	 	  $err=$e->getMessage();
	  }       
	  return $this->respondError($err);
  }

  public function getCardInfos(Request $request)
  {
  	$card_id = $request->input('card_id');
  	try
    {
  		$card = Card::where('id',$card_id)->get();
  		return $this->respondSuccess('success',$card); 
  	}
  	catch (\Exception $e) 
    {
  	 	$err=$e->getMessage();
  	}       
	 return $this->respondError($err);
  }
  	
  public function seefirst(Request $request)
  {
    try 
    {
      $id = $request->get('id');

      $time = Carbon::now();
      $update_job_position = Job_position::where('id',$id)
      						->update(['topping_time' =>$time]);

      $job_position = Job_position::findOrFail($id);
      $company_id = $job_position['company_id'];
      $company_res = Company_Resource::where('company_id', "=", $company_id)->first();

      $topping = $company_res['used_topping']-1;
      $update_company_resource = Company_Resource::where('company_id',$company_id)
      						->update(['used_topping' =>$topping]);

      return $this->respondSuccess('success',$update_company_resource);
    } 
    catch (\Exception $e) 
    {
      $err=$e->getMessage();
    }
    return $this->respondError($err);
  }

  public function refresh(Request $request)
  {
    try 
    {
      $id = $request->get('id');

      $time = Carbon::now();
      $update_job_position = Job_position::where('id',$id)
      						->update(['refresh_time' =>$time]);

      $job_position = Job_position::findOrFail($id);
      $company_id = $job_position['company_id'];
      $company_res = Company_Resource::where('company_id', "=", $company_id)->first();

      $refresh = $company_res['used_refresh']-1;
      $update_company_resource = Company_Resource::where('company_id',$company_id)
      						->update(['used_refresh' =>$refresh]);

      return $this->respondSuccess('success',$update_job_position);
    } 
    catch (\Exception $e) 
    {
        $err=$e->getMessage();
    }
    return $this->respondError($err);
  }

  public function updateCompanyInformation(Request $request)
  {
     try 
     {
        $id = $request->get('id');
        $data = $request->all();
        $update_company_information = Company_information::whereId($id)->update($data);
        return $this->respondSuccess('success',$update_company_information);
      } 
      catch (\Exception $e) 
      {
        $err=$e->getMessage();
      }
      return $this->respondError($err);
  }

  public function updateLogo(Request $request)
  {
    try
    {
      $id = $request->get('id');

      if ($request->has('logo')) 
      {
        $asset = $request->file('logo')->getClientOriginalName();
        $request->file('logo')->move(base_path().'/public/employerPhotos/',$asset);
      }
      else
      {
        $asset = "/img/resume/img-1.png";
      }
      $company_information =Company_information::find($id);
      $company_information['logo'] = $asset;
      $company_information->save();

      return $this->respondSuccess('success',$company_information);
    } 
    catch (\Exception $e)
    {
      $err=$e->getMessage();
    }
    return $this->respondError($err); 
  }

  public function applyJob(Request $request)
  {
    try
    {
      $data = $request->all();

      $apply = Apply::create($data);
      
      return $this->respondSuccess('success',$apply);
    } 
    catch (\Exception $e)
    {
      $err=$e->getMessage();
    }
    return $this->respondError($err); 
  }

  public function cvDownload(Request $request)
  {
    try
    {
      $data = $request->all();
      $can_use_cv = Company_Resource::where('company_id',$data['company_id'])->get();
      $cmp_resource = Company_Resource::where('company_id',$data['company_id'])->first();
      $can_use_cv = $cmp_resource->used_cv;
      $can_use_time = $cmp_resource->used_time;

      if($can_use_cv > 0 && $can_use_time > 0)
      {
        $company = Company_information::find($data['company_id']);
        $company->cvs()->attach($data['cv_id'],
             ['id' => \Uuid::generate()->string]);
        $minus_cv = $can_use_cv - 1;
        Company_Resource::where('company_id',$data['company_id'])
                          ->update(['used_cv'=> $minus_cv]);
        $downloaded_cv=$company->cvs;
        $job_category_name = Job_Category::where('id',$downloaded_cv[0]->jobcate_id)
                            ->value('name');
      //   $pivot_results= \DB::select('select * from company_informations_cvs where cv_id=? and company_id=?',[$data['cv_id'],$data['company_id']]);
      //   if(isset($pivot_results) && $pivot_results !== null){

      //     $pivot_results = $pivot_results[0]->id;
      //   }
      // else{ 

      //     $pivot_results = 'empty';
      //  }
      //   // dd($pivot_results); 
        
      }
      return $this->respondSuccess('success',['can_use_cv'=>$can_use_cv,'can_use_time'=>$can_use_time,'job_category_name'=>$job_category_name]);
    } 
    catch (\Exception $e)
    {
      $err=$e->getMessage();
    }
    return $this->respondError($err); 
  }

  public function saveCVDownload(Request $request)
  {
    try{
      $data = $request->all();
      $staff_res = Staff_Resource::create($data);

      return $this->respondSuccess('success',$staff_res); 
    }
    catch (\Exception $e) {
      $err=$e->getMessage();
    }       
    return $this->respondError($err);
  }

  public function editCVDownload(Request $request)
  {
    try
    {
      $id = $request->get('id');

      $edit = Staff_Resource::findOrFail($id);
      
      return $this->respondSuccess('success',$edit);
    }
    catch (\Exception $e) 
    {
      $err=$e->getMessage();
    }       
    return $this->respondError($err); 
  }

  public function updateCVDownload(Request $request)
  {
    try {
        $id = $request->get('id');
        $data = $request->all();

        $update = Staff_Resource::whereId($id)->update($data);
        return $this->respondSuccess('success',$update);
      } 
      catch (\Exception $e) 
      {
        $err=$e->getMessage();
      }
      return $this->respondError($err);
  }

  public function checkCompanyByLevel2(Request $request)
  {
    try
    {
      $id = $request->get('id');

      $correct = Company_information::where('id',$id)->update(['company_correct'=> 1]);

      return $this->respondSuccess('success',['id'=>$id,'correct'=>$correct]);
    } 
    catch (\Exception $e)
    {
      $err=$e->getMessage();
    }
    return $this->respondError($err); 
  }

  public function oldCheckCmpValue(Request $request)
  {
    try
    {
      $id = $request->get('id');

      $company_correct = Company_information::where('id',$id)->value('company_correct');

      return $this->respondSuccess('success',['company_correct'=>$company_correct,'id'=>$id]);
    } 
    catch (\Exception $e)
    {
      $err=$e->getMessage();
    }
    return $this->respondError($err); 
  }

  public function oldCheckCvValue(Request $request)
  {
    try
    {
      $id = $request->get('id');

      $cv_correct = Cv::where('id',$id)->value('cv_correct');

      return $this->respondSuccess('success',['cv_correct'=>$cv_correct,'id'=>$id]);
    } 
    catch (\Exception $e)
    {
      $err=$e->getMessage();
    }
    return $this->respondError($err); 
  }

  public function checkCvByLevel2(Request $request)
  {
    try
    {
      $id = $request->get('id');

      $correct = Cv::where('id',$id)->update(['cv_correct'=> 1]);

      return $this->respondSuccess('success',['id'=>$id,'correct'=>$correct]);
    } 
    catch (\Exception $e)
    {
      $err=$e->getMessage();
    }
    return $this->respondError($err); 
  }

  public function getUnreadInterviwNoti(Request $request)
  {
    try
    {
      $user_id = $request->get('user_id');
        
      $noti_interviews = Interview_Noti::where('user_id',$user_id)->get();
      foreach ($noti_interviews as $noti_interview) 
      {
        
        $noti_interview->time =\Carbon\Carbon::parse($noti_interview->created_at)
                            ->format('j F Y g:i A');
      }
      $noti_read_interviews = Interview_Noti::where('user_id',$user_id)->where('read',0)->get();
      return $this->respondSuccess('success',['noti_interviews'=>$noti_interviews,'noti_read_interviews'=>$noti_read_interviews]);
    } 
    catch (\Exception $e)
    {
      $err=$e->getMessage();
    }
    return $this->respondError($err); 
  }

  public function readInterviwNoti(Request $request)
  {
    try
    {
      $noti_id = $request->get('noti_id');
      $user_id = $request->get('user_id');
      $noti_read_interviews = Interview_Noti::where('user_id',$user_id)->where('read',0)->get();
      $read = Interview_Noti::where('id',$noti_id)->update(['read'=> 1]);
      return $this->respondSuccess('success',['read'=>$read,'current_count'=>$noti_read_interviews]);
    } 
    catch (\Exception $e)
    {
      $err=$e->getMessage();
    }
    return $this->respondError($err); 
  }

  public function applyCvBycmp(Request $request)
  {
    try
    {
      $data = $request->all();
      $data['has_interview'] = 0;
      $data['by_apply_this_cmp'] = 1;
      $apply_by_cmp = Apply::create($data);
      $apply_by_cmp->position_name = Job_position::where('id',$apply_by_cmp->job_position_id)->value('position_name');
      return $this->respondSuccess('success',$apply_by_cmp);
    } 
    catch (\Exception $e)
    {
      $err=$e->getMessage();
    }
    return $this->respondError($err); 
  }
    
  public function editapplyCvBycmp(Request $request)
  {
    try
    {
      $id = $request->get('id');
      $update_apply_by_cmp = Apply::where('id',$id)->update(['job_position_id'=>$request->get('job_position_id'),'apply_time'=>$request->get('apply_time')]);
      $position_name = Job_position::where('id',$request->get('job_position_id'))->value('position_name');
      return $this->respondSuccess('success',['update_apply_by_cmp'=>$update_apply_by_cmp,'position_name'=>$position_name]);
    } 
    catch (\Exception $e)
    {
      $err=$e->getMessage();
    }
    return $this->respondError($err); 
  }

  public function cvDownloadByStaff(Request $request)
  {
    try
    {
      $data = $request->all();
      $can_use_cv = Staff_Resource::where('id',$data['staff_id'])->value('used_cv');
      
      if($can_use_cv > 0)
      {
        $staff = Staff_Resource::find($data['staff_id']);
        $staff->cvs()->attach($data['cv_id'],
             ['id' => \Uuid::generate()->string]);
        $minus_cv = $can_use_cv - 1;
        Staff_Resource::where('id',$data['staff_id'])->update(['used_cv'=> $minus_cv]);
      }
      return $this->respondSuccess('success',$can_use_cv);
    } 
    catch (\Exception $e)
    {
      $err=$e->getMessage();
    }
    return $this->respondError($err); 
  }

  public function getApply(Request $request)
  {
    try
    {
      $id = $request->get('id');

      $apply =\DB::table('applies')
        ->join('job_positions','applies.job_position_id','=','job_positions.id')
        ->join('cvs','applies.cv_id','=','cvs.id')
        ->join('job_categories','cvs.jobcate_id','=','job_categories.id')
        ->select('applies.*','job_positions.*','cvs.*','job_categories.name AS cv_categoryName')
        ->where('applies.id','=',$id)
        ->get();

      $job_by_cv_jobcat = Job_position::where('jobcategory_id',$apply->first()->jobcate_id)
                          ->where('company_id',$apply->first()->company_id)
                          ->get()->toArray();

      return $this->respondSuccess('success', ['apply'=>$apply,'category'=>$job_by_cv_jobcat]); 
    }
    catch (\Exception $e) 
    {
      $err=$e->getMessage();
    }       
    return $this->respondError($err); 
  }

  public function saveOffer(Request $request)
  {
    try{
      $data = $request->all();
      $offer = Company_offer::create($data);

      $apply_id = $request->get('apply_id');
      $staff_resource_id = Apply::findOrFail($apply_id)->staff_resource_id;

      if($staff_resource_id != null)
      {
        $staff_resource = Staff_Resource::findOrFail($staff_resource_id);
        $offered_employee = $staff_resource['offered_employee'] + 1 ;
        $update_staff_resource = Staff_Resource::where('id',$staff_resource_id)
                      ->update(['offered_employee' =>$offered_employee]);
      }

      $job_pos_id = $request->get('job_position_id');
      $job_pos = Job_position::findOrFail($job_pos_id);

      $employee_count = $job_pos['offer_employee_count'] -1 ;

      $update_job_position = Job_position::where('id',$job_pos_id)
                      ->update(['offer_employee_count' =>$employee_count]);

      return $this->respondSuccess('success',$staff_resource_id); 
    }
    catch (\Exception $e) 
    {
      $err=$e->getMessage();
    }       
    return $this->respondError($err);
  }

  public function editOffer(Request $request)
  {
    try{
      $id = $request->get('id');

      $apply =\DB::table('applies')
        ->join('company_offers','applies.id', '=', 'company_offers.apply_id')
        ->join('job_positions','applies.job_position_id','=','job_positions.id')
        ->join('cvs','applies.cv_id','=','cvs.id')
        ->join('job_categories','cvs.jobcate_id','=','job_categories.id')
        ->select('company_offers.*', 'cvs.job_position AS job_position', 'job_positions.salary AS salary',
          'job_categories.name AS cv_categoryName', 'cvs.jobcate_id', 'applies.company_id', 
          'applies.user_id')
        ->where('applies.id','=',$id)
        ->get();

      $job_by_cv_jobcat = Job_position::where('jobcategory_id',$apply->first()->jobcate_id)->get()
      ->toArray();

      return $this->respondSuccess('success', ['apply'=>$apply,'category'=>$job_by_cv_jobcat]);
      
     }
    catch (\Exception $e) 
    {
      $err=$e->getMessage();
    }       
    return $this->respondError($err); 
  }

  public function updateOffer(Request $request)
  {
    try 
    {
      $id = $request->get('id');
      $data = $request->all();

      $update_offer = Company_offer::whereId($id)->update($data);
      return $this->respondSuccess('success',$data);
    }
    catch (\Exception $e)
    {
      $err=$e->getMessage();   
    }
    return $this->respondError($err); 
  }

  public function getSalary(Request $request)
  {
    try 
    {
      $id = $request->get('id');

      $job_pos = Job_position::findOrFail($id);
      return $this->respondSuccess('success',$job_pos);
    }
    catch (\Exception $e)
    {
      $err=$e->getMessage();   
    }
    return $this->respondError($err); 
  }

  public function getBg()
  {
    try 
    {
      $background =Others::where('id',1)->value('background');
      return $this->respondSuccess('success',$background);
    }
    catch (Exception $e)
    {
      $err=$e->getMessage();   
    }
    return $this->respondError($err); 
  }
}
