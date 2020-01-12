<?php

namespace App\MyLibs\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyLibs\Traits\Uuids;

class Staff_Resource extends Model
{
    use Uuids;

    public $incrementing = false;

    protected $table='staff_resources';

    protected $fillable=['id','user_id','offered_employer','offered_employee','used_cv'];

    public function cvs()
    {
        return $this->belongsToMany('App\MyLibs\Models\Cv',
        	'staff_resources_cvs','staff_resource_id','cv_id')->withPivot('id')->withTimestamps();
    }
}
