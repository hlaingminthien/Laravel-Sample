<?php

namespace App\MyLibs\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyLibs\Traits\Uuids;

class Apply extends Model
{
    use Uuids;
    public $incrementing = false;
    protected $table='applies';
    protected $fillable=['id','user_id','cv_id','company_id','job_position_id','apply_time','has_interview','by_apply_this_cmp','staff_resource_id'];

    public function interviews()
    {
        return $this->belongsToMany('App\MyLibs\Models\Interview')->withPivot('interview_mark','interview_result','finish');
    }
}
