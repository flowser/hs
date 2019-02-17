<?php

namespace App\Models\Standard;


use App\Models\Bureau\BureauEmployee;
use Illuminate\Database\Eloquent\Model;
use App\Models\Organisation\OrganisationEmployee;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Position extends Model
{
    protected $fillable = [
        'name',
    ];

    public function pivotPositionOrgDirectors()
    {
        return $this->hasMany(Pivot::class, 'position_id');
    }
    public function organisationemployees()
    {
        return $this->hasMany(OrganisationEmployee::class);
    }
    public function bureauemployees()
    {
        return $this->hasMany(BureauEmployee::class);
    }
}
