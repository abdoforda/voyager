<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    
    // 120.00 جنية
    public function priceTotal(){
        if($this->product->price > 0){
            
        if(state() == "price_eg"){
            $namePrice = "جنية";
        }elseif(state() == "price_sar"){
            $namePrice = "ريال";
        }else{
            $namePrice = "دولار";
        }
            return $this->count * $this->product->pricee()." ".$namePrice;
        }
        return "مجاني";
    }

    public function priceTotalAdmin(){
        if($this->product->price > 0){

        $user = $this->user;
        
        if($user->state == "price_eg"){
            $namePrice = "جنية";
        }elseif($user->state == "price_sar"){
            $namePrice = "ريال";
        }else{
            $namePrice = "دولار";
        }
            return $this->count * $this->product->pricee($user->state)." ".$namePrice;
        }
        return "مجاني";
    }

    // 120.00
    public function priceTotalNoCurrency(){
        if($this->product->price > 0){
            return $this->count * $this->product->pricee();
        }
        return "مجاني";
    }


}
