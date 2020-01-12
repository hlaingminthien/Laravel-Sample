<?php

namespace App\Http\Controllers\Employeers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MyLibs\Repositories\Position_LevelRepository;

class Position_LevelController extends Controller
{
	protected $Position_LevelRepo;
	public function __construct(Position_LevelRepository $Position_LevelRepo)
	{
		$this->Position_LevelRepo =$Position_LevelRepo; 
	}

    public function create() 
    {
    	return view('employers.position_level.create');
    }

    public function save(Request $request)
    {
    	try{

    		$data = $request->all();
    		$this->Position_LevelRepo->create($data);

    	    notify()->success('Position Level is successfully created!');
            
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
    	$position_levels = $this->Position_LevelRepo->getAll();
    	 //dd($position_levels);
    	return view('employers.position_level.index',compact('position_levels'));
    }

    public function edit(Request $request)
    {
    	$id = $request->input('id');
    	$edit_position_level = $this->Position_LevelRepo->getById($id);
    	return view('employers.position_level.edit',compact('edit_position_level'));
    }

    public function update(Request $request)
    {
    	try 
        {
            $data = $request->all();
    		$this->Position_LevelRepo->update($data, $request->id);
    	    notify()->success('Position_Level is successfully updated!');
            return redirect()->route('employeers.position_levels.index');
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
         $this->Position_LevelRepo->delete($id);
         notify()->success('Position Level is successfully deleted!');
         return redirect()->back();   
        }catch(\Exception $e){
            notify()->error('Fail to delete');
            return redirect()->back();
        }
    }
}
