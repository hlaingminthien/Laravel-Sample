<?php

namespace App\MyLibs\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyLibs\Traits\Uuids;

class City extends Model
{
    use Uuids;

    public $incrementing = false;

    protected $table='cities';

    protected $fillable=['id','name','state_id'];
}
