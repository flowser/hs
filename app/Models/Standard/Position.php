<?php

namespace App\Models\Standard;


use App\Models\Bureau\BureauEmployee;
use Illuminate\Database\Eloquent\Model;
use App\Models\Organisation\OrganisationEmployee;

class Position extends Model
{
    protected $fillable = [
        'name',
    ];

    public function organisationemployees()
    {
        return $this->hasMany(OrganisationEmployee::class);
    }
    public function bureauemployees()
    {
        return $this->hasMany(BureauEmployee::class);
    }
}
