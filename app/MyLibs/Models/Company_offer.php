<?php

namespace App\MyLibs\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyLibs\Traits\Uuids;

class Company_offer extends Model
{
    use Uuids;

    public $incrementing = false;

    protected $table='company_offers';

    protected $fillable=['id', 'apply_id', 'user_id', 'company_id','job_position_id','start_date'];

}
