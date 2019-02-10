<?php

namespace App\Models\Standard\Webservices;

use App\Models\Standard\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Organisation\Organisation;
use App\Models\Standard\Webservices\About;

class AboutPic extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'user_id',
        'about_id',
    ];

    //belongs to
    public function about()
    {
        return $this->belongsTo(About::class);
    }
    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
