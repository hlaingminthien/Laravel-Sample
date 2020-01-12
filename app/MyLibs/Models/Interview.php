<?php

namespace App\MyLibs\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyLibs\Traits\Uuids;

class Interview extends Model
{
    use Uuids;

    public $incrementing = false;

    protected $table='interviews';
    protected $fillable=['id','name','company_id','date','time','location','interview_requirement'];

    public function applies()
    {
        return $this->belongsToMany('App\MyLibs\Models\Interview')->withPivot('interview_mark','interview_result','finish');
    }
}
