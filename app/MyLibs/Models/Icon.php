<?php

namespace App\MyLibs\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyLibs\Traits\Uuids;

class Icon extends Model
{
    use Uuids;

    public $incrementing = false;

    protected $table='icons';

    protected $fillable=['id','name'];

}
