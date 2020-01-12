<?php

namespace App\MyLibs\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyLibs\Traits\Uuids;

class Position_Level extends Model
{
    //
        use Uuids;

    public $incrementing = false;

    protected $table='position_levels';

    protected $fillable=['id','name'];
}
