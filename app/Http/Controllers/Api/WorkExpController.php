<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiController;
use App\MyLibs\Models\Working_Experience;
use App\MyLibs\Models\Job_Category;
use App\MyLibs\Models\ExperLevel;
use App\MyLibs\Models\Cv;
use App\User;

class WorkExpController extends ApiController
{
    public function save(Request $request)
    {
        try
        {
        	$data = $request->all();
        	$work_exp = Working_Experience::create($data);
            $jcat =Job_Category::where('id',$work_exp->jobcate_id)
                    ->value('name');
            $jexp =ExperLevel::where('id',$work_exp->experlevel_id)
                    ->value('name');
            $work_exp['job_cat_name']= $jcat;
            $work_exp['job_exp_name']=$jexp;
             
    		return $this->respondSuccess('success',$work_exp); 

		}
		catch (\Exception $e) 
        {
		    $err=$e->getMessage();
		}       
		return $this->respondError($err);
    }

    public function getInfo(Request $request)
    {
        try
        {
            $res = Working_Experience::where('cv_id',$request->get('cid'))->get();
            if(isset($res))
            {
                foreach ($res as $re) 
                {
                     $jcat =Job_Category::where('id',$re->jobcate_id)
                            ->value('name');
                     $jexp =ExperLevel::where('id',$re->experlevel_id)
                            ->value('name');
                     $re['job_cat_name']= $jcat;
                     $re['job_exp_name']=$jexp;
                }
            }
            else
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

    public function editWexp(Request $request)
    {
        try
        {
            $id = $request->get('id');

            $edit_wexp = Working_Experience::findOrFail($id);
            return $this->respondSuccess('success',$edit_wexp);
        }
        catch (\Exception $e) 
        {
            $err=$e->getMessage();
        }       
        return $this->respondError($err); 
    }

    public function updateWexp(Request $request)
    {
        try 
        {
            $id = $request->get('id');
            $data = $request->all();
            $update_wexp = Working_Experience::whereId($id)->update($data);
            return $this->respondSuccess('success',$update_wexp);
        } 
        catch (\Exception $e) 
        {
            $err=$e->getMessage();
        }
        return $this->respondError($err); 
    }
}
