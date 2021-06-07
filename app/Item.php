<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Item extends Model
{
    public function Year(){
        return $this->belongsTo(Year::class);
    }

    

}
