<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\MyLibs\Repositories\CVRepository;
use App\MyLibs\Models\Job_Category;
use App\MyLibs\Models\ExperLevel;
use App\MyLibs\Models\State;
use App\MyLibs\Models\Cv;
use App\MyLibs\Models\Working_Experience;
use App\MyLibs\Repositories\UserRepository;
use App\MyLibs\Models\Staff_Resource;
use App\MyLibs\Models\Training_Certificate;

class CVController extends Controller
{
	protected $userRepo;

	public function __construct(UserRepository $userRepo)
	{
		$this->userRepo = $userRepo;
	}

  public function createBasic()
  {
    $user_id = Auth::user()->id;
    $user = User::findOrFail($user_id);
    $states = State::all();

    foreach ($states as $state) 
    {
      $state->id = $state->name;
    }

    if($user->nrc == "")
    {
    	return view('employee.cv.create',compact('user','states'));
    }
    else
    {
      return $this->createCVBasic();
    }
  }

  public function createCVBasic()
  {
    $cv = CV::where('user_id',Auth::user()->id)->value('id');
    if($cv !== null)
    {
      return $this->createCompleteCV();
    }
    else
    {
      $job_categories= Job_Category::all();
      $exper_levels = ExperLevel::all();
      $states = State::all();
      return view('employee.cv.create_cv_basic',
        compact('job_categories','exper_levels','states'));
    }
  }

  public function createCompleteCV()
  {
    $job_categories= Job_Category::all();
    $exper_levels = ExperLevel::all();
    $states = State::all('name');

    // foreach ($states as $state) 
    // {
    //   $state->id = $state->get('name');
    // }

    //dd($states);

    if(\Auth::user())
    {
      $user_id = \Auth::user()->id;
    }
    $user_infos = $this->userRepo->getUserCVInfo($user_id);
    foreach ($user_infos as $user_info) 
    {
     $user_info->job_category = Job_Category::where('id',$user_info->jobcate_id)->value('name');
     $user_info->experlevel = ExperLevel::where('id',$user_info->experlevel_id)->value('name');
     $user_info->state_name = State::where('id',$user_info->state_id)->value('name');
    }

    //for staff name
    $staff_id= User::find($user_id)->cvs->staff_resource_id;
    $u_id = Staff_Resource::where('id',$staff_id)->value('user_id');
    $staff_name = \DB::table('users')->leftJoin('staff_resources','users.id','=','staff_resources.user_id')->where('users.id',$u_id)->value('users.name');
    
    return view('employee.cv.complete_cv',compact('user_infos','job_categories','exper_levels','states','staff_name'));
  }

  public function updateUserInformation(Request $request)
  {
    try
    {
      $data = $request->all();
      
      $height = $request->get('feet') . "'" . $request->get('inches') . '"';

    	$id = $request->get('id');
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

      $user =User::find($id);
      $user->photo = $asset;
      $user->nrc = $request->get('nrc');
      $user->gender = $request->get('gender');
      $user->race = $request->get('race');
      $user->religious = $request->get('religious');
      $user->native_town = $request->get('native_town');
      $user->date_of_birth = $request->get('date_of_birth');
      $user->weight = $request->get('weight');
      $user->height = $height;
      $user->marital_status = $request->get('marital_status');
      $user->health = $request->get('health');
      $user->address = $request->get('address');
      $user->emergency_contact_name = $request->get('emergency_contact_name');
      $user->emergency_phone = $request->get('emergency_phone');
      $user->relation_with_econtact = $request->get('relation_with_econtact');
      $user->save();
      notify()->success('Basic Information is successfully updated!');
      return redirect(route('cv.basic_cv_create'));
    }
    catch (\Exception $e) 
    {
      \Log::error($e->getMessage());
      if(strpos($e->getMessage(), 'Duplicate'))
      {
        $err_msg=substr($e->getMessage(), strpos($e->getMessage(), "Duplicate"), strpos($e->getMessage(), "for") -strpos($e->getMessage(), "Duplicate"));
          notify()->error($err_msg);
        return redirect()->back();
      }
      else
      {
        $err_msg=$e->getMessage();
        notify()->error('Unknown error has occurred at user update!');
        return redirect()->back();
      }
  	}
  }

  public function basciCvInfoSave(Request $request)
  { 
    try
    {
      $user_id=Auth::user()->id;
      $cv = new CV;
      $cv->user_id=$user_id;
      $cv->job_position=$request->get('job_position');
      $cv->jobcate_id=$request->get('jobcate_id');
      $cv->experlevel_id=$request->get('experlevel_id');
      $cv->state_id=$request->get('state_id');
      $cv->expected_salary=$request->get('expected_salary');
      $cv->employment_status=$request->get('employment_status');
      $cv->employment_type=$request->get('employment_type');
      $cv->education=$request->get('education');
      $cv->bond_with_prev_company=$request->get('bond_with_prev_company');
      $cv->limit_jobs_with_prev_company=$request->get('limit_jobs_with_prev_company');
      $cv->save();
      notify()->success('Basic CV Information is successfully created!');      
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


  public function cvDownload(Request $request)
  { 
       // dd($request->all());   
       // $pure_html = strip_tags($request->htmlstring);
       $pure_html = $request->htmlstring;
       // dd($pure_html);
       $phpWord = new \PhpOffice\PhpWord\PhpWord();
       $section = $phpWord->addSection();
       $header = $section->addHeader();

       // $header->addWatermark('https://cdn4.vectorstock.com/i/1000x1000/18/13/ms-logo-letter-design-vector-14081813.jpg', array('width' => '300pt','marginTop' => 100,'marginLeft'=>100));
       // $section->addImage('https://images-na.ssl-images-amazon.com/images/I/61NRsJeymIL._SL1500_.jpg',array('width' => 200,'marginLeft'=>200));

      // $pure_html = str_replace("<p>", 
      // "<p style='font-size: 10pt; font-family: Arial; color:red; line-height: 140%; margin-bottom: 160pt;'>", 
      // $pure_html);

       $pure_html = str_replace("<p id='inner'>","<p style='padding: 10px 80px; margin-top: 80px; bgColor:red; border: solid #666; borderBottomSize: 10twip;'>",$pure_html);
      \PhpOffice\PhpWord\Shared\Html::addHtml($section,$pure_html);

      $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
      $objWriter->save('cv.docx');
      return response()->download(public_path('cv.docx'));

      // $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
      // $objWriter->save('mscv.html');
      // return response()->download(public_path('mscv.html'));
  }


  public function cvPreview(Request $request)
  {

    $work_exps = Working_Experience::where('cv_id',$request->cv_id)->get();
    if(isset($work_exps)){
        foreach ($work_exps as $re) {
         $jcat =Job_Category::where('id',$re->jobcate_id)
                ->value('name');
         $jexp =ExperLevel::where('id',$re->experlevel_id)
                ->value('name');
         $re['job_cat_name']= $jcat;
         $re['job_exp_name']=$jexp;
        }
       }
      else{

            $work_exps =[];
        }

    if(\Auth::user()){

      $user_id = \Auth::user()->id;
    }
    // dd($user_id);
    $user_infos = $this->userRepo->getUserCVInfo($user_id);
    foreach ($user_infos as $user_info) {
     $user_info->job_category = Job_Category::where('id',$user_info->jobcate_id)->value('name');
     $user_info->experlevel = ExperLevel::where('id',$user_info->experlevel_id)->value('name');
     $user_info->state_name = State::where('id',$user_info->state_id)->value('name');
    }
    // dd($work_exps);

    $trains = Training_Certificate::where('cv_id',$request->cv_id)->get();
         // dd($res);
    if(!isset($trains)){
          
          $trains =[];
    }
    // dd($work_exps);

    return view('employee.cv.cv_preview',compact('user_infos','work_exps','trains'));
  }

  public function cvPreview2(Request $request)
  {
     $work_exps = Working_Experience::where('cv_id',$request->cv_id)->get();
    if(isset($work_exps)){
        foreach ($work_exps as $re) {
         $jcat =Job_Category::where('id',$re->jobcate_id)
                ->value('name');
         $jexp =ExperLevel::where('id',$re->experlevel_id)
                ->value('name');
         $re['job_cat_name']= $jcat;
         $re['job_exp_name']=$jexp;
        }
       }
      else{

            $work_exps =[];
        }

    if(\Auth::user()){

      $user_id = \Auth::user()->id;
    }
    // dd($user_id);
    $user_infos = $this->userRepo->getUserCVInfo($user_id);
    foreach ($user_infos as $user_info) {
     $user_info->job_category = Job_Category::where('id',$user_info->jobcate_id)->value('name');
     $user_info->experlevel = ExperLevel::where('id',$user_info->experlevel_id)->value('name');
     $user_info->state_name = State::where('id',$user_info->state_id)->value('name');
    }
    // dd($work_exps);

    $trains = Training_Certificate::where('cv_id',$request->cv_id)->get();
         // dd($res);
    if(!isset($trains)){
          
          $trains =[];
    }
    // dd($work_exps);
     return view('employee.cv.cv_preview2',compact('user_infos','work_exps','trains'));
  }



  public function cvPreview3(Request $request)
  {
     $work_exps = Working_Experience::where('cv_id',$request->cv_id)->get();
    if(isset($work_exps)){
        foreach ($work_exps as $re) {
         $jcat =Job_Category::where('id',$re->jobcate_id)
                ->value('name');
         $jexp =ExperLevel::where('id',$re->experlevel_id)
                ->value('name');
         $re['job_cat_name']= $jcat;
         $re['job_exp_name']=$jexp;
        }
       }
      else{

            $work_exps =[];
        }

    if(\Auth::user()){

      $user_id = \Auth::user()->id;
    }
    // dd($user_id);
    $user_infos = $this->userRepo->getUserCVInfo($user_id);
    foreach ($user_infos as $user_info) {
     $user_info->job_category = Job_Category::where('id',$user_info->jobcate_id)->value('name');
     $user_info->experlevel = ExperLevel::where('id',$user_info->experlevel_id)->value('name');
     $user_info->state_name = State::where('id',$user_info->state_id)->value('name');
    }
    // dd($work_exps);

    $trains = Training_Certificate::where('cv_id',$request->cv_id)->get();
         // dd($res);
    if(!isset($trains)){
          
          $trains =[];
    }
    // dd($work_exps);
     return view('employee.cv.cv_preview3',compact('user_infos','work_exps','trains'));
  }
}
