<?php

namespace App\Http\Controllers\Employeers;

use Illuminate\Http\Request;
use App\MyLibs\Models\Job_category;
use App\Http\Controllers\Controller;
use App\MyLibs\Repositories\Job_sub_categoryRepository;
use Illuminate\Support\Str;

class Job_sub_categoryController extends Controller
{
	protected $job_sub_categoryRepo;
	public function __construct(Job_sub_categoryRepository $job_sub_categoryRepo)
	{
		$this->job_sub_categoryRepo =$job_sub_categoryRepo; 
	}

    public function create()
    {
        $job_categories = Job_category::all();
    	return view('employers.job_sub_category.create', compact('job_categories'));
    }

    public function save(Request $request)
    {
    	try
        {
    		$data = $request->all();
            $data['job_category_id'] = Str::after($request->job_category_id, 'string:');
    		$this->job_sub_categoryRepo->create($data);

    	    notify()->success('Job Sub Category is successfully created!');
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
    	$job_sub_categories = $this->job_sub_categoryRepo->getAllSubCategory();
    	return view('employers.job_sub_category.index',compact('job_sub_categories'));
    }

    public function edit(Request $request)
    {
    	$id = $request->input('id');
        $job_categories = Job_category::all();
    	$edit_job_sub_category = $this->job_sub_categoryRepo->getById($id);
    	return view('employers.job_sub_category.edit',
            compact('edit_job_sub_category','job_categories'));
    }

    public function update(Request $request)
    {
    	try 
        {
            $data = $request->all();
            $data['job_category_id'] = Str::after($request->job_category_id, 'string:');

    		$this->job_sub_categoryRepo->update($data, $request->id);
    	    notify()->success('Job Sub Category is successfully updated!');
            return redirect()->route('employeers.job_sub_categories.index');
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
            $this->job_sub_categoryRepo->delete($id);
            notify()->success('Job Sub Category is successfully deleted!');
            return redirect()->back();   
        }
        catch(\Exception $e)
        {
            notify()->error('Fail to delete');
            return redirect()->back();
        }
    }
}
