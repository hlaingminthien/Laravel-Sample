<?php

namespace App\MyLibs\Models;

use Illuminate\Database\Eloquent\Model;

class Others extends Model
{

    public $incrementing = false;

    protected $table='others';
    protected $fillable=['id','background'];
}
