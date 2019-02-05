<?php

namespace App\Models\Standard\Webservices;

use App\Models\Standard\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Standard\Webservices\About;

class ServiceFilter extends Model
{
    protected $fillable = [
        'title',
        'details',
        'why',
        'user_id',
        'service_id',
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
}