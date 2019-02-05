<?php

namespace App\Models\Standard\Webservices;

use App\Models\Bureau\Bureau;
use App\Models\Standard\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Organisation\Organisation;
use App\Models\Standard\Webservices\ExtraService;
use App\Models\Standard\Webservices\ServiceFilter;

class Service extends Model
{
    protected $fillable = [
        'title',
        'advert_image',
        'advert_title',
        'advert_details',
        'user_id',
        'organisation_id',
        'bureau_id',
    ];
        //belongs to
    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }
    public function bureau()
    {
        return $this->belongsTo(Bureau::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //has many
    public function servicefilters()
    {
        return $this->hasMany(ServiceFilter::class);
    }
    public function extraservices()
    {
        return $this->hasMany(ExtraService::class);
    }


}
