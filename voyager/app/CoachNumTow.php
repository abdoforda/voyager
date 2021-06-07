<?php

namespace App;

use App\Scopes\ActiveCoach;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Models\DataRow;

class CoachNumTow extends DataRow
{

    protected $table = 'coaches';

    protected static function booted()
    {
        static::addGlobalScope(new ActiveCoach);
    }
    

}
