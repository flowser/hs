<?php

namespace App\Models\Client;

use App\Models\Standard\Ward;
use App\Models\Standard\County;
use App\Models\Standard\Gender;
use App\Models\Standard\Country;
use App\Models\Standard\Constituency;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'user_id',
        'photo',

        'id_no',
        'id_photo_front',
        'id_photo_back',
        'phone',
        'address',
        'active',
        'hiringstatus',

        'country_id',
        'county_id',
        'constituency_id',
        'ward_id',

    ];

    protected $casts = [
        'active' => 'boolean',
        'hiringstatus' => 'boolean',
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

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }


}
