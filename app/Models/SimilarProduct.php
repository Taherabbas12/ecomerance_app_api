<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SimilarProduct extends Model
{
    protected $fillable = ['product_id', 'similar_product_id'];
}
