<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'product_id' , 'product_category_id', 'branch_id', 'stock', 'stock_defective'
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id')->withTrashed();
    }
    public function category()
    {
        return $this->belongsTo('App\Models\ProductCategory', 'product_category_id')->withTrashed();
    }
}
