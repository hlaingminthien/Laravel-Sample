<?php

namespace App\MyLibs\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyLibs\Traits\Uuids;

class Working_Experience extends Model
{
    use Uuids;
    public $incrementing = false;

    protected $table='working_experiences';

    protected $fillable=['id','user_id','cv_id','job_postion','jobcate_id','experlevel_id','star_date','end_date','left_reason','proof'];
}
