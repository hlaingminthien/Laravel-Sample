<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
// use App\MyLibs\Traits\Uuids;

class User extends Authenticatable
{
    use EntrustUserTrait;
    // use Uuids;
    use Notifiable;
    
    public $incrementing = false;

    protected $table='users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name','state_id','city_id','email','email_verified_at',
        'phone','photo','nrc','gender',
        'race','religious','native_town','date_of_birth',
        'weight','height','marital_status','health',
        'address','emergency_contact_name','emergency_phone',
        'relation_with_econtact','password','active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){

       return $this->belongsToMany('App\Role','role_user','user_id','role_id');
    }

    public function cvs()
    {
        return $this->hasOne('App\MyLibs\Models\Cv');
    }


     
}
