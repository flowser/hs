<?php

namespace App\Models\Standard\Webservices;

use App\Models\Bureau\Bureau;
use App\Models\Standard\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Organisation\Organisation;

class Advert extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'advert_image',
        'details',
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

}
