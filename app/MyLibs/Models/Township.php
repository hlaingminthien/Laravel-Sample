<?php

namespace App\MyLibs\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyLibs\Traits\Uuids;

class Township extends Model
{
    use Uuids;

    public $incrementing = false;

    protected $table='townships';

    protected $fillable=['id','name','state_id','city_id'];
}
