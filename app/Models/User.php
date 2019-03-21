<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    const USER_TYPE_ADMIN         = 1;
    const USER_TYPE_USER          = 2;
    const USER_TYPE_AIRPORT_ADMIN = 3;
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    // protected $dateFormat = 'Y-m-d';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'user_type',
        'id_number',
        'profile_picture',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'activated',
        'token',
    ];

    protected $dates = [
        'deleted_at',
    ];
      
    public function translations()
    {
        return $this->hasMany('App\Models\Translation');
    }

    public function isAdministrator()
    {
        return $this->user_type == User::USER_TYPE_ADMIN;
    }

    public function isUser()
    {
        return $this->user_type == User::USER_TYPE_USER;
    }

    public function isAirportAdmin()
    {
        return $this->user_type == User::USER_TYPE_AIRPORT_ADMIN;
    }

}
