<?php

namespace App\MyLibs\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyLibs\Traits\Uuids;

class Card extends Model
{
    use Uuids;

    public $incrementing = false;

    protected $table='cards';

    protected $fillable=['id','card_name','num_of_postion','num_of_refresh','num_of_topping','num_of_advice','num_of_cv','staff_advice_hour','training_hour','num_of_drawing_rules','limit_time','price','star_levels','hr_informations','staff_situation','details'];
}
