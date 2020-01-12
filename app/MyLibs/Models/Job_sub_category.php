<?php

namespace App\MyLibs\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyLibs\Traits\Uuids;

class Job_Sub_Category extends Model
{
    use Uuids;

    public $incrementing = false;

    protected $table='job_sub_categories';
    protected $fillable=['id','name', 'job_category_id'];
}
