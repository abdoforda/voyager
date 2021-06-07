<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function pricee($state = null){
        if($state){
            return $this->$state;
        }
        $name = state();
        return $this->$name;
    }

    public function priceCurrency($state = null){

        if($state){
            if($state == "price_eg"){
                $namePrice = "جنية";
            }elseif($state == "price_sar"){
                $namePrice = "ريال";
            }else{
                $namePrice = "دولار";
            }
            if($this->pricee($state) > 0){
                return $this->pricee($state)." ".$namePrice;
            }
            return "مجاني";
        }

        if(state() == "price_eg"){
            $namePrice = "جنية";
        }elseif(state() == "price_sar"){
            $namePrice = "ريال";
        }else{
            $namePrice = "دولار";
        }
        if($this->pricee() > 0){
            return $this->pricee()." ".$namePrice;
        }
        return "مجاني";
    }


    public function purchased(){
        if(auth()->user()){
            $orders = auth()->user()->getAllOrder();
            foreach($orders as $order){
                $carts = unserialize($order->carts);
                foreach($carts as $cart){
                    if($cart->product_id == $this->id){
                        return true;
                        break;
                    }
                }
            }
        }
        
        return false;
    }

    public function catName(){
        if($this->type == "program"){ return "البرامج التدريبية";}
        if($this->type == "bags"){ return "الحقائب";}
        if($this->type == "studies"){ return "دراسة الجدوي";}
        if($this->type == "products"){ return "المنتجات";}
    }

    public function exam(){
        return $this->hasOne(Exam::class);
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    public function evaluation(){
        $evals = Evaluation::where('product_id', $this->id)->get();
        if(count($evals) == 0){
            return 0;
        }
        $value = 0;
        foreach($evals as $eval){
            $value += $eval->value;
        }
        return ($value / count($evals));
    }

    public function is_evaluation(){
        $evals = Evaluation::where([
            ['product_id', $this->id],
            ['user_id', auth()->user()->id]
        ])->get()->first();
        if($evals){
            return true;
        }
        return false;
    }

    


}
