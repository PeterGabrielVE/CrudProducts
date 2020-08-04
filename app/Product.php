<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function product()
    {
        return $this->belongsToMany('categories_products', 'product_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'categories_products', 'product_id', 'category_id');
    }
}
