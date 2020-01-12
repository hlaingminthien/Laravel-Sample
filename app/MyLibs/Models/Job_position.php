<?php

namespace App\MyLibs\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyLibs\Traits\Uuids;

class Job_position extends Model
{
    use Uuids;

    public $incrementing = false;

    protected $table='job_positions';

    protected $fillable=['id','job_code_id','company_id','jobcategory_id','position_name','gender', 'exper_id', 'offer_employee_count', 'job_description', 'job_requirement','salary','state_id','city_id','township_id','job_time','benefits','highlights','carrier_opptunity','topping_time','refresh_time'];

}
