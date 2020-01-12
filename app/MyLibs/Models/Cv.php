<?php

namespace App\MyLibs\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyLibs\Traits\Uuids;

class Cv extends Model
{
    use Uuids;
    public $incrementing = false;

    protected $table='cvs';

    protected $fillable=['id','user_id','job_position','jobcate_id','experlevel_id','state_id','expected_salary','employment_status','employment_type','education','relative_at_company','relation','realtive_team',
    'realtive_job_position','realtive_contact','bond_with_prev_company','limit_jobs_with_prev_company',
    'cv_correct'];

    public function company_informations()
    {
        return $this->belongsToMany('App\MyLibs\Models\Company_information',
        	'company_informations_cvs','cv_id','company_id')->withPivot('id')->withTimestamps();
    }

    public function staff_resources()
    {
        return $this->belongsToMany('App\MyLibs\Models\Staff_Resource',
            'staff_resources_cvs','cv_id','staff_resource_id')->withPivot('id')->withTimestamps();
    }
}
