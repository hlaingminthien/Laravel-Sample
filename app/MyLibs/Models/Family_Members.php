<?php

namespace App\MyLibs\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyLibs\Traits\Uuids;

class Family_Members extends Model
{
    use Uuids;
    public $incrementing = false;

    protected $table='training_certificates';

    protected $fillable=['id','cv_id','name','relation','job_position','religious','position','job_description',
	'note'];
}
