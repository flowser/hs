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
use App\Models\Standard\BureauDirectorPivot;
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
        return $this->belongsToMany(User::class,'bureau_director')
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
                        'ward_id',
                        'position_id'
                    )
                    ->join('positions', 'position_id', '=', 'positions.id')
                    ->join('countries', 'country_id', '=', 'countries.id')
                    ->join('counties', 'county_id', '=', 'counties.id')
                    ->join('constituencies', 'constituency_id', '=', 'constituencies.id')
                    ->join('wards', 'ward_id', '=', 'wards.id')
                    ->select('users.*',
                        'bureau_director.*',
                            'countries.name as country_name',
                            'counties.name as county_name',
                            'constituencies.name as constituency_name',
                            'wards.name as ward_name',
                            'positions.name as position_name'
                    )
                    ->withTimestamps();
    }
    public function bureauadmins()
    {
        return $this->belongsToMany(User::class,'bureau_employee')
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
                        'ward_id',
                        'position_id'
                    )
                    ->join('positions', 'position_id', '=', 'positions.id')
                    ->join('countries', 'country_id', '=', 'countries.id')
                    ->join('counties', 'county_id', '=', 'counties.id')
                    ->join('constituencies', 'constituency_id', '=', 'constituencies.id')
                    ->join('wards', 'ward_id', '=', 'wards.id')
                    ->select('users.*',
                        'bureau_employee.*',
                            'countries.name as country_name',
                            'counties.name as county_name',
                            'constituencies.name as constituency_name',
                            'wards.name as ward_name',
                            'positions.name as position_name'
                    )
                    ->withTimestamps();
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
