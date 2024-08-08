<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SimilarProduct extends Model
{
    protected $fillable = ['product_id', 'similar_product_id'];

    // العلاقة مع المنتج الرئيسي
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // العلاقة مع المنتج المشابه
    public function similarProduct()
    {
        return $this->belongsTo(Product::class, 'similar_product_id');
    }

}
