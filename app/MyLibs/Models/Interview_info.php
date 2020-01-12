<?php

namespace App\MyLibs\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyLibs\Traits\Uuids;

class Interview_info extends Model
{
    use Uuids;

    public $incrementing = false;

    protected $table='interview';
    protected $fillable=['id','name','date','time','location','interview_requirement'];
}
