<?php

namespace App\Models\Bureau;

use App\Models\Standard\Town;
use App\Models\Standard\County;
use App\Models\Standard\Country;
use App\Models\Househelp\Househelp;
use App\Models\Bureau\BureauDirector;
use App\Models\Bureau\BureauEmployee;
use Illuminate\Database\Eloquent\Model;
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
    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }


    //has many

    public function bureauedirectors()
    {
        return $this->hasMany()(BureauDirector::class);
    }
    public function bureauemployees()
    {
        return $this->hasMany()(BureauEmployee::class);
    }
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
