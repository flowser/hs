<?php

namespace App\Models\Househelp;


use App\Models\Bureau\Bureau;
use App\Models\Standard\Town;
use App\Models\Standard\County;
use App\Models\Standard\Gender;
use App\Models\Standard\Country;
use App\Models\Househelp\Househelp;
use Illuminate\Database\Eloquent\Model;
use App\Models\Organisation\Organisation;

class HousehelpKin extends Model
{
    protected $fillable = [        
        'user_id',
        'househelp_id',
        'relationship_id',
        'photo',    

        'id_no',
        'id_photo_front',
        'id_photo_back',
        'phone',
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
    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    
    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }    
    
    public function bureau()
    {
        return $this->belongsTo(Bureau::class);
    }
    public function houshelps()
    {
        return $this->belongsTo(Househelp::class);
    }    
    
}
