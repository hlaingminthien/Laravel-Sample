<?php

namespace App\MyLibs\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyLibs\Traits\Uuids;

class State extends Model
{
    use Uuids;

    public $incrementing = false;

    protected $table='states';

    protected $fillable=['id','name'];

}
