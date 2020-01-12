<?php

namespace App\MyLibs\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyLibs\Traits\Uuids;

class Country extends Model
{
    use Uuids;

    public $incrementing = false;

    protected $table='countries';

    protected $fillable=['id','name'];

}
