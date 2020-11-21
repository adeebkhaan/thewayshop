<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    public function user_orders(){

    	return $this->hasMany('App\ordered_products','order_id');
    }
}
