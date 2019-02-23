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
use App\Models\Standard\Webservices\AboutPic;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Organisation\OrganisationDirector;
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

    //   public function organisation()
    // {
    //     return $this->hasOne(Organisation::class);
    // }

    public function organisationdirectors()
    {
        return $this->belongsToMany(Organisation::class,'organisation_director')
                    // ->using(OrganisationDirector::class)
                    ->withPivot(
                        'photo',
                        'active',
                        'id_no',
                        'id_photo_front',
                        'id_photo_back',
                        'about_me',
                        'phone',
                        'landline',
                        'address',
                        'position_id'
                    )
                    ->withTimestamps();
    }
    public function positions()
    {
        return $this->belongsToMany(Position::class,'organisation_director')
                    ->using(OrganisationDirector::class)
                    ->withPivot(
                        'photo',
                        'active',
                        'id_no',
                        'id_photo_front',
                        'id_photo_back',
                        'about_me',
                        'phone',
                        'landline',
                        'address',
                        'position_id'
                    )
                    ->withTimestamps();
    }
    public function countries()
    {
        return $this->belongsToMany(Country::class,'organisation_director')
                    ->using(OrganisationDirector::class)
                    ->withPivot(
                        'photo',
                        'active',
                        'id_no',
                        'id_photo_front',
                        'id_photo_back',
                        'about_me',
                        'phone',
                        'landline',
                        'address',
                        'position_id',
                        'country_id',
                        'county_id',
                        'constituency_id',
                        'ward_id'
                    )
                    ->withTimestamps();
    }
    public function counties()
    {
        return $this->belongsToMany(County::class,'organisation_director')
                    ->using(OrganisationDirector::class)
                    ->withPivot(
                        'photo',
                        'active',
                        'id_no',
                        'id_photo_front',
                        'id_photo_back',
                        'about_me',
                        'phone',
                        'landline',
                        'address',
                        'position_id',
                        'country_id',
                        'county_id',
                        'constituency_id',
                        'ward_id'
                    )
                    ->withTimestamps();
    }
    public function constituencies()
    {
        return $this->belongsToMany(Constituency::class,'organisation_director')
                    ->using(OrganisationDirector::class)
                    ->withPivot(
                        'photo',
                        'active',
                        'id_no',
                        'id_photo_front',
                        'id_photo_back',
                        'about_me',
                        'phone',
                        'landline',
                        'address',
                        'position_id',
                        'country_id',
                        'county_id',
                        'constituency_id',
                        'ward_id'
                    )
                    ->withTimestamps();
    }
    public function wards()
    {
        return $this->belongsToMany(Ward::class,'organisation_director')
                    ->using(OrganisationDirector::class)
                    ->withPivot(
                        'photo',
                        'active',
                        'id_no',
                        'id_photo_front',
                        'id_photo_back',
                        'about_me',
                        'phone',
                        'landline',
                        'address',
                        'position_id',
                        'country_id',
                        'county_id',
                        'constituency_id',
                        'ward_id'
                    )
                    ->withTimestamps();
    }
//employees
    public function organisationemployees()
    {
        return $this->belongsToMany(Organisation::class, 'organisation_employee')
                            ->withPivot(
                                'user_id',
                                'organisation_id',
                                'position_id',
                                'photo',
                                'active',
                                'id_no',
                                'id_photo_front',
                                'id_photo_back',
                                'about_me',
                                'phone',
                                'landline',
                                'address',
                                'country_id',
                                'county_id',
                                'constituency_id',
                                'ward_id'
                            )
                            ->withTimestamps();
    }
    public function orgemployeepositions()
    {
        return $this->belongsToMany(Position::class,'organisation_employee')
                    ->using(OrganisationEmployee::class)
                    ->withPivot(
                        'photo',
                        'active',
                        'id_no',
                        'id_photo_front',
                        'id_photo_back',
                        'about_me',
                        'phone',
                        'landline',
                        'address',
                        'position_id'
                    )
                    ->withTimestamps();
    }
    public function orgemployeecountries()
    {
        return $this->belongsToMany(Country::class,'organisation_employee')
                    ->using(OrganisationEmployee::class)
                    ->withPivot(
                        'photo',
                        'active',
                        'id_no',
                        'id_photo_front',
                        'id_photo_back',
                        'about_me',
                        'phone',
                        'landline',
                        'address',
                        'position_id',
                        'country_id',
                        'county_id',
                        'constituency_id',
                        'ward_id'
                    )
                    ->withTimestamps();
    }
    public function orgemployeecounties()
    {
        return $this->belongsToMany(County::class,'organisation_employee')
                    ->using(OrganisationEmployee::class)
                    ->withPivot(
                        'photo',
                        'active',
                        'id_no',
                        'id_photo_front',
                        'id_photo_back',
                        'about_me',
                        'phone',
                        'landline',
                        'address',
                        'position_id',
                        'country_id',
                        'county_id',
                        'constituency_id',
                        'ward_id'
                    )
                    ->withTimestamps();
    }
    public function orgemployeeconstituencies()
    {
        return $this->belongsToMany(Constituency::class,'organisation_employee')
                    ->using(OrganisationEmployee::class)
                    ->withPivot(
                        'photo',
                        'active',
                        'id_no',
                        'id_photo_front',
                        'id_photo_back',
                        'about_me',
                        'phone',
                        'landline',
                        'address',
                        'position_id',
                        'country_id',
                        'county_id',
                        'constituency_id',
                        'ward_id'
                    )
                    ->withTimestamps();
    }
    public function orgemployeewards()
    {
        return $this->belongsToMany(Ward::class,'organisation_employee')
                    ->using(OrganisationEmployee::class)
                    ->withPivot(
                        'photo',
                        'active',
                        'id_no',
                        'id_photo_front',
                        'id_photo_back',
                        'about_me',
                        'phone',
                        'landline',
                        'address',
                        'position_id',
                        'country_id',
                        'county_id',
                        'constituency_id',
                        'ward_id'
                    )
                    ->withTimestamps();
    }

    public function bureaudirectors()
    {
        return $this->belongsToMany(Bureau::class,'bureau_director')
                    // ->using(BureauDirector::class)
                    ->withPivot(
                        'photo',
                        'active',
                        'id_no',
                        'id_photo_front',
                        'id_photo_back',
                        'about_me',
                        'phone',
                        'landline',
                        'address',
                        'country_id',
                        'county_id',
                        'constituency_id',
                        'ward_id'
                    )
                    ->withTimestamps();
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
    public function aboutpics()
    {
        return $this->hasManyThrough(AboutPic::class, About::class);
    }




}
