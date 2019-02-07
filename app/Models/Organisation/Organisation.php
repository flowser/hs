<?php

namespace App\Models\Organisation;


use App\Models\Bureau\Bureau;
use App\Models\Standard\Town;
use App\Models\Standard\County;
use App\Models\Standard\Country;
use App\Models\Househelp\Househelp;
use App\Models\Bureau\BureauEmployee;
use Illuminate\Database\Eloquent\Model;
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
        'email',
        'phone',
        'landline',
        'website',
        'address',
        'active',
        'country_id',
        'county_id',
        'town_id',
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
    public function town()
    {
        return $this->belongsTo(Town::class);
    }
    

    //has many
    public function organisationdirectors()
    {
        return $this->hasMany(OrganisationDirector::class);
    }
    public function organisationemployees()
    {
        return $this->hasMany(OrganisationEmployee::class);
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
    public function service()
    {
        return $this->hasOne(Service::class);
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
