<?php

namespace App\Models\Bureau;

use App\Models\Bureau\Bureau;
use App\Models\Standard\Town;
use App\Models\Standard\County;
use App\Models\Standard\Gender;
use App\Models\Standard\Country;
use App\Models\Standard\Position;
use App\Models\Househelp\Househelp;
use Illuminate\Database\Eloquent\Model;
use App\Models\Organisation\Organisation;

class BureauEmployee extends Model
{
    protected $fillable = [        
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

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
    public function bureau()
    {
        return $this->belongsTo(Bureau::class);
    }
    

    //has many
   
        
    public function househelps()
    {
        return $this->hasManyThrough(Househelp::class, Bureau::class);
    }
    
}
