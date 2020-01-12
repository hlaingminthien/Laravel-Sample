<?php

namespace App\Http\Controllers\Employeers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MyLibs\Repositories\Experience_LevelRepository;

class Experience_LevelController extends Controller
{
	protected $Experience_LevelRepo;
	public function __construct(Experience_LevelRepository $Experience_LevelRepo)
	{
		$this->Experience_LevelRepo =$Experience_LevelRepo; 
	}

    public function create() 
    {
    	return view('employers.experience_level.create');
    }

    public function save(Request $request)
    {
    	try{

    		$data = $request->all();
    		$this->Experience_LevelRepo->create($data);

    	    notify()->success('Experience Level is successfully created!');
            
        } catch (Exception $e) {

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
    	$experience_levels = $this->Experience_LevelRepo->getAll();
    	 //dd($experience_levels);
    	return view('employers.experience_level.index',compact('experience_levels'));
    }

    public function edit(Request $request)
    {
       // dd($request);
    	$id = $request->input('id');
    	$edit_experience_level = $this->Experience_LevelRepo->getById($id);
    	return view('employers.experience_level.edit',compact('edit_experience_level'));
    }

    public function update(Request $request)
    {
    	try 
        {
            $data = $request->all();
    		$this->Experience_LevelRepo->update($data, $request->id);
    	    notify()->success('Experience Level is successfully updated!');
            return redirect()->route('employeers.experience_levels.index');
    	} 
        catch (Exception $e) 
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

    public function destory(Request $request)
    {
    try {

         $id = $request->input('id');
         $this->Experience_LevelRepo->delete($id);
         notify()->success('Experience Level is successfully deleted!');
         return redirect()->back();   
        }catch(\Exception $e){
            notify()->error('Fail to delete');
            return redirect()->back();
        }
    }
}
