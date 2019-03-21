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

    /**
     * Returns birth date from identity
     *
     * @param string $identity Identity string
     * 
     * @return \DateTime
     */
    function getBirthDateFromIdentity($identity) {
        // substring identity to get bday
        $date = substr($identity, 0, 6);

        // use built-in DateTime object to work with dates
        $date = \DateTime::createFromFormat('ymd', $date);
        $now  = new \DateTime();

        // compare birth date with current date: 
        // if it's bigger bd was in previous century
        if ($date > $now) {
            $date->modify('-100 years');
        }

        return $date;
    }

    /**
     * Returns gender string from identity
     *
     * @param string $identity Identity string
     * 
     * @return string
     */
    function getGenderFromIdentity($identity) {
        // substring gender data and convert it to int
        $gender = (int) substr($identity, 6, 1);
        return ($gender >= 0 && $gender <= 4) ? 'Female' : 'Male';
    }

    /**
     * Returns age from birthdate (on 31 December of the current year)
     *
     * @param \DateTime $birthdate Birth date
     * 
     * @return int
     */
    function getAgeFromBirthday(\DateTime $birthdate) {
        $date = new \DateTime();
        $interval = $date->diff($birthdate);
        return $interval->y;
    }

    function getAge() {
        $birthdate = $this->getBirthDateFromIdentity($this->id_number);
        return $this->getAgeFromBirthday($birthdate);
    }

    function getGender() {
        return $this->getGenderFromIdentity($this->id_number);
    }

}
