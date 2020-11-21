<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $primaryKey = 'id';

    public function attributes()
    {
    	return $this->hasMany('App\products_attributes','product_id');
    }
   
}
