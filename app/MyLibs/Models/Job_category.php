<?php

namespace App\MyLibs\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyLibs\Traits\Uuids;

class Job_Category extends Model
{
    use Uuids;

    public $incrementing = false;

    protected $table='job_categories';
    protected $fillable=['id','name','icon_id'];
}
