<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingCost extends Model
{
        protected $guarded = [

    ];
    public function countries(){
        return $this->belongsTo('App\Models\Country','country_id','id');
    }
    public function products(){
        return $this->belongsTo('App\Models\ProductType','product_id','id');
    }
}
