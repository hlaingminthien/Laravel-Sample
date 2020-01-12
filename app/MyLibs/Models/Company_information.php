<?php

namespace App\MyLibs\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyLibs\Traits\Uuids;

class Company_information extends Model
{
    use Uuids;
    public $incrementing = false;

    protected $table='company_informations';

    protected $fillable=['id' ,'company_name', 'user_id', 'staff_resource_id','job_category_id',
    'man_power_id','state_id','company_type', 'established_date', 'facebook_link', 'wechat_link',
    'contact_name' ,'contact_phone','contact_email', 'address', 'what_you_do','why_should_join','logo','licensePhoto','company_correct'];

    public function cvs()
    {
        return $this->belongsToMany('App\MyLibs\Models\Cv',
        	'company_informations_cvs','company_id','cv_id')->withPivot('id')->withTimestamps();
    }
}
