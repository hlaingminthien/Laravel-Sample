<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MyLibs\Repositories\CardRepository;

class CardsController extends Controller
{
	protected $cardRepo;
	public function __construct(CardRepository $cardRepo)
	{
		$this->cardRepo =$cardRepo; 
	}

    public function create()
    {
    	return view('admin.cards.create');
    }

    public function save(Request $request)
    {
    	try{

    		$data = $request->all();

    		$this->cardRepo->create($data);

    	   notify()->success('Card is successfully created!');
            
        } catch(\Exception $e) {

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
        return redirect()->back();      
    }

    public function index()
    {
    	$cards = $this->cardRepo->getAll();

    	return view('admin.cards.index',compact('cards'));
    }

    public function edit(Request $request)
    {
    	$id = $request->input('id');
    	$edit_card = $this->cardRepo->getById($id);

    	return view('admin.cards.edit',compact('edit_card'));
    }

    public function update(Request $request)
    {
    	$data = $request->all();

        if(!isset($request->star_levels))
            $data['star_levels']=0;
    
        if(!isset($request->hr_informations))
            $data['hr_informations'] =0;

        if(!isset($request->staff_situation))
            $data['staff_situation'] =0;

        $card_id = $request->input('id');

    	try 
        {
            $this->cardRepo->update($request->all(),$card_id);
            return redirect()->route('admin.cards.index');
    	    notify()->success('Card is successfully updated!');
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

    public function destory(Request $request)
    {
        try {

            $id = $request->input('id');
            $this->cardRepo->delete($id);
            notify()->success('Card is successfully deleted!');
            
        }
        catch(\Exception $e){
            notify()->error('Fail to delete');
        }
        return redirect()->back();
    }

}
