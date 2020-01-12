<?php

namespace App\Http\Controllers\Employeers;

use Illuminate\Http\Request;
use App\MyLibs\Models\Icon;
use App\Http\Controllers\Controller;
use App\MyLibs\Repositories\Job_categoryRepository;
use Illuminate\Support\Str;

class Job_categoryController extends Controller
{
	protected $job_categoryRepo;
	public function __construct(Job_categoryRepository $job_categoryRepo)
	{
		$this->job_categoryRepo =$job_categoryRepo; 
	}

    public function create() 
    {
        $icons = Icon::all();
    	return view('employers.job_category.create', compact('icons'));
    }

    public function save(Request $request)
    {
    	try
        {
    		$data = $request->all();
            $data['icon_id'] = Str::after($request->icon_id, 'string:');
    		$this->job_categoryRepo->create($data);

    	    notify()->success('Job Category is successfully created!');
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
    	$job_categories = $this->job_categoryRepo->getAllCategory();
    	return view('employers.job_category.index',compact('job_categories'));
    }

    public function edit(Request $request)
    {
    	$id = $request->input('id');
        $icons = Icon::all();
    	$edit_job_category = $this->job_categoryRepo->getById($id);
    	return view('employers.job_category.edit',compact('edit_job_category','icons'));
    }

    public function update(Request $request)
    {
    	try 
        {
            $data = $request->all();
            $data['icon_id'] = Str::after($request->icon_id, 'string:');

    		$this->job_categoryRepo->update($data, $request->id);
    	    notify()->success('Job Category is successfully updated!');
            return redirect()->route('employeers.job_categories.index');
    	} 
        catch (\Exception $e) 
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
                notify()->error('Unknown error has occurred at user update!');
            }
    	}     
    }

    public function destory(Request $request)
    {
        try 
        {
            $id = $request->input('id');
            $this->job_categoryRepo->delete($id);
            notify()->success('Job Category is successfully deleted!');
            return redirect()->back();   
        }
        catch(\Exception $e){
            notify()->error('Fail to delete');
            return redirect()->back();
        }
    }
}
