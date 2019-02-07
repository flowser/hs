<?php

namespace App\Models\Standard;


use App\Models\Bureau\Bureau;
use App\Models\Client\Client;
use App\Models\Househelp\Househelp;
use App\Models\Bureau\BureauEmployee;
use App\Models\Househelp\HousehelpKin;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use App\Models\Organisation\Organisation;
use App\Models\Standard\Webservices\About;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Organisation\OrganisationEmployee;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasRoles,
        Notifiable,
        // SendUserPasswordReset,
        SoftDeletes;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'user_type',
        'email',
        'password',
        'password_changed_at',
        'active',
        'confirmation_code',
        'confirmed',
        'timezone',
        'last_login_at',
        'last_login_ip',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * @var array
     */
    protected $dates = ['last_login_at', 'deleted_at'];

    /**
     * The dynamic attributes from mutators that should be returned with the user object.
     * @var array
     */
    protected $appends = ['full_name'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
        'confirmed' => 'boolean',
    ];

      public function getFullNameAttribute()
      {
          return $this->last_name ? $this->first_name.' '.$this->last_name : $this->first_name;
      }

      /**
       * @return string
       */
      public function getNameAttribute()
      {
          return $this->full_name;
      }

      public function organisation()
    {
        return $this->hasOne(Organisation::class);
    }
    public function organisationemployee()
    {
        return $this->hasOne(OrganisationEmployee::class);
    }

      public function bureau()
    {
        return $this->hasOne(Bureau::class);
    }
    public function bureauemployee()
    {
        return $this->hasOne(BureauEmployee::class);
    }

    public function houshelp()
    {
        return $this->hasOne(Househelp::class);
    }
    public function houshelpkin()
    {
        return $this->hasOne(HousehelpKin::class);
    }
    public function client()
    {
        return $this->hasOne(Client::class);
    }
    public function abouts()
    {
        return $this->hasMany(About::class);
    }




}
