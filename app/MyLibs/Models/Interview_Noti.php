<?php

namespace App\MyLibs\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyLibs\Traits\Uuids;

class Interview_Noti extends Model
{
    use Uuids;

    public $incrementing = false;

    protected $table='interview_notis';
    protected $fillable=['id','user_id','apply_id','interview_id','company_name','position_name','interview_name','read','company_logo'];
}
