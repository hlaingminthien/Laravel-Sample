<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiController;
use App\MyLibs\Models\Training_Certificate;

class TrainingCertificateController extends ApiController
{
    public function save(Request $request)
    {
    	try
        {
        	$data = $request->all();
        	$train_certi = Training_Certificate::create($data);
    		return $this->respondSuccess('success',$train_certi); 
		}
		catch (\Exception $e) 
        {
		    $err=$e->getMessage();
		}       
		return $this->respondError($err);
    }

    public function index(Request $request)
    {
    	try
        {
            $res = Training_Certificate::where('cv_id',$request->get('cv_id'))->get();
            if(!isset($res))
            {
        	   $res =[];
            }
            return $this->respondSuccess('success',$res);
        }
        catch (\Exception $e) 
        {
            $err=$e->getMessage();
        }       
        return $this->respondError($err); 
    }

    public function edit(Request $request)
    {
        try
        {
            $id = $request->get('id');

            $edit_train_certs = Training_Certificate::findOrFail($id);
            return $this->respondSuccess('success',$edit_train_certs);
        }
        catch (\Exception $e) 
        {
            $err=$e->getMessage();
        }       
        return $this->respondError($err); 
    }

    public function update(Request $request)
    {
        try 
        {
          $id = $request->get('id');
          $data = $request->all();
          $update_train_certi = Training_Certificate::whereId($id)->update($data);
            return $this->respondSuccess('success',$update_train_certi);
        } 
        catch (\Exception $e) 
        {
            $err=$e->getMessage();
        }
        return $this->respondError($err); 
    }
}
