<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiController;
use App\MyLibs\Models\Card;
use App\MyLibs\Models\Company_Resource;
use App\MyLibs\Models\Company_information;
use App\User;

class CompanyResourceController extends ApiController
{
    public function save(Request $request)
    {
    	try
        {
        	$card_detail = Card::findOrFail($request->get('card_id'));
        	if($card_detail->num_of_postion == null) $card_detail->num_of_postion = 0;
        	if($card_detail->num_of_refresh == null) $card_detail->num_of_refresh = 0;
        	if($card_detail->num_of_topping == null) $card_detail->num_of_topping = 0;
        	if($card_detail->num_of_advice == null) $card_detail->num_of_advice = 0;
        	if($card_detail->num_of_cv == null) $card_detail->num_of_cv = 0;
            $cmp_id = Company_Resource::where('company_id',$request->get('company_id'))->value('id');
            if($cmp_id == null){
        	$cmp_resource = new Company_Resource;
        	$cmp_resource->company_id = $request->get('company_id');
        	$cmp_resource->card_id = $request->get('card_id');
        	$cmp_resource->used_postion = $card_detail->num_of_postion;
        	$cmp_resource->used_refresh = $card_detail->num_of_refresh;
        	$cmp_resource->used_topping = $card_detail->num_of_topping;
        	$cmp_resource->used_advice = $card_detail->num_of_advice;
        	$cmp_resource->used_cv = $card_detail->num_of_cv;
        	$cmp_resource->used_time = $card_detail->limit_time;
        	$cmp_resource->checkby = $request->get('checkby');
        	$cmp_resource->save();
        }
        else
        {
            $cmp_resource = "alerady exit";}
        	return $this->respondSuccess('success',$cmp_resource);
    	}
		catch (\Exception $e) {
		    $err=$e->getMessage();
		}       
		return $this->respondError($err);
    }
}
