<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'state',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function carts()
    {
        return $this->hasMany('App\Cart');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function createOrder(){

        $carts = $this->carts->load('product');

        $order = new Order();
        $order->user_id = $this->id;
        $order->carts = serialize($carts);
        $order->save();

        foreach($carts as $cart){

            $product = $cart->product;
            $product->solded += $cart->count;
            $product->save();
            
            $cart->delete();
        }
        
        return  $order;
    }

    public function getAllOrder(){

        $orders = $this->orders;
        //unserialize($orders[0]->carts)
        return $orders;
    }


}
