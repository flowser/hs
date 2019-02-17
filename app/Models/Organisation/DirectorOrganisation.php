<?php

namespace App\Models\Organisation;

use Illuminate\Database\Eloquent\Relations\Pivot;

class DirectorOrganisation extends Pivot
{
    protected $fillable = [
        'user_id',
        'organisation_id',
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
        'constituency_id',
        'ward_id',
    ];
}
