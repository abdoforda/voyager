<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Employee extends Model
{
    public function Cat(){
        return $this->belongsTo(Cat::class);
    }

    public function Items(){
        return $this->hasMany(Item::class,'user_id');
    }

}
