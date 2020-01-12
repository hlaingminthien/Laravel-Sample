<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MyLibs\Models\State;
use App\MyLibs\Models\City;
use App\MyLibs\Models\Staff_Resource;
use App\Role;
use App\User;

class StaffController extends Controller
{

    public function create()
    {
    	$states = State::all();
    	$cities = City::all();
        $roles = array('1'=>'level2','2'=>'Level3');
    	return view('admin.staff.create',compact('states','cities','roles'));
    }

    public function save(Request $request)
    {
    	try 
        {
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

            $data = $request->all();
            if(!$request->get('active'))
            {
                $data['active']=0;
            } 

            $state =explode(':', $data['state_id']);
            $data['state_id'] = $state[1];
            $role_name = $data['role'];
            $data = \Arr::except($data,['role']);
            $data['id']=\Uuid::generate()->string;
            $data['password']=\Hash::make($request->password);
            $data['photo']= $asset;
            $user=User::create($data);
            $role=Role::where('name',"=",$role_name)->first();
            $user->roles()->attach($role->id);
            notify()->success('You created '.$role_name.' staff successfully!');
            return redirect()->back();
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
                 notify()->error($err_msg);
            }
        }
        return redirect()->back(); 
    }


    public function index()
    {
        $level2 =\DB::table('users')
          ->leftJoin('role_user','users.id','=','role_user.user_id')
          ->leftJoin('staff_resources','users.id','=','staff_resources.user_id')
          ->where('role_user.role_id','=','2')
          ->select('users.*','staff_resources.id AS staff_resource_id', 'staff_resources.used_cv AS used_cv')
          ->get();

        foreach ($level2 as $level_2) 
        {
            $level_2->state_name = State::where('id',$level_2->state_id)->value('name');
        }

        $level3 =\DB::table('users')
          ->leftJoin('role_user','users.id','=','role_user.user_id')
          ->leftJoin('staff_resources','users.id','=','staff_resources.user_id')
          ->where('role_user.role_id','=','3')
          ->select('users.*','staff_resources.id AS staff_resource_id', 'staff_resources.used_cv AS used_cv')
          ->get();

        foreach ($level3 as $level_3) 
        {
            $level_3->state_name = State::where('id',$level_3->state_id)->value('name');
        }

        return view('admin.staff.index',compact('level2','level3'));
    }

    public function edit(Request $request)
    {
        $id = $request->get('id');
        $states = State::all();
        $cities = City::all();
        if($request->get('role_name') == 'level2')
        {
            $roles = array('1'=>'level2');
        }
        else
        {
            $roles = array('2'=>'Level3');
        }
        $edit_staff = User::find($id);
        $edit_staff->role_name=$edit_staff->roles()->value('name');
        return view('admin.staff.edit',compact('edit_staff','states','cities','roles'));
    }

    public function update(Request $request)
    {
        try 
        {
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

            $data = $request->all();
            if(!$request->get('active'))
            {
                $data['active']=0;
            } 

            $state =explode(':', $data['state_id']);
            $data['state_id'] = $state[1];
            $role_name = $data['role'];
            $id = $data['edit_id'];
            $data = \Arr::except($data,['role']);
            $data = \Arr::except($data,['_token']);
            $data = \Arr::except($data,['edit_id']);
            $data['photo']= $asset;
            $user=User::where('id',$id)->update($data);
            $u = User::find($id);
            $role=Role::where('name',"=",$role_name)->first();
            $u->roles()->sync($role->id);
            notify()->success('You updated '.$role_name.' staff successfully!');
            return redirect()->route('admin.staff.index');
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
                notify()->error($err_msg);
            }
        }
        return redirect()->back();
    }

    public function destory(Request $request)
    {
        try 
        {
            $id = $request->input('id');
            $staff = User::findOrFail($id);
            $staff->delete();
            notify()->success('Staff is successfully deleted!'); 
        }
        catch(\Exception $e)
        {
            notify()->error('Fail to delete');
        }
        return redirect()->back();
    }
}
