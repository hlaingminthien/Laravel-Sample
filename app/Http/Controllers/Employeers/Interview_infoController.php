<?php

namespace App\Http\Controllers\Employeers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MyLibs\Repositories\Job_categoryRepository;
use App\MyLibs\Repositories\Interview_infoRepository;
use Illuminate\Support\Str;
use App\MyLibs\Models\Company_information;
use DateTime;
use Auth;

class Interview_infoController extends Controller
{
	protected $interviewRepo;
	public function __construct(Interview_infoRepository $interviewRepo)
	{
		$this->interviewRepo =$interviewRepo; 
	}

    public function create()
    {
    	return view('employers.interview_info.create');
    }

    public function save(Request $request)
    {
    	try
        {
    		$data = $request->all();
            $user_id = Auth::user()->id;
            $com_id = Company_information::all()->where('user_id', '=',  $user_id)->first()->id;
            $data['company_id'] = $com_id;
    		$this->interviewRepo->create($data);

    	    notify()->success('Interview Info is successfully created!');
            
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
                 notify()->error('Unknown error has occurred at user update!');
            }
        }
        return redirect()->back();      
    }

    public function index()
    {
    	$interviews = $this->interviewRepo->getAll();
        foreach ($interviews as $interview) 
        {
            $date = new DateTime($interview->date);
            $time = new DateTime($interview->time);
            $interview['date'] = $date->format('D d-m-Y');
            $interview['time'] = $time->format('h:i A');
        }
    	return view('employers.interview_info.index',compact('interviews'));
    }

    public function edit(Request $request)
    {
    	$id = $request->input('id');
    	$edit_interview = $this->interviewRepo->getById($id);
    	return view('employers.interview_info.edit',compact('edit_interview'));
    }

    public function update(Request $request)
    {
    	try 
        {
            $data = $request->all();

    		$this->interviewRepo->update($data, $request->id);
    	    notify()->success('Interview Info is successfully updated!');

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
                 notify()->error('Unknown error has occurred at user update!');
            }
    	}
        return redirect()->route('employeers.interview_infos.index');      
    }

    public function destory(Request $request)
    {
    try {

         $id = $request->input('id');
         $this->interviewRepo->delete($id);
         notify()->success('Interview Info is successfully deleted!');
         return redirect()->back();   
        }catch(\Exception $e){
            notify()->error('Fail to delete');
            return redirect()->back();
        }
    }
}
