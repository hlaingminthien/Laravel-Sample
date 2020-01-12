<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiController;
use App\MyLibs\Models\Cv;
use App\User;

class CVController extends ApiController
{
  public function update(Request $request)
  {
  	try 
    {
      $id = $request->get('id');
      $data = $request->all();
      $update_cv = CV::whereId($id)->update($data);
      return $this->respondSuccess('success',$update_cv);
    } 
    catch (Exception $e) 
    {
        $err=$e->getMessage(); 
    }
    return $this->respondError($err); 
  }

  public function updateBasicUser(Request $request)
  {
    try 
    {
      $id = $request->get('id');
      $data = $request->all();
      $update_basic_user = User::whereId($id)->update($data);
      return $this->respondSuccess('success',$update_basic_user);
    } 
    catch (Exception $e) 
    {
      $err=$e->getMessage();
    }
    return $this->respondError($err); 
  }

  public function updatePhoto(Request $request)
  {
    try
    {
      $id = $request->get('id');

      if ($request->has('photo')) {

        $asset = $request->file('photo')->getClientOriginalName();

        $request->file('photo')->move(base_path().'/public/photo/',$asset);
      } 
      else{
        $asset = "/img/resume/img-1.png";
      }
      $user =User::find($id);
      $user->photo = $asset;
      $user->save();
      return $this->respondSuccess('success',$user);
    } 
    catch (\Exception $e)
    {
      $err=$e->getMessage();
    }
    return $this->respondError($err); 
  }
}
