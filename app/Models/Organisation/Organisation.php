<?php

namespace App\Models\Organisation;


use App\Models\Bureau\Bureau;
use App\Models\Standard\Town;
use App\Models\Standard\County;
use App\Models\Standard\Country;
use App\Models\Househelp\Househelp;
use App\Models\Bureau\BureauEmployee;
use Illuminate\Database\Eloquent\Model;
use App\Models\Organisation\OrganisationEmployee;

class Organisation extends Model
{
    protected $fillable = [
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

    //has many
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
    

}
