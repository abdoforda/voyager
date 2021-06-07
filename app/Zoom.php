<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Zoom extends Model
{
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
