<?php

namespace App\Models\Bureau;


use App\Models\Standard\User;
use App\Models\Standard\Ward;
use App\Models\Standard\County;
use App\Models\Standard\Country;
use App\Models\Standard\Position;
use Spatie\Permission\Models\Role;
use App\Models\Househelp\Househelp;
use App\Models\Bureau\BureauDirector;
use App\Models\Bureau\BureauEmployee;
use App\Models\Standard\Constituency;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use App\Models\Organisation\Organisation;
use App\Models\Standard\Webservices\About;
use App\Models\Standard\Webservices\Advert;
use App\Models\Standard\Webservices\Service;
use App\Models\Standard\Webservices\AboutPic;
use App\Models\Standard\Webservices\ExtraService;
use App\Models\Standard\Webservices\ServiceFilter;



class Bureau extends Model
{
    protected $fillable = [
        'organisation_id',
        'name',
        'logo',
        'about_us',
        'what_we_do',
        'bureau_email',
        'phone',
        'landline',
        'website',
        'address',
        'active',
        'country_id',
        'county_id',
        'constituency_id',
        'ward_id',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    //belongs to
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function county()
    {
        return $this->belongsTo(County::class);
    }
    public function constituency()
    {
        return $this->belongsTo(Constituency::class);
    }
    public function ward()
    {
        return $this->belongsTo(Ward::class);
    }
    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }


    //has many

    //has many
    public function bureaudirectors()
    {
        return $this->belongsToMany(user::class,'bureau_director')
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
                        'address'
                    )
                    ->withTimestamps();
    }
    public function positions()
    {
        return $this->belongsToMany(Position::class,'bureau_director');
    }
    public function countries()
    {
        return $this->belongsToMany(Country::class,'bureau_director');
    }
    public function counties()
    {
        return $this->belongsToMany(County::class,'bureau_director');
    }
    public function constituencies()
    {
        return $this->belongsToMany(Constituency::class,'bureau_director');
    }
    public function wards()
    {
        return $this->belongsToMany(Ward::class,'bureau_director');
    }
    public function bureauemployees()
    {
        return $this->belongsToMany(User::class, 'bureau_employee')
                            ->withPivot(
                                'user_id',
                                'bureau_id',
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

    public function bureauemployeepositions()
    {
        return $this->belongsToMany(Position::class,'bureau_employee')
                    ->using(BureauEmployee::class)
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
    public function bureauemployeecountries()
    {
        return $this->belongsToMany(Country::class,'bureau_employee')
                    ->using(BureauEmployee::class)
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
    public function bureauemployeecounties()
    {
        return $this->belongsToMany(County::class,'bureau_employee')
                    ->using(BureauEmployee::class)
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
    public function bureauemployeeconstituencies()
    {
        return $this->belongsToMany(Constituency::class,'bureau_employee')
                    ->using(BureauEmployee::class)
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
    public function bureauemployeewards()
    {
        return $this->belongsToMany(Ward::class,'bureau_employee')
                    ->using(BureauEmployee::class)
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



    // public function roles()
    // {
    //     return $this->hasManyThrough(Role::class,  User::class, 'bureau_director');
    // }
    // public function permissions()
    // {
    //     return $this->hasManyThrough(Permission::class, User::class, 'bureau_director');
    // }
    public function househelps()
    {
        return $this->hasMany(Househelp::class);
    }

     //about page
    public function about()
    {
        return $this->hasOne(About::class);
    }
    public function aboutpics()
    {
        return $this->hasManyThrough(AboutPic::class, About::class);
    }
    //service page
    public function services()
    {
        return $this->hasMany(Service::class);
    }
    public function servicefilters()
    {
        return $this->hasMany(ServiceFilter::class, Service::class);
    }
    public function extraservices()
    {
        return $this->hasMany(ExtraService::class, Service::class);
    }
    //advert page or section
    public function adverts()
    {
        return $this->hasMany(Advert::class);
    }

}
