<?php

namespace App\Models\Organisation;



use App\Models\Bureau\Bureau;
use App\Models\Standard\User;
use App\Models\Standard\Ward;
use App\Models\Standard\County;
use App\Models\Standard\Gender;
use App\Models\Standard\Country;
use App\Models\Standard\Position;
use App\Models\Househelp\Househelp;
use App\Models\Bureau\BureauEmployee;
use App\Models\Standard\Constituency;
use Illuminate\Database\Eloquent\Model;
use App\Models\Organisation\Organisation;
use App\Models\Standard\Webservices\About;
use App\Models\Standard\Webservices\Advert;
use App\Models\Standard\Webservices\Service;
use App\Models\Standard\Webservices\AboutPic;
use App\Models\Organisation\OrganisationDirector;
use App\Models\Organisation\OrganisationEmployee;
use App\Models\Standard\Webservices\ExtraService;
use App\Models\Standard\Webservices\ServiceFilter;

class Organisation extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'organisation_email',
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


    //has many
    public function organisationdirectors()
    {
        return $this->belongsToMany(user::class,'organisation_director')
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
    public function organisationemployees()
    {
        return $this->hasMany(OrganisationEmployee::class);
    }
    public function organisationemployeesUsers()
    {
        return $this->hasMany(User::class, OrganisationEmployee::class);
    }

    public function bureaus()
    {
        return $this->hasMany(Bureau::class);
    }
    public function bureauemployees()
    {
        return $this->hasManyThrough()(BureauEmployee::class, Bureau::class);
    }
    public function househelps()
    {
        return $this->hasManyThrough(Househelp::class, Bureau::class);
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
        return $this->hasManyThrough(ServiceFilter::class, Service::class);
    }
    public function extraservices()
    {
        return $this->hasManyThrough(ExtraService::class, Service::class);
    }
    //advert page or section
    public function adverts()
    {
        return $this->hasMany(Advert::class);
    }


}
