<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'category_id', 'price', 'description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function similarProducts()
    {
        return $this->belongsToMany(Product::class, 'similar_products', 'product_id', 'similar_product_id');
    }
}
