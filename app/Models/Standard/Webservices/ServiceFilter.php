<?php

namespace App\Models\Standard\Webservices;

use App\Models\Standard\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Organisation\Organisation;
use App\Models\Standard\Webservices\About;
use App\Models\Standard\Webservices\Service;

class ServiceFilter extends Model
{
    protected $fillable = [
        'title',
        'details',
        'why',
        'user_id',
        'organisation_id',
        'bureau_id',
    ];

    //belongs to
    public function about()
    {
        return $this->belongsTo(About::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }
    public function bureau()
    {
        return $this->belongsTo(Bureau::class);
    }
}
