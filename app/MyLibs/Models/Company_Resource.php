<?php

namespace App\MyLibs\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyLibs\Traits\Uuids;

class Company_Resource extends Model
{
    use Uuids;

    public $incrementing = false;

    protected $table='company_resources';

    protected $fillable=['id','company_id','card_id','used_postion','used_refresh','used_topping','used_advice','used_cv','used_time','checkby'];

}
