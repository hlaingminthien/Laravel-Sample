<?php

namespace App\MyLibs\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyLibs\Traits\Uuids;

class ExperLevel extends Model
{
    use Uuids;

    public $incrementing = false;

    protected $table='experience_levels';

    protected $fillable=['id','name'];
}
