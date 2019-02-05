<?php

namespace App\Models\Standard\Webservices;

use App\Models\Standard\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Standard\Webservices\About;

class AboutPic extends Model
{
    protected $fillable = [
        'about_image1',
        'about_image2',
        'about_image3',
        'about_image4',
        'about_image5',
        'about_image6',
        'user_id',
        'about_id',
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
