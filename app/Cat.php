<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cat extends Model
{
    public function employees(){
        return $this->hasMany(Employee::class);
    }
}
