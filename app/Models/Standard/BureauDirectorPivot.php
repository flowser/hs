<?php

namespace App\Models\Standard;

use App\Models\Standard\Position;

class BureauDirectorPivot extends \Illuminate\Database\Eloquent\Relations\Pivot
{
    public function position()
   {
       return $this->belongsTo(Position::class);
   }
}
