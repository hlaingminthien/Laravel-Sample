<?php

namespace App\MyLibs\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyLibs\Traits\Uuids;

class Training_Certificate extends Model
{
    use Uuids;
    public $incrementing = false;

    protected $table='training_certificates';

    protected $fillable=['id','cv_id','name','university', 'time_limit','start_date','end_date'];
}
