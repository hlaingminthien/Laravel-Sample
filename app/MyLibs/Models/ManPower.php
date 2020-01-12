<?php

namespace App\MyLibs\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyLibs\Traits\Uuids;

class ManPower extends Model
{
    use Uuids;

    public $incrementing = false;

    protected $table='man_power';

    protected $fillable=['id','name'];
}
