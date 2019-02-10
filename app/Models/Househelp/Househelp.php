<?php

namespace App\Models\Househelp;


use App\Models\Bureau\Bureau;
use App\Models\Standard\Ward;
use App\Models\Standard\County;
use App\Models\Standard\Gender;
use App\Models\Standard\Country;
use App\Models\Standard\Constituency;
use Illuminate\Database\Eloquent\Model;

class Househelp extends Model
{
    protected $fillable = [
        'user_id',
        'bureau_id',
        'photo',
        'age',



        'id_no',
        'id_waiting_card_no',
        'id_photo_front',
        'id_photo_back',
        'search_fee',
        'about_me',
        'phone',
        'address',
        'active',
        'employmentstatus',
        'hired',


        'country_id',
        'county_id',
        'constituency_id',
        'ward_id',

        //filters

        'gender_id',
        'education_id',
        'experience_id',
        'maritalstatus_id',
        'tribe_id',
        'skill_id',
        'operation_id',
        'duration_id',
        'englishstatus_id',
        'healthstatus_id',
        'idstatus_id',
        'religion_id',
        'kid_id',
    ];

    protected $casts = [
        'active' => 'boolean',
        'employmentstatus' => 'boolean',
        'hired'=> 'boolean',
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
    public function bureau()
    {
        return $this->belongsTo(Bureau::class);
    }


    //has many

}
