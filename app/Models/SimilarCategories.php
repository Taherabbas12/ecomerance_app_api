<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimilarCategories extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'similar_category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function similarCategory()
    {
        return $this->belongsTo(Category::class, 'similar_category_id');
    }
}
