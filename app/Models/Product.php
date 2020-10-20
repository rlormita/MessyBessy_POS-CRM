<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_name', 'product_description', 'product_category_id', 'product_image', 'product_price', 'product_qty', 'product_minimum'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\ProductCategory', 'product_category_id')->withTrashed();
    }
    public function solds()
    {
        return $this->hasMany('App\Models\SoldProduct');
    }



}
